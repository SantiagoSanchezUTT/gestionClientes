<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    public function clientes() {
    return $this->hasMany(Cliente::class, 'id_contacto');
}

}
