<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;
    protected $table = 'notas';
    protected $fillable = ['id', 'id_historial', 'contenido'];

    public $timestamps = false;

    public function historialPaciente()
    {
        return $this->belongsTo('App\Models\HistorialPaciente', 'id_historial');
    }
}
