<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PacienteCorreo extends Mailable
{
    use Queueable, SerializesModels;
    public $paciente;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $paciente)
    {
        $this->paciente = $paciente; 
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
                return $this->from('edwin@ed.tumedibot.com', 'Mensaje')
                ->subject('Paciente tumedibot')
                ->view('enviar_correo')
                ->with([
                    'paciente' => $this->paciente,
                ]);
    }
}
