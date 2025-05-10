<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\EncryptsAttributes;

class Clinica extends Model
{
    use HasFactory, EncryptsAttributes;
    protected $table = 'clinica';

    protected $fillable = ['tipo_negocio','nombre','direccion','telefono','whatsapp','perfil_clinica','servicios','correo','revendedor','pais_id','estado_id','ciudad_id','facebook','twitter','linkedin','instagram','foto_a','foto_b','foto_c','foto_d','foto_e','foto_f','pagos','user_id'];

    protected $encrypted = ['telefono','whatsapp','facebook','twitter','linkedin','instagram','foto_a','foto_b','foto_c','foto_d','foto_e','foto_f','perfil_clinica','servicios'];


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

}