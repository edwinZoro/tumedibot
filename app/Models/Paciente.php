<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Paciente extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'pacientes';
    protected $fillable = ['id','nombre_paciente', 'tlf_paciente', 'email_paciente', 'edad', 'peso', 'estatura', 'created_at', 'updated_at'];

    public function routeNotificationForMail()
{
    return $this->email_paciente;
}

}

