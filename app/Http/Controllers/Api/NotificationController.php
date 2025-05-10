<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Paciente;

class NotificationController extends Controller
{
    /**
     * Obtiene todas las notificaciones del usuario autenticado (médico o paciente).
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $user = Auth::user();

        if ($user->medico) {
            $medico = $user->medico;
            return response()->json($medico->notifications()->orderBy('created_at', 'desc')->get());
        } elseif ($user->paciente) {
            $paciente = $user->paciente;
            return response()->json($paciente->notifications()->orderBy('created_at', 'desc')->get());
        }

        return response()->json(['error' => 'Tipo de usuario no reconocido'], 400); // Manejo en caso de un tipo de usuario inesperado
    }

    /**
     * Marca una notificación específica como leída para el usuario autenticado.
     *
     * @param  string  $id El ID de la notificación.
     * @return JsonResponse
     */
    public function markAsRead(string $id): JsonResponse
    {
        $user = Auth::user();

        if ($user->medico) {
            $medico = $user->medico;
            $notification = $medico->notifications()->findOrFail($id);
        } elseif ($user->paciente) {
            $paciente = $user->paciente;
            $notification = $paciente->notifications()->findOrFail($id);
        } else {
            return response()->json(['error' => 'Tipo de usuario no reconocido'], 400);
        }

        if (!$notification->read_at) {
            $notification->markAsRead();
        }

        return response()->json(['message' => 'Notificación marcada como leída']);
    }
}