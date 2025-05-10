<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;
    protected $table = 'citas';

    protected $fillable = ['name', 'color', 'start', 'end', 'timed', 'id_paciente', 'id_medico', 'motivo_consulta', 'sintomas', 'estado','estado_cita','tipo'];

    public $timestamps = false;

    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'id_paciente');
    }

    public function medico()
    {
        return $this->belongsTo('App\Models\Medico', 'id_medico');
    }

    public function historiales()
    {
        return $this->hasMany('App\Models\HistorialPaciente', 'id_cita');
    }

    protected $casts = [
        'start' => 'datetime', // Convierte el string a Carbon
    ];
}
