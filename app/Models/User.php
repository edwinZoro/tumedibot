<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\UserResetPassword;
use App\Notifications\VerifyCorreo;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'pagos',
        'pagos_clinicas',
        'privacy',
        'confirmacion_codigo',
        'password',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'pagos',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //Relacion uno a uno
    public function medico(){
        return $this->hasOne('App\Models\Medico');
    }

    public function paciente(){
        return $this->hasOne('App\Models\Paciente');
    }
        //Relacion uno a uno
    public function factura(){
        return $this->hasOne('App\Models\Factura');
    }
    //reescribir funcion reset password
        public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPassword($token));
    }
     //reescribir funcion verify email
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyCorreo());
    }
}
