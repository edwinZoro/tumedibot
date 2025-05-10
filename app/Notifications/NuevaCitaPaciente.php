<?php

namespace App\Notifications;

use App\Models\CitaPaciente;
use App\Models\Paciente;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevaCitaPaciente extends Notification 
{
    use Queueable;

    protected $paciente;
    protected $cita;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Paciente $paciente, CitaPaciente $cita)
    {
        $this->paciente = $paciente;
        $this->cita = $cita;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','mail'];
    }

    /**
     * Get the database representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'paciente_id' => $this->paciente->id,
            'paciente_nombre' => $this->paciente->nombre_paciente,
            'cita_tipo' => $this->cita->tipo,
            'paciente_email' => $this->paciente->email_paciente,
            'mensaje' => "El Paciente {$this->paciente->nombre_paciente} Agendo una cita de tipo {$this->cita->tipo}.  Correo: {$this->paciente->email_paciente}. ",
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Nueva cita agendada por {$this->paciente->nombre_paciente}") 
            ->line("El Paciente {$this->paciente->nombre_paciente} ha agendado una cita.")
            ->line("Tipo de cita: {$this->cita->tipo}")
            ->line("Correo del paciente: {$this->paciente->email_paciente}")
            ->line('Nota: Usted debe asignarle la fecha y hora en la sección Citas de la app Tumedibot.com');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'paciente_id' => $this->paciente->id,
            'paciente_nombre' => $this->paciente->nombre_paciente,
            'cita_tipo' => $this->cita->tipo,
            'paciente_email' => $this->paciente->email_paciente,
            'mensaje' => "El Paciente {$this->paciente->nombre_paciente} ha agendado una cita de tipo {$this->cita->tipo}, comuníquese a su correo {$this->paciente->email_paciente} lo más pronto posible. Nota: Usted debe asignarle la fecha y hora en la sección Citas de la app Tumedibot.com",
        ];
    }
}