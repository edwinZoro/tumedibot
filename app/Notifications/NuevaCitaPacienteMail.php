<?php

namespace App\Notifications;

use App\Models\Cita;
use App\Models\Medico;
use App\Models\Paciente;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevaCitaPacienteMail extends Notification 
{
    use Queueable;

    protected $paciente_mail;
    protected $cita;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Paciente $paciente_mail, Cita $cita)
    {
        $this->paciente_mail = $paciente_mail;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
       $medico = Medico::findOrFail($this->cita->id_medico); 
       return (new MailMessage)
            ->subject("Nueva cita asignada en Tumedibot.com") 
            ->line("Especialidad: {$medico->especialidad->nombre_especialidad}")
            ->line("El Médico {$medico->nombre} {$medico->apellido} le ha asignado una cita.")
            ->line("Tipo de cita: {$this->cita->tipo}")
            ->line("Fecha de cita: " . $this->cita->start->format('d-m-Y H:i'));
            //->line('Nota: Usted debe asignarle la fecha y hora en la sección Citas de la app Tumedibot.com');
    }

        public function toDatabase($notifiable)
    {
       $medico = Medico::findOrFail($this->cita->id_medico);
       return [

            'paciente_id' => $this->paciente_mail->id,
            'paciente_nombre' => $this->paciente_mail->nombre_paciente,
            'cita_tipo' => $this->cita->tipo,
            'paciente_email' => $this->paciente_mail->email_paciente,
            'mensaje' => "El Médico {$medico->nombre} {$medico->apellido}  le asigno una cita de tipo {$this->cita->tipo}. Fecha de cita:" . $this->cita->start->format('d-m-Y H:i'),
        ];
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
           
        ];
    }
}
