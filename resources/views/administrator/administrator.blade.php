<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
      <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
  <meta name="description" content="medibot" />
  <meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
  <title>tumedibot</title> 
      <link rel="stylesheet" type="text/css" href={{asset('sweetalert2-11.4.8\package\dist\sweetalert2.min.css')}}/>
      <script src={{asset('sweetalert2-11.4.8\package\dist\sweetalert2.all.min.js')}}></script>
      <link rel="icon" type="image/x-icon" href="..\..\icon_medibot.png" />
      <!-- Google fonts-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
      <!-- Core theme CSS (includes Bootstrap)-->  
      <link href="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\boton_super_busqueda.css" rel="stylesheet" />
      <link href={{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\css\bootstrap.min.css')}}  rel="stylesheet">
      @livewireStyles
    </head>
<body id="page-top">
 <nav class="navbar navbar-dark bg-dark  text-uppercase fixed-top">
<div class="container-fluid">
  <div class="navbar-brand "><img class="brand img-fluid" src="../../medibot_f.png" alt="medibot"></div>
  <div class=" text-white text-center">
    <h3 class="background-clip title" style="font-family: gabriola">Administrador de AppWeb tumedibot</h3> 

  </div>
  <button class="navbar-toggler button" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
    <span ></span>

  </button>

  <div class="container my-2">
    <div class="collapse navbar-collapse" id="navbarsExample01">
      <ul class="navbar-nav mr-auto">
     <li id="area_medico">
        <a class="nav-link text-underline pequeño" href=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 148 180" width="6" height="6" fill="white"><path d="M352 128C352 198.7 294.7 256 223.1 256C153.3 256 95.1 198.7 95.1 128C95.1 57.31 153.3 0 223.1 0C294.7 0 352 57.31 352 128zM287.1 362C260.4 369.1 239.1 394.2 239.1 424V448C239.1 452.2 241.7 456.3 244.7 459.3L260.7 475.3C266.9 481.6 277.1 481.6 283.3 475.3C289.6 469.1 289.6 458.9 283.3 452.7L271.1 441.4V424C271.1 406.3 286.3 392 303.1 392C321.7 392 336 406.3 336 424V441.4L324.7 452.7C318.4 458.9 318.4 469.1 324.7 475.3C330.9 481.6 341.1 481.6 347.3 475.3L363.3 459.3C366.3 456.3 368 452.2 368 448V424C368 394.2 347.6 369.1 320 362V308.8C393.5 326.7 448 392.1 448 472V480C448 497.7 433.7 512 416 512H32C14.33 512 0 497.7 0 480V472C0 393 54.53 326.7 128 308.8V370.3C104.9 377.2 88 398.6 88 424C88 454.9 113.1 480 144 480C174.9 480 200 454.9 200 424C200 398.6 183.1 377.2 160 370.3V304.2C162.7 304.1 165.3 304 168 304H280C282.7 304 285.3 304.1 288 304.2L287.1 362zM167.1 424C167.1 437.3 157.3 448 143.1 448C130.7 448 119.1 437.3 119.1 424C119.1 410.7 130.7 400 143.1 400C157.3 400 167.1 410.7 167.1 424z"/></svg> &Aacuterea M&eacutedico</a>
     </li>    
        <li class=" ">
         <a class="nav-link text-underline pequeño" href="{{route('lista_medico')}}"> Buscar Médicos</a>

        </li>
        <li class=" ">
          <a class="nav-link text-underline pequeño" href=""> Soy Doctor</a>
          </li>
          <li class=" ">
            <form class="form" method="POST" action="/logout">
              {{ csrf_field() }}
              <svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" fill="white" class="bi bi-box-arrow-left" viewBox="0 0 16 10">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
              </svg>
              <button class="btn btn-dark pequeño" type="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                Salir            
              </button>       
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<main class="masthead">
  <h3 class="text-center text-success" >Super Administrator</h3>
  <div class="m-2 p-2">
  @livewire('example')   
  </div>
</main>

        <!-- Copyright Section-->
        <footer  class="bg-dark py-4 text-center text-white foo">
          <p class="p-2">Copyright &copy; tumedibot 2022 <a class="forgot m-2 text-success" href="{{ route('privacy') }}"  target="_self">Privacidad</a> &middot; <a class="forgot m-2 text-success" href="{{ route('terms') }}" target="_self">Términos y condiciones</a> &middot; <a class="forgot m-2 text-success" href="{{ route('cookies') }}">Política de Cookies</a><a class="mx-3" href="#"><svg xmlns="http://www.w3.org/2000/svg" fill="darkgreen" id="circle-green" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
          </svg></a></p>
        </footer>
        <style type="text/css">
          #area_medico{
            display: none;
          }
          .forgot:hover{
            color: black;
            text-shadow:0 0 4px rgba(0,255,0,0.5);
            transition: all 0.5s;
          }
          #circle-green{
            width:32px; 
            height:32px;
          }
          @media(max-width: 600px){
            .foo{
              font-size: 10px;
            }
            .title{
              display: none;
            }
            #circle-green{
                width:16px; 
                height:16px;   
            }
          }
          @media (min-height: 2560px){
            .foo{
              position: absolute;
              bottom: 0px;
              width: 100%;
              height:10%;
              padding: 100px;
            }
          }
        </style>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        {{-- <script src={{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\scripts.js')}} ></script> --}}
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src={{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\jquery-slim.min.js')}}></script>
        <script src={{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\popper.min.js')}} ></script>
        <script src={{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\js\bootstrap.min.js')}} ></script>
        <script src={{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\holder.min.js')}}></script>
        @stack('scripts')
        @livewireScripts  
      </body>
      </html>


