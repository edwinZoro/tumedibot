<?php

namespace App\Console\Commands;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
use App\Notifications\NotificacionCita; // Asegúrate de crear esta notificación
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;

class NotificarCitas extends Command
{
    protected $signature = 'citas:notificar';
    protected $description = 'Envía notificaciones de citas próximas.';

    public function handle()
    {
       $now = Carbon::now()->setTimezone(config('app.timezone'));

        // Notificar 3 días antes de la cita
        $citasTresDias = Cita::whereRaw('DATE(start) = DATE(DATE_ADD(NOW(), INTERVAL 3 DAY))')
                            ->get();
        $this->enviarNotificaciones($citasTresDias, 'Tu cita es en 3 días.');

        // Notificar 1 día antes de la cita
        $citasUnDia = Cita::whereRaw('DATE(start) = DATE(DATE_ADD(NOW(), INTERVAL 1 DAY))')
                         ->get();
        $this->enviarNotificaciones($citasUnDia, 'Tu cita es mañana.');

        // Notificar 1 hora antes de la cita (con margen de 5 minutos)
        $start = $now->copy()->addHour()->toDateTimeString();
        $end = $now->copy()->addHour()->addMinutes(5)->toDateTimeString();
        $citasUnaHora = Cita::whereBetween('start', [
                            $start,
                            $end
                        ])->get();
        $this->enviarNotificaciones($citasUnaHora, 'Tu cita es en 1 hora.');

        $this->info('Notificaciones de citas enviadas.');
        \Log::info("Cita tres dias: $citasTresDias ");
        \Log::info("cita un dia: $citasUnDia");

      // \Log::info('Contenido de $citasUnaHora:', $citasUnaHora->toArray()); 
    }
    protected function enviarNotificaciones($citas, $mensaje)
    {
        foreach ($citas as $cita) {
            $paciente = Paciente::find($cita->id_paciente); 

            //informacion del medico

            $medico = Medico::with('especialidad')->find($cita->id_medico);

        if ($paciente) {
            // Enviar notificación al modelo Paciente, no al email
            $paciente->notify(new NotificacionCita($cita, $mensaje, $medico)); 
            $this->info("Notificación enviada a {$paciente->email_paciente}: {$mensaje}");
        } else {
            $this->warn("Paciente no encontrado para la cita ID: {$cita->id}");
        }
            // Para este ejemplo, simplemente logueamos la notificación
            $this->info("Notificación para la cita ID {$cita->id}: {$mensaje} - {$cita->fecha_hora}");
        }
    }
}