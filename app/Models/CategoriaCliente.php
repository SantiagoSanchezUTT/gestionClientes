<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaCliente extends Model
{
    protected $primaryKey = 'id_cat_cliente';
    protected $table = 'categoria_cliente'; // nombre real de la tabla
    protected $fillable = ['descripcion'];
    public $timestamps = false;
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id_cat_cliente');
    }
}
