<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    public function subirArchivo(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:jpg,jpeg,png,pdf',
            'id_historial' => 'required|exists:historial_clinico,id',
            'tipo' => 'required|in:EXAMEN,RADIOLOGÍA,RECETA,LABORATORIO,OTRO',
        ]);
        $archivo = $request->file('archivo');
        $extension = $archivo->getClientOriginalExtension();
        $directorio = "archivos/" . (in_array($extension, ['jpg', 'jpeg', 'png']) ? 'imagenes' : 'pdfs');
        $ruta = $archivo->store($directorio, 'public');
        $archivoDB = Archivo::create([
            'id_historial' => $request->id_historial,
            'nombre_archivo' => $archivo->getClientOriginalName(),
            'ruta_archivo' => "storage/$ruta",
            'tipo' => $request->tipo,
            'extension' => $extension
        ]);
        return response()->json([
            'mensaje' => 'Archivo subido correctamente',
            'archivo' => $archivoDB,
            'extension' => $extension
        ], 201);
    }

    public function eliminarArchivo($id)
    {
        $archivo = Archivo::findOrFail($id);
        if (Storage::disk('public')->exists(str_replace('storage/', '', $archivo->ruta_archivo))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $archivo->ruta_archivo));
        }
        $archivo->delete();
        return response()->json(['mensaje' => 'Archivo eliminado correctamente'], 200);
    }
}
