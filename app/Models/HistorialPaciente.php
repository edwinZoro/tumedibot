<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialPaciente extends Model
{
    use HasFactory;
    protected $table = 'historial_clinico';
    protected $fillable = ['id_paciente', 'id_cita', 'diagnostico', 'tratamiento', 'conclusiones', 'examen_paraclinico', 'examen_fisico', 'examen_funcional'];

    public $timestamps = false;

    public function cita()
    {
        return $this->belongsTo('App\Models\Cita', 'id_cita');
    }

    public function paciente()
    {
        return $this->hasOne('App\Models\Paciente');
    }

    public function notas()
    {
        return $this->hasMany('App\Models\Nota', 'id_historial');
    }

    public function archivos()
    {
        return $this->hasMany('App\Models\Archivo', 'id_historial');
    }
}
