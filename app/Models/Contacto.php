<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $primaryKey = 'id_contacto';
    protected $table = 'contactos'; // nombre real de la tabla
    protected $fillable = [
    'consecutivo',
    'tipo_contacto',
    'info_contacto',
    ];
    public $timestamps = false;
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id_contacto');
    }
}
