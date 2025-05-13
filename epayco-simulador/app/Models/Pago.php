<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
    'referencia_pago',
    'valor',
    'metodo_pago',
    'estado',
    'documento_cliente',
    'nombre_cliente',
    'email_cliente',
    'fecha_pago',
    'datos_factura',
];
}
