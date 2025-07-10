<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:100',
            'ap_paterno_cliente' => 'required|string|max:100',
            'ap_materno_cliente' => 'nullable|string|max:100',
            'ultimo_movimiento' => 'nullable|date',
        ]);
    
        Cliente::create($request->all());
    
        return redirect()->route('clientes.index');
    }

    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
    
        $request->validate([
            'nombre_cliente' => 'required|string|max:100',
            'ap_paterno_cliente' => 'required|string|max:100',
            'ap_materno_cliente' => 'nullable|string|max:100',
            'ultimo_movimiento' => 'nullable|date',
        ]);
    
        $cliente->update($request->all());
    
        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect()->route('clientes.index');
    }
}
