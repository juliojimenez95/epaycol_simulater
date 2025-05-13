<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->string('referencia_pago')->unique();
            $table->decimal('valor', 10, 2);
            $table->string('metodo_pago');
            $table->string('estado')->default('pendiente'); // pendiente, aprobado, rechazado
            $table->string('documento_cliente');
            $table->string('nombre_cliente');
            $table->string('email_cliente');
            $table->timestamp('fecha_pago')->nullable();
            $table->json('datos_factura')->nullable(); // Para facturación electrónica
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
