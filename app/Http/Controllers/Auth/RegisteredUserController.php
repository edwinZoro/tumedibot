<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Rules\ReCaptcha;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'pagos' => 'string|max:25',
            'pagos_clinicas' => 'string|max:25',
            'privacy' => 'string|max:25|required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            //'g-recaptcha-response' => ['required', new ReCaptcha]
 
        ],[
            'g-recaptcha-response.required' => 'El Recaptcha es obligatorio para poder continuar.'
            ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'pagos' => $request->oculto,
            'pagos_clinicas' => $request->oculto,
            'privacy' => 'aceptado',
            'password' => Hash::make($request->password),

        ]);

        event(new Registered($user));

        Auth::login($user);

        return view('auth.verify-email');
       // return redirect()->route('login');
    
    }
}
