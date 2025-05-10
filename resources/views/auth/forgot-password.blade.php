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
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-white text-center">
            {{ __('¿Olvido su contraseña? No hay problema. Dejenos su correo y le enviaremos un enlace que le permitira resetear su contraseña.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
         <div class="container-fluid  col-sm-4" style="box-shadow: 0 0 3px white,0 0 6px rgba(0,255,0,0.5)">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label class="form-label text-white" for="email" :value="__('Email')" /><br>

                <x-input style="border-color: rgba(0,255,0,0.5)" id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4 text-white">
                <x-button class="custom-btn btn-5">
                    {{ __('Cambiar Clave') }}
                </x-button>
            </div>
        </form>
       </div> 
    </x-auth-card>
</x-guest-layout>
