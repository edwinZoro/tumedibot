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
      <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="{{asset('sweetalert2-11.4.8\package\dist\sweetalert2.min.css')}}"/>
  <script src='{{asset('sweetalert2-11.4.8\package\dist\sweetalert2.all.min.js')}}'></script>
  <link rel="icon" type="image/x-icon" href="{{asset('icon_medibot.png')}}" />
      <!-- Core theme CSS (includes Bootstrap)-->
  <link href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\font\bootstrap-icons.css')}}" rel="stylesheet" />
         <!-- Bootstrap core CSS -->
  <link href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\css\bootstrap.min.css')}}"  rel="stylesheet">
  <link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\fuentes\fuentes_tumedibot.css')}}"  rel="stylesheet">
  <link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\robot.css')}}" rel="stylesheet" /> 
    <!-- Custom styles for this template -->
  <link href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\docs\4.0\examples\carousel\carousel.css')}}" rel="stylesheet">
    </head>
<body id="page-top">
  <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#"><img src={{asset('medibot_f.png')}}></a>
        <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
      <li class="nav-item" id="area_medico">
        <a class="nav-link text-underline" href="{{route('area_medico_get',Auth::id())}}"><i class="bi bi-clipboard-plus"></i> &Aacuterea M&eacutedico</a>
       </li>       
      <li class="nav-item" id="area_empresarial">
        <a  class="nav-link text-underline" href="{{route('area_empresarial_get',Auth::id())}}"><i class="bi bi-gem"></i> &Aacuterea Empresarial</a>
       </li>  
             <li class=" ">
         <a class="nav-link text-underline pequeño" href="{{route('lista_medico')}}"><i class="bi bi-journal-plus"></i> Buscar Médicos</a>

        </li>
            <li class="nav-item">
              <a class="nav-link " href="{{route('lista_empresarial')}}"><i class="bi bi-building"></i> Empresas De Salud</a>
            </li>
        <li class=" ">
          <a class="nav-link text-underline pequeño" href="{{route('perfilesMedicosAutenticated',$user)}}"><i class="bi bi-shield-plus"></i> Soy Doctor</a>
          </li>
          </ul>
          <!-- mibew button --><a id="mibew-agent-button" href="/helpChat/chat?locale=es" target="_blank" onclick="Mibew.Objects.ChatPopups['67912371209871dd'].open();return false;"><img src="/helpChat/b?i=mibew&amp;lang=es" border="0" alt="" /></a><script type="text/javascript" src="/helpChat/js/compiled/chat_popup.js"></script><script type="text/javascript">Mibew.ChatPopup.init({"id":"67912371209871dd","url":"\/helpChat\/chat?locale=es","preferIFrame":true,"modSecurity":false,"forceSecure":false,"style":"","width":640,"height":480,"resizable":true,"styleLoader":"\/helpChat\/chat\/style\/popup"});</script><!-- / mibew button -->
          <form class="form-inline ml-2 mt-2 mt-md-0" method="POST" action="/logout">
              {{ csrf_field() }}           
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="bi bi-box-arrow-left"></i> Salir</button>
          </form>
        </div>
      </nav>
  </header>
<main class="mt-5 ">
    <div class="container text-white text-center">
      <h1 class="header back fuente_f my-5"  >Encontrar Enfermedades</h1>
      <a class="custom-btn btn-1" href="{{route('disease_robot')}}" target="_self"><i class="bi bi-gender-male"></i> 
       Hombre                            
     </a>
     <a class="custom-btn btn-15" href="{{route('disease_robot_woman')}}" target="_self"><i class="bi bi-gender-female"></i> 
      Mujer
    </a>

  </div>
  <div class="container-fluid my-4 row">
    <!-- Masthead Avatar Image-->

    <figure  class=" col-sm-6 text-center">
      <img width="300" height="300"  src="..\@yield('enlace')" alt="cuerpohumano" alt="cuerpohumano" class="img-fluid">
      {{-- <figcaption>Cuerpo Humano</figcaption> --}}
      <div class=" text-center">
        <small ><a class="btn-link" style="font-size: 11px;" href="http://www.freepik.com" target="_blank">brgfx / Freepik</a></small>
      </div>
    </figure>    
    <div class=" col-sm-6 p-2 fuente_a " >
     @yield('formulario')
   </div> 
    </div>
</main>

        <!-- Copyright Section-->
        <footer  class="bg-dark py-4 text-center text-white foo">
          <p class="p-2">  &copy; tumedibot 2023 <a class="forgot m-2 text-success" href="{{ route('privacy') }}"  target="_self">Privacidad</a> &middot; <a class="forgot m-2 text-success" href="{{ route('terms') }}" target="_self">Términos y condiciones</a> &middot; <a class="forgot m-2 text-success" href="{{ route('cookies') }}">Política de Cookies</a> &middot; <a class="forgot m-2 text-success" href="{{ route('manual_usuario') }}"  target="_self">Manual de Usuario</a><i class="bi bi-download"></i><a class="mx-3" href="#"><i class="bi bi-arrow-up-circle text-success" ></i></a></p>
        </footer>
        <style type="text/css">
          #area_empresarial{
            display: none;
          }    
          #area_medico{
             display: none;
          }
          .forgot:hover{
            opacity: 0.9;
            transition: all 0.5s;
          }
          #circle-green{
            width:32px; 
            height:32px;
          }
        .back{
        font-size: 60px;
        background:-webkit-linear-gradient(45deg,#2f64db,#13ef7f);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
        
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
      @if($factu_cli == $user)
            <script>
                let a = document.getElementById('area_empresarial');
                a.style.display='block';
            </script>
      @endif      
      @if($factu == $user)
            <script>
                let b = document.getElementById('area_medico');
                b.style.display='block';
            </script>
      @endif
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
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\jquery-slim.min.js')}}"></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\popper.min.js')}}" ></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\js\bootstrap.min.js')}}" ></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\holder.min.js')}}" ></script>
      </body>
      </html>
