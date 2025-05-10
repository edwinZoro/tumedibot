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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('celular',100);
            $table->integer('ci_rif');
            $table->string('pais',100);
            $table->string('estado',100);
            $table->string('ciudad',100);
            $table->string('direccion',100);
            $table->string('plan',50);
            $table->integer('codigo_postal');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE facturas MODIFY COLUMN ci_rif INTEGER (8);');
        DB::statement('ALTER TABLE facturas MODIFY COLUMN codigo_postal INTEGER (4);');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
};
