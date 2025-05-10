<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\HistorialPaciente;
use App\Models\Paciente;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PDFController extends Controller
{
    public function historico($id) {
        $historial = HistorialPaciente::with(['notas', 'archivos', 'cita', 'cita.medico', 'cita.medico.municipio'])->find($id);
        if (!$historial) {
            abort(404, 'Historial no encontrado.');
        }
        $logoPath = $historial->cita->medico->logo ?? null;
        $logoBase64 = null;
        if ($logoPath) {
            $logoFullPath = storage_path("app/public/{$logoPath}");
            if (file_exists($logoFullPath)) {
                $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoFullPath));
            }
        }
        $pdf = Pdf::loadView('historialPacientes.historial', compact('historial', 'logoBase64'));
        return $pdf->stream('historial.pdf');
    }

    public function historico_completo($id){
        $historiales = HistorialPaciente::where('id_paciente', $id)->with(['notas', 'archivos', 'cita', 'cita.medico'])->get();
        $pdf = Pdf::loadView('historialPacientes.historialcompleto',  compact('historiales'));
        return $pdf->stream('historial.pdf');
    }
}
