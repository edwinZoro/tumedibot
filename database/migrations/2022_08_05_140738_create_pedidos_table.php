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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('transaccion_id',20);
            $table->decimal('total',$precision = 8, $scale = 2);
            $table->decimal('sub_total',$precision = 8, $scale = 2);
            $table->decimal('iva',$precision = 8, $scale = 2);
            $table->string('plan',50);
            $table->integer('ticket');
            $table->string('fecha_pedido',100);
            $table->string('fecha_vence_pedido',100);
            $table->string('estado',50);
            $table->foreign('factura_id')
            ->references('id')
            ->on('facturas')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE pedidos MODIFY COLUMN ticket INTEGER (10);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
