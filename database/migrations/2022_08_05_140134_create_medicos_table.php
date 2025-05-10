<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('second_name',100)->nullable();
            $table->string('last_name',100)->nullable();
            $table->string('sexo',50);
            $table->string('telefono',15);
            $table->string('correo',100)->unique();
            $table->string('revendedor',50)->nullable();
            $table->string('estado',100);
            $table->string('ciudad',100);
            $table->string('parroquia',100);
            $table->string('av_calle',100);
            $table->string('nombre_av_calle',100);
            $table->string('ca_ed_cc',100);
            $table->string('nombre_ca_ed_cc',100);
            $table->string('nmro_ca_ed_cc',100);
            $table->string('hospital_clinica',100);
            $table->string('nombre_hos_cli',100);
            $table->string('nmro_hos_cli',100);
            $table->string('especialidad',100);
            $table->decimal('consultorio_costo', $precision = 4, $scale = 2);
            $table->string('horario',100);
            $table->time('horario_start',$precision=4);
            $table->time('horario_end',$precision=4);
            $table->integer('experiencia');
            $table->string('usted_es',100);
            $table->string('foto');
            $table->text('perfil_medico',1500);
            $table->string('facebook',150)->nullable();
            $table->string('twitter',150)->nullable();
            $table->string('linkedin',150)->nullable();
            $table->string('instagram',150)->nullable();   
            $table->string('pagos',100)->nullable();  
            $table->unsignedBigInteger('user_id')->unique();
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->rememberToken();      
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
        Schema::dropIfExists('medicos');
    }
};
