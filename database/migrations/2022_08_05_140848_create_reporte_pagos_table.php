<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_pagos', function (Blueprint $table) {
            $table->id();
            $table->string('transaccion_id',12);
            $table->string('banco_emisor',100);
            $table->string('banco_receptor',100);
            $table->integer('nmro_referencia');
            $table->string('monto_pagado',100);
            $table->string('metodo_transaccion',100);
            $table->decimal('total',$precision = 8, $scale = 2);
            $table->decimal('sub_total',$precision = 8, $scale = 2);
            $table->decimal('iva',$precision = 8, $scale = 2);
            $table->decimal('ingreso',$precision = 8, $scale = 2);
            $table->decimal('egreso',$precision = 8, $scale = 2);
            $table->decimal('credito',$precision = 8, $scale = 2);
            $table->string('fecha_transaccion',100);
            $table->string('fecha_vence_transaccion',100);
            $table->string('estado',20);
            $table->integer('factura_id');
            $table->foreign('pedidos_id')
            ->references('id')
            ->on('pedidos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE reporte_pagos MODIFY COLUMN nmro_referencia INTEGER (12);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reporte_pagos');
    }
};
