<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Medico;
class NegarAccesoPerfilesConId
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
        $id = $request->medico->user_id;
       $b = Medico::where('user_id','=',$id)
       ->where('pagos','=','positive')->get();
       foreach ($b as $key => $value) {
           $c = $value->pagos;
             if($c === 'positive'){
            return $next($request);
           }
       }
       return redirect()->back()->with('status_pago','debe pagar');
        
    }
}
