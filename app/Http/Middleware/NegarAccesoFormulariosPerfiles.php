<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class NegarAccesoFormulariosPerfiles
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
        $b = User::where('id',Auth::id())->get();

        foreach ($b as $key => $value) {
           $c =  $value->pagos;
           $user = $value->id;
           if($c === 'positive'){
            return $next($request);
           }
           else{
            return redirect()->route('area_medico_get',$user)->with('status','estatus');
           }
        }
        
    }
}
