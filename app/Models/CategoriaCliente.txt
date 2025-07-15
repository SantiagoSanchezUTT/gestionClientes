<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaCliente extends Model
{
    public function clientes() {
    return $this->hasMany(Cliente::class, 'id_cat_cliente');
}

}
