<?php

namespace Database\Seeders;

use App\Models\CategoriaCliente;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaClienteSeeder extends Seeder
{
    public function run()
    {
        CategoriaCliente::insert([
            ['id_cat_cliente' => 1, 'descripcion' => 'Común'],
            ['id_cat_cliente' => 2, 'descripcion' => 'Frecuente'],
            ['id_cat_cliente' => 3, 'descripcion' => 'VIP'],
        ]);
    }
}
