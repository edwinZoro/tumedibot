<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Notifications\Notifiable; // Importa el trait Notifiable
use App\Models\Traits\EncryptsAttributes;
class Medico extends Model
{
    //direccion
    //'av_calle','nombre_av_calle','ca_ed_cc','nombre_ca_ed_cc','nmro_ca_ed_cc','hospital_clinica','nombre_hos_cli','nmro_hos_cli'
    use HasFactory, EncryptsAttributes, Notifiable;
	protected $fillable = [
        'nombre','apellido','second_name','last_name','sexo','telefono','whatsapp','correo','revendedor','pais_id','estado_id','ciudad_id','direccion' ,'especialidad_id','consultorio_costo','horario','experiencia','usted_es' ,'perfil_medico','tratamientos','foto','facebook','twitter','linkedin','instagram','pagos','route','name_temp','name_original','user_id', 'logo' ];
   
    protected $encrypted = [
          'sexo', 'telefono', 'whatsapp', 'revendedor', 'horario','direccion', 'experiencia', 'usted_es', 'perfil_medico', 'tratamientos'
    ];

    public function routeNotificationForMail($notification)
    {
        return $this->correo; // Si el campo no es "email"
    }

    public function getEncryptedFields()
    {
        return $this->encrypted;
    }

    //Relacion inversa uno  uno
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

        //Relacion inversa uno  uno
    public function especialidad(){
        return $this->belongsTo(Especialidades::class);
    }

        //Relacion inversa uno  uno
    public function calendar(){
        return $this->belongsTo('App\Models\Calendar','medico_id','id');
    }

    public function pais(){
        return $this->belongsTo(Pais::class);
     }

    public function estado(){
        return $this->belongsTo(State::class);
     }

     public function ciudad(){
        return $this->belongsTo(Ciudad::class);
     }

    protected function Nombre(): Attribute {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value),
        );
    }

    protected function Apellido(): Attribute {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value),
        );
    }


}
