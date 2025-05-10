<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;
    protected $table = 'archivos';
    protected $fillable = ['id_historial', 'nombre_archivo', 'ruta_archivo', 'tipo', 'extension'];

    public $timestamps = false;

    public function historialPaciente()
    {
        return $this->belongsTo('App\Models\HistorialPaciente', 'id_historial');
    }
}
