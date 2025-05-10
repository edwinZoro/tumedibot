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
        <div class="container  text-white p-3 mt-5" >
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esta es una área segura en la aplicación. Por favor confirme su contraseña antes de continuar.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="container-fluid  col-sm-5" style="box-shadow: 0 0 3px white,0 0 6px rgba(0,255,0,0.5)">

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
                      <div class="row">
                <div class="col-md-12">
                                    <x-label class="form-label" for="password" :value="__('Password')" />

                <x-input id="password" style="border-color: rgba(0,255,0,0.5)" class="form-control"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                </div>
                <div class="col-md-12">
                              
                <x-button class="custom-btn btn-5">
                    {{ __('Confirmar') }}
                </x-button>
                </div>
            </div>        
        </form>
      </div>  
    </div>
    </x-auth-card>
</x-guest-layout>
