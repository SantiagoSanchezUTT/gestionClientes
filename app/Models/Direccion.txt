<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    public function clientes() {
    return $this->hasMany(Cliente::class, 'id_direccion');
}

}
