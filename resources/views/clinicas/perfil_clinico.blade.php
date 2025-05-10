<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
      <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
  <meta name="description" content="medibot" />
  <meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
    <title>{{$clinica->tipo_negocio}} {{$clinica->nombre}}</title>
    <link rel="icon" type="image/x-icon" href="..\..\icon_medibot.png" />
    <!-- Bootstrap core CSS -->
    <link href={{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\css\bootstrap.min.css')}}  rel="stylesheet">
    <link href="../../bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\font\bootstrap-icons.css" rel="stylesheet" />
    <link href={{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\fuentes\fuentes_tumedibot.css')}}  rel="stylesheet">
    <link href={{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\perfil_clinico.css')}}  rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href={{asset('bootstrap-4.0.0\bootstrap-4.0.0\docs\4.0\examples\carousel\carousel.css')}} rel="stylesheet">
  </head>
  <body>
  <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href={{route('lista_medico')}}><img src={{asset('medibot_f.png')}}></a>
        <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
             <li class=" ">
                 <a class="nav-link text-underline" href="{{route('lista_medico')}}"><i class="bi bi-journal-plus"></i> Buscar Médicos</a>
        
                </li>
            <li class="nav-item">
              <a class="nav-link " href={{route('lista_empresarial')}}><i class="bi bi-building"></i> Empresas De Salud</a>
            </li>
             <li >
              <a class="nav-link" href={{route('disease_robot')}}><i class="bi bi-thermometer-half"></i> Buscar enfermedad <span class="sr-only"></span></a>
            </li>
        <li class=" ">
          <a class="nav-link text-underline" href="{{route('perfilesMedicosAutenticated',Auth::id())}}"><i class="bi bi-shield-plus"></i> Soy Doctor</a>
          </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0" method="POST" action="/logout">
              {{ csrf_field() }}           
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="bi bi-box-arrow-left"></i> Salir</button>
          </form>
        </div>
      </nav>
  </header>

    <main role="main">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="first-slide" src="../../imagen_clinicas/{{$clinica->foto_a}}" alt="First slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <p><a class="btn btn-lg btn-secondary {{$clinica->instagram !== '' ?'btn-secondary':'disabled'}}" href="{{$clinica->instagram}}" target="_blank" role="button"><i class="bi bi-instagram"></i> instagram</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img class="second-slide" src="../../imagen_clinicasb/{{$clinica->foto_b}}" alt="Second slide">
            <div class="container">
              <div class="carousel-caption text-left">
                <p><a class="btn btn-lg btn-primary {{$clinica->facebook !== '' ?'btn-primary':'disabled'}}" href="{{$clinica->facebook}}" target="_blank" role="button"><i class="bi bi-facebook"></i> facebook</a></p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
{{--             <div class="carousel-caption text-left" style="color:rgba(0,0,0,0.8);">
              <h1>Encuentrenos fácilmente con google maps</h1>
            </div> --}}

            <img class="third-slide" src="../../imagen_clinicasc/{{$clinica->foto_c}}" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


      <!-- Marketing messaging and featurettes
      ================================================== -->
      <!-- Wrap the rest of the page in another container to center all the content. -->

      <div class="container marketing">
        <div class="mb-5">
          <h1 class="text-center fuente_f enterprise_title"  title="{{$clinica->tipo_negocio}} {{$clinica->nombre}}" description="{{$clinica->servicios}}">{{$clinica->tipo_negocio}} {{$clinica->nombre}}</h1>
        </div>
        <!-- START THE FEATURETTES -->
        <div class="row featurette back">
          <div class="col-md-7 black fuente_c p">

            <h2 class="featurette-heading fuente_e black">Acerca de Nosotros. </h2>
            <img class="invert" src={{asset('tumedibot/images/5cba07532fef7f2a520f7018870a8e96.png')}} alt="fondo_pantalla" >
            <p> {!!$clinica->perfil_clinica!!}. </p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto shadow"  src="../../imagen_clinicasd/{{$clinica->foto_d}}" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette backb">
          <div class="col-md-7 order-md-2">
            <h2 class="featurette-heading fuente_e black">Servicios Disponibles. </h2>
            <img class="invert" src={{asset('tumedibot/images/5cba07532fef7f2a520f7018870a8e96.png')}} alt="fondo_pantalla" >
            <p class="black fuente_c p" >{{$clinica->servicios}}.</p>
          </div>
          <div class="col-md-5 order-md-1">
            <img class="featurette-image img-fluid mx-auto shadow"   src="../../imagen_clinicase/{{$clinica->foto_e}}" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette back">
          <div class="col-md-7">
            <h2 class="featurette-heading fuente_e black">Contacto. </h2>
            <img class="invert" src={{asset('tumedibot/images/5cba07532fef7f2a520f7018870a8e96.png')}} alt="fondo_pantalla" >
            <p class="black fuente_c p" ><i class="bi bi-geo-alt" style="color:#b50000"></i> En: {{$clinica->estado->nombre_paises}} - {{$clinica->municipio->name}} - {{$clinica->parroquia->name}}, {{$clinica->direccion}}.</p>
            <p class="black fuente_c p" ><i class="bi bi-telephone-plus darkblue"></i> {{$clinica->telefono}}.</p>
            <p class="black fuente_c p" ><i class="{{$clinica->whatsapp !== '' ?'bi bi-whatsapp green':''}}"></i> {{$clinica->whatsapp}}.</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto shadow"   src="../../imagen_clinicasf/{{$clinica->foto_f}}" alt="Generic placeholder image">
          </div>
        </div>

        <hr class="featurette-divider">

        <!-- /END THE FEATURETTES -->

      </div><!-- /.container -->
    </main>
          <!-- FOOTER -->
      <footer class=" navbar-dark text-light bg-dark p-4 mt-2">
        <div class="row">
          <div class="col-sm-4 mt-2 text-center">
            <i class="bi bi-envelope"></i> {{$clinica->correo}}
          </div>
          <div class="col-sm-4 text-center mt-2">
           <a class="text-light disabled" target="_blank"  href="{{$clinica->twitter}}"><i class="bi bi-twitter"></i></a>
           <a class="text-light" target="_blank"  href="{{$clinica->facebook}}"><i class="bi bi-facebook"></i></a>
           <a class="text-light" target="_blank" href="{{$clinica->instagram}}"><i class="bi bi-instagram"></i></a>
           <a class="text-light" target="_blank"  href="{{$clinica->linkedin}}"><i class="bi bi-linkedin"></i></a>
           <p class="mt-2">&copy; 2023 tumedibot.com &middot; <a class="text-light " href="#">Privacidad</a> &middot; <a class="text-light" href="#">Terminos y condiciones</a> &middot; <a class="text-light" href="#">Politica de Cookies</a></p>
          </div>
          <div class="col-sm-4 text-center mt-2">
           <a class="text-light" href="#"><i class="bi bi-arrow-up-circle"></i></a>

          </div>
        </div>
      </footer>

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
  </body>
</html>

