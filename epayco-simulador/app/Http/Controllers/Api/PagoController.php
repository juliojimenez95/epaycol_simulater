<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pago;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'referencia_pago' => 'required|unique:pagos',
            'valor' => 'required|numeric',
            'metodo_pago' => 'required',
            'documento_cliente' => 'required',
            'nombre_cliente' => 'required',
            'email_cliente' => 'required|email',
        ]);

        $pago = Pago::create([
            'referencia_pago' => $request->referencia_pago,
            'valor' => $request->valor,
            'metodo_pago' => $request->metodo_pago,
            'documento_cliente' => $request->documento_cliente,
            'nombre_cliente' => $request->nombre_cliente,
            'email_cliente' => $request->email_cliente,
            'estado' => 'pendiente',
        ]);

        return response()->json([
            'mensaje' => 'Pago registrado correctamente',
            'pago' => $pago
        ], 201);
    }

    public function aprobar($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->estado = 'aprobado';
        $pago->fecha_pago = now();
        $pago->datos_factura = json_encode([
            'nit_empresa' => '900123456',
            'resolucion_dian' => '1876400001',
            'cufe' => strtoupper(uniqid("CUFE_")),
        ]);
        $pago->save();

        return response()->json([
            'mensaje' => 'Pago aprobado y datos de factura generados',
            'pago' => $pago
        ]);
    }
}
