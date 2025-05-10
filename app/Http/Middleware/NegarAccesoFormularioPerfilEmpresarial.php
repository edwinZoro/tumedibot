<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class NegarAccesoFormularioPerfilEmpresarial
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
        $b = User::where('id',Auth::id())->get();

        foreach ($b as $key => $value) {
           $c =  $value->pagos_clinicas;
           $user = $value->id;
           if($c === 'positive'){
            return $next($request);
           }
           else{
            return redirect()->route('area_empresarial_get',$user)->with('status','estatus');
           }
        }
    }
}
