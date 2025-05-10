<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

class NegarAccesoCalendarioPaciente
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
   public function handle(Request $request, Closure $next)
    {
        // Obtener el parámetro 'user' de la ruta actual
        $userId = $request->route('user'); // Mejor práctica usando Request

        // Verificar si el usuario está autenticado y el parámetro existe
        if (!$userId || Auth::id() != $userId) {
            // Redirigir o abortar según tu lógica
            return redirect('/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador'); // Ejemplo: redirige a la página principal
            // O también puedes usar abort(403);
        }

        return $next($request);
    }
}
