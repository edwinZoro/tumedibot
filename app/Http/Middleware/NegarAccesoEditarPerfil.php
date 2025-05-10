<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;

class NegarAccesoEditarPerfil
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        /*Auth::id() === $id_medico $cas = explode("/",$request->path());
        $id_medico =  intval($cas[1]);*/ 

        if(Auth::id() == $request->medico->user_id){
        return $next($request);
        }
        else{
            return redirect()->back();
        }
                    
    }
}
