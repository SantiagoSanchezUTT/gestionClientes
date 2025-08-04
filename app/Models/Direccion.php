<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
    protected $primaryKey = 'id_direccion';
    protected $table = 'direcciones'; // nombre real de la tabla
    protected $fillable = [
        'calle',
        'colonia',
        'num_int',
        'num_ext',
        'estado', // otros campos que tengas
        'cp',
    ];
    public $timestamps = false;
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id_direccion');
    }
}
