<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Medico;

class NotificacionCita extends Notification //implements ShouldQueue
{
   // use Queueable;

    protected $cita;
    protected $mensaje;
    public $medico;

    public function __construct($cita, $mensaje, Medico $medico)
    {
        $this->cita = $cita;
        $this->mensaje = $mensaje;
        $this->medico = $medico;
    }

    public function via($notifiable)
    {
        // Define por qué canales se enviará la notificación (ej: 'mail', 'database', 'broadcast')
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $fechaFormateada = \Carbon\Carbon::parse($this->cita->start)->format('d/m/Y H:i');
        
        return (new MailMessage)
            ->subject('Recordatorio de cita médica')
            ->line($this->mensaje)
            ->line('') // Espacio en blanco
            ->line('**Detalles de la cita:**')
            ->line('Fecha y hora: ' . $fechaFormateada)
            ->line('') // Espacio en blanco
            ->line('**Médico asignado:**')
            ->line('Nombre: Dr. ' . $this->medico->nombre . ' ' . $this->medico->apellido)
            ->line('Especialidad: ' . $this->medico->especialidad->nombre_especialidad)
            ->line('') // Espacio en blanco
            ->line('Gracias por confiar en nuestros servicios')
            ->action('Ver detalles de la cita', url('/mis-citas')); // Usa tu URL real
    }

    public function toDatabase($notifiable)
    {
        return [
            'mensaje' => $this->mensaje,
            'cita_id' => $this->cita->id,
            'fecha_hora' => $this->cita->start,
        ];
    }

    // Opcional: Para notificaciones en tiempo real (WebSockets)
    // public function toBroadcast($notifiable)
    // {
    //     return new BroadcastMessage([
    //         'mensaje' => $this->mensaje,
    //         'cita_id' => $this->cita->id,
    //         'fecha_hora' => $this->cita->fecha_hora,
    //     ]);
    // }
}