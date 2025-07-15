<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Contacto;
use App\Models\Direccion;
use App\Models\CategoriaCliente;
use Carbon\Carbon;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::with(['contacto', 'direccion', 'categoria'])->get();
        return view('clientes.index', compact('clientes'));
    }
    public function create()
    {
        $categorias = CategoriaCliente::all();
        return view('clientes.create', compact('categorias'));
    }
    public function store(Request $request)
    {

        $request->validate([
            // Cliente
            'nombre_cliente' => 'required|string|max:100',
            'ap_paterno_cliente' => 'required|string|max:100',
            'ap_materno_cliente' => 'nullable|string|max:100',

            // Contacto
            'tipo_contacto' => 'required|in:telefono,correo,red_social',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:100',
            'red_social' => 'nullable|string|max:100',

            // Dirección
            'calle' => 'nullable|string|max:100',
            'colonia' => 'nullable|string|max:100',
            'num_int' => 'nullable|string|max:10',
            'num_ext' => 'nullable|string|max:10',
            'cp' => 'nullable|string|max:10',
            'estado' => 'nullable|string|max:100',

            // Categoría
            'id_cat_cliente' => 'required|exists:categoria_cliente,id_cat_cliente',
        ]);


        $ultimoMovimiento = $request->ultimo_movimiento ?? Carbon::now()->toDateString();

        $tipo = $request->tipo_contacto;
        $info = match ($tipo) {
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'red_social' => $request->red_social,
            default => null
        };

        if (!$info) {
            return redirect()->back()->withInput()->withErrors([
                'info_contacto' => 'Debe proporcionar el valor para el tipo de contacto seleccionado.'
            ]);
        }


        $contacto = Contacto::create([
            'consecutivo' => 1, // Si es manual, si no, hazlo auto
            'tipo_contacto' => $tipo,
            'info_contacto' => $info,
        ]);



        $direccion = Direccion::create(
            [
                'calle' => $request->calle,
                'colonia' => $request->colonia,
                'num_int' => $request->num_int,
                'num_ext' => $request->num_ext,
                'estado' => $request->estado,
                'cp' => $request->cp,
            ]
        );

        // Insertar en tabla categoria_cliente
        Cliente::create([
            'nombre_cliente' => $request->nombre_cliente,
            'ap_paterno_cliente' => $request->ap_paterno_cliente,
            'ap_materno_cliente' => $request->ap_materno_cliente,
            'ultimo_movimiento' => $ultimoMovimiento,
            'id_contacto' => $contacto->id_contacto,
            'id_direccion' => $direccion->id_direccion,
            'id_cat_cliente' => $request->id_cat_cliente,
        ]);

        // dd($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado correctamente');
    }
    public function edit($id)
    {
        $cliente = Cliente::with(['contacto', 'direccion', 'categoria'])->findOrFail($id);
        $categorias = CategoriaCliente::all();
        return view('clientes.edit', compact('cliente', 'categorias')); // <-- Agrégala al compact
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::with(['direccion', 'contacto'])->findOrFail($id);

        $request->validate([
            'nombre_cliente' => 'required|string|max:100',
            'ap_paterno_cliente' => 'required|string|max:100',
            'ap_materno_cliente' => 'nullable|string|max:100',
            'ultimo_movimiento' => 'nullable|date',
            'id_cat_cliente' => 'required|exists:categoria_cliente,id_cat_cliente',

            // Dirección
            'calle' => 'nullable|string|max:100',
            'colonia' => 'nullable|string|max:100',
            'num_int' => 'nullable|string|max:10',
            'num_ext' => 'nullable|string|max:10',
            'cp' => 'nullable|string|max:10',
            'estado' => 'nullable|string|max:100',

            // Contacto
            'tipo_contacto' => 'required|in:telefono,correo,red_social',
            'telefono' => 'nullable|string|max:20',
            'correo' => 'nullable|email|max:100',
            'red_social' => 'nullable|string|max:100',
        ]);

        // Actualizar cliente
        $cliente->update([
            'nombre_cliente' => $request->nombre_cliente,
            'ap_paterno_cliente' => $request->ap_paterno_cliente,
            'ap_materno_cliente' => $request->ap_materno_cliente,
            'ultimo_movimiento' => $request->ultimo_movimiento ?? now(),
            'id_cat_cliente' => $request->id_cat_cliente,
        ]);

        // Actualizar dirección
        if ($cliente->direccion) {
            $cliente->direccion->update([
                'calle' => $request->calle,
                'colonia' => $request->colonia,
                'num_int' => $request->num_int,
                'num_ext' => $request->num_ext,
                'cp' => $request->cp,
                'estado' => $request->estado,
            ]);
        }

        // Actualizar contacto
        if ($cliente->contacto) {
            $info = match ($request->tipo_contacto) {
                'telefono' => $request->telefono,
                'correo' => $request->correo,
                'red_social' => $request->red_social,
            };

            $cliente->contacto->update([
                'tipo_contacto' => $request->tipo_contacto,
                'info_contacto' => $info,
            ]);
        }

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente');
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);

        // Elimina registros foráneos si existen
        if ($cliente->contacto) {
            $cliente->contacto->delete();
        }

        if ($cliente->direccion) {
            $cliente->direccion->delete();
        }

        // Finalmente elimina el cliente
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente y registros relacionados eliminados.');
    }
}
