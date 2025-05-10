<style type="text/css">
  .custom-btn {
  width: 160px;
  height: 40px;
  color: #fff;
  border-radius: 5px;
  padding: 5px 5px;
  font-family: "Cormorant Garamond", sans-serif;
  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}

/* 5 */
.btn-5 {
  width: 130px;
  height: 40px;
  line-height: 42px;
  padding: 0;
  border: none;
  background: rgb(255,27,0);
background: linear-gradient(0deg, rgba(255,27,0,1) 0%, rgba(251,75,2,1) 100%);
}
.btn-5:hover {
  color: aqua;
  background: transparent;
   box-shadow:none;
}
.btn-5:before,
.btn-5:after{
  content:'';
  position:absolute;
  top:0;
  right:0;
  height:2px;
  width:0;
  background:aqua;
  box-shadow:
   -1px -1px 5px 0px white,
   7px 7px 20px 0px #0003,
   4px 4px 5px 0px #0002;
  transition:400ms ease all;
}
.btn-5:after{
  right:inherit;
  top:inherit;
  left:0;
  bottom:0;
}
.btn-5:hover:before,
.btn-5:hover:after{
  width:100%;
  transition:800ms ease all;
}
.forgot{
    text-decoration: none;
}
.forgot:hover{
    color: black;
    text-shadow:0 0 4px rgba(0,255,0,0.5);
    transition: all 0.5s;
}

</style>

<x-guest-layout >
   
    <x-auth-card>
       <div class="container text-white p-3 mt-5" >

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors  :errors="$errors" />

         <div class="container-fluid  col-sm-4" style="box-shadow: 0 0 3px white,0 0 6px rgba(0,255,0,0.5)">
             
        
        <form class="m-3" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label class="form-label" for="email" :value="__('Email')" /><br>

                <x-input style="border-color: rgba(0,255,0,0.5)" class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div >
                <x-label class="form-label" for="password" :value="__('Password')" /><br>

                <x-input style="border-color: rgba(0,255,0,0.5)"   class="form-control" id="password" 
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div >
                <label for="remember_me" >
                    <input id="remember_me" type="checkbox"  name="remember">
                    <span >{{ __('Recordar') }}</span>
                </label>
            </div>

            <div >
                @if (Route::has('password.request'))
                    <a class="forgot m-2 text-success" href="{{ route('password.request') }}">
                        {{ __('¿Olvido su Contraseña?') }}
                    </a>
                @endif

                <x-button class="custom-btn btn-5" >
                    {{ __('Ingrese') }}
                </x-button>
            </div>
            <div class="text-center mt-2">
              <a class="forgot m-2 text-success" href="{{ route('register') }}">¿No se ha Registrado?</a>
            </div>
        </form>
         </div>

        </div>  
    </x-auth-card>

</x-guest-layout>
