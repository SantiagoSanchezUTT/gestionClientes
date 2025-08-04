<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $primaryKey = 'id_cliente';

    protected $fillable = [
        'nombre_cliente',
        'ap_paterno_cliente',
        'ap_materno_cliente',
        'ultimo_movimiento',
        'id_contacto',
        'id_direccion',
        'id_cat_cliente',
    ];

    public $timestamps = false;

    public function contacto() {
        return $this->belongsTo(Contacto::class, 'id_contacto');
    }
    
    public function direccion() {
        return $this->belongsTo(Direccion::class, 'id_direccion');
    }
    
    public function categoria() {
        return $this->belongsTo(CategoriaCliente::class, 'id_cat_cliente');
    }
}
