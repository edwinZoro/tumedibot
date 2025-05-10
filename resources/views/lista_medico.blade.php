
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tumedibot" />
    <meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
    <title>tumedibot</title>
    <link rel="icon" type="image/x-icon" href="..\..\icon_medibot.png" />
        <!-- Font Awesome icons (free version)
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
    -->
    <!-- Google fonts-->
    <link href="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\perfil.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\styles.css" rel="stylesheet" />
    <!-- Styles -->
    <link href="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\responsive_robot_disease.css" rel="stylesheet" />
    <link href="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\boton.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href={{asset('sweetalert2-11.4.8\package\dist\sweetalert2.min.css')}}/>
    <script src={{asset('sweetalert2-11.4.8\package\dist\sweetalert2.all.min.js')}}></script>
 {{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@5/dark.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script> --}}
</head>
<body id="page-top">
 <nav class="navbar navbar-dark bg-dark  text-uppercase fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand " href="{{route('disease_robot')}}"><img class="medibot" src="../../medibot_f.png" alt="medibot"></a>
      <div class="trabajo trabajob text-center text-white mb-2">
        <h3 style="font-family: gabriola" class="background-clip ">Busque su medico con tumedibot</h3> 
        
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span ></span>

    </button>
</div>
<div class="container my-2">
    <div class="collapse navbar-collapse" id="navbarsExample01">
        <ul class="navbar-nav mr-auto">
     <li id="area_medico">
        <a class="nav-link text-underline pequeño" href="{{$user == Auth::id() ? route('area_medico_get',$user): ''}}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 680" width="16" height="26" fill="white"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M352 128C352 198.7 294.7 256 223.1 256C153.3 256 95.1 198.7 95.1 128C95.1 57.31 153.3 0 223.1 0C294.7 0 352 57.31 352 128zM287.1 362C260.4 369.1 239.1 394.2 239.1 424V448C239.1 452.2 241.7 456.3 244.7 459.3L260.7 475.3C266.9 481.6 277.1 481.6 283.3 475.3C289.6 469.1 289.6 458.9 283.3 452.7L271.1 441.4V424C271.1 406.3 286.3 392 303.1 392C321.7 392 336 406.3 336 424V441.4L324.7 452.7C318.4 458.9 318.4 469.1 324.7 475.3C330.9 481.6 341.1 481.6 347.3 475.3L363.3 459.3C366.3 456.3 368 452.2 368 448V424C368 394.2 347.6 369.1 320 362V308.8C393.5 326.7 448 392.1 448 472V480C448 497.7 433.7 512 416 512H32C14.33 512 0 497.7 0 480V472C0 393 54.53 326.7 128 308.8V370.3C104.9 377.2 88 398.6 88 424C88 454.9 113.1 480 144 480C174.9 480 200 454.9 200 424C200 398.6 183.1 377.2 160 370.3V304.2C162.7 304.1 165.3 304 168 304H280C282.7 304 285.3 304.1 288 304.2L287.1 362zM167.1 424C167.1 437.3 157.3 448 143.1 448C130.7 448 119.1 437.3 119.1 424C119.1 410.7 130.7 400 143.1 400C157.3 400 167.1 410.7 167.1 424z"/></svg> &Aacuterea M&eacutedico</a>
     </li>    
          <li>
             <a class="nav-link text-underline pequeño" href="{{route('disease_robot')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" fill="white" class="bi bi-robot" viewBox="0 2 16 16">
              <path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z"/>
              <path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z"/>
          </svg> Buscar Enfermedades</a>
      </li>
      <li>
        <a class="nav-link text-underline pequeño" href="{{$user == Auth::id() ? route('perfilesMedicosAutenticated',$user): ''}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" fill="white" class="bi bi-shield-plus" viewBox="0 2 16 16">
          <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
          <path d="M8 4.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5a.5.5 0 0 1 .5-.5z"/>
      </svg> Soy Doctor</a>
  </li>
  <li>
    <form class="form" method="POST" action="/logout">
        {{ csrf_field() }}
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
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
</nav>
<header class="masthead bg-light text-dark text-center mt-3">
    <div class="">
        <h1 class="header text-light" style="text-shadow: 0 0 3px white,0 0 6px black,0 0 10px gold,0 0 14px black;font-family:constantia"><!-- <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#007bff" class="bi bi-robot" viewBox="0 0 16 16">
          <path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z"/>
          <path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z"/>
      </svg> --> Encontrar Médicos <!-- <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="#007bff" class="bi bi-robot" viewBox="0 0 16 16">
          <path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z"/>
          <path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z"/>
      </svg> --></h1>
      <form method="GET" action="/lista_medico" class=" bg-dark text-white p-5" >
       {{ csrf_field() }}
       <h5 class="text-white pequeño_b" style="text-shadow: 0 0 2px gold"> Filtre por Nombre, Especialidad, Precio, Estado ó Ciudad</h5>
       <div class="row">
           <div class="col-md-2 mb-3">
            <label for="nombre" class="pequeño_b">Nombre</label>
            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Jesus">
            <div class="invalid-feedback">
              *Llenar Campo Obligatorio*
          </div>
      </div>
      <div class="col-md-2">
        <label class="pequeño_b">Especialidad</label>
        <select class="form-control" type="text" name="especialidad" value="" placeholder="especialidad">
            <option></option>
            <option>ANESTESIOLOGÍA</option>
            <option>ANGIOLOGÍA</option>
            <option>CARDIOLOGÍA</option>
            <option>CIRUGÍA</option>
            <option>CARDIOVASCULAR</option>
            <option>CIRUJÍA DE COLUMNA</option>
            <option>VERTEBRAL</option>
            <option>CIRUJÍA GENERAL</option>
            <option>CIRUJÍA PLASTICA</option>
            <option>COLOPROCTOLOGÍA</option>
            <option>DERMATOLOGÍA</option>
            <option>ENDOCRINOLOGÍA</option>
            <option>ENFERMERÍA</option>
            <option>FERTILIDAD DE LA MUJER</option>
            <option>FERTILIDAD DEL HOMBRE</option>
            <option>FISIATRÍA</option>
            <option>FISIOTERAPIA</option>
            <option>FONIATRÍA</option>
            <option>GASTROENTEROLOGÍA</option>
            <option>GERIATRÍA</option>
            <option>GINECOLOGÍA</option>
            <option>GINECO-OBSTETRICIA</option>
            <option>HEMATOLOGÍA</option>
            <option>INFECTOLOGÍA</option>
            <option>LACTANCIA MATERNA</option>
            <option>MASTOLOGÍA</option>
            <option>MEDICINA CRÍTICA</option>
            <option>MEDICINA FAMILIAR</option>
            <option>MEDICINA GENERAL</option>
            <option>MEDICINA INTERNA</option>
            <option>NEFROLOGÍA</option>
            <option>NEUMONOLOGÍA</option>
            <option>NEUROLOGÍA</option>
            <option>NEUROCIRUGÍA</option>
            <option>NEUROLOGÍA INFANTIL</option>
            <option>NUTRICIÓN</option>
            <option>OFTALMOLOGÍA</option>
            <option>ODONTOLOGÍA</option>
            <option>ONCOLOGÍA</option>
            <option>OTORRINOLARINGOLOGÍA</option>
            <option>PEDIATRÍA</option>
            <option>PERINATOLOGÍA</option>
            <option>PSICOLOGÍA</option>
            <option>PSIQUIATRÍA</option>
            <option>RADIOLOGÍA E IMÁGENES</option>
            <option>REUMATOLOGÍA</option>
            <option>SEXOLOGÍA</option>
            <option>TRAUMATOLOGÍA</option>
            <option>UROLOGÍA</option>
            <option>UROLOGÍA ONCOLÓGICA</option>
        </select>  
        <div class="invalid-feedback">
          *Llenar Campo Obligatorio*
      </div>
  </div>
  <div class="col-md-2 mb-3">
    <label  class="pequeño_b">Precio</label>
    <input type="text" class="form-control" name="precio" placeholder="20">     
</div>
<div class="col-md-2 mb-3">
    <label class="pequeño_b">Estado</label>
    <select class="form-control" type="text" name="estado">
        <option></option>
        <option>DTTO CAPITAL</option>
        <option>AMAZONAS</option>
        <option>ANZOÁTEGUI</option>
        <option>APURE</option>
        <option>ARAGUA</option>
        <option>BARINAS</option>
        <option>BOLÍVAR</option>
        <option>CARABOBO</option>
        <option>COJEDES</option>
        <option>DELTA AMACURO</option>
        <option>FALCON</option>
        <option>GUÁRICO</option>
        <option>LARA</option>
        <option>MÉRIDA</option>
        <option>MIRANDA</option>
        <option>MONAGAS</option>
        <option>NUEVA ESPARTA</option>
        <option>PORTUGUESA</option>
        <option>SUCRE</option>
        <option>TACHIRA</option>
        <option>TRUJILLO</option>
        <option>VARGAS</option>
        <option>YARACUY</option>
        <option>ZULIA</option>
    </select>
</div>
<div class="col-md-2 mb-3">
    <label class="pequeño_b">Ciudad</label>
    <input type="text" class="form-control" name="ciudad" placeholder="Caracas">
</div>

<div class="col-md-2 mb-3">
    <label class="pequeño_b"><svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="white" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg> Buscar</label>
    <input type="submit" class="form-control btn btn-success pequeño_b">
</div>
</div>
</form>
<div class="card container p-4 my-1 " style="position: relative;top: -60px;background:linear-gradient(45deg ,gold,cyan,gold);border:none;box-shadow: 0 0 5px #007bff,0 0 10px black ">
<div class="table-responsive">
  <table class="container mt-3">
    @foreach($lista_medico as $lista)
    <tr class="card m-2 p-1 bg-dark text-white ani" > 
        <td class="pequeño"> <img width="50" height="50" src="..\..\imagen/{{$lista->foto}}" style="border-radius:55px">  *<span style="color: darkgoldenrod">*</span>* <a class="perfil" style="color:darkgoldenrod;font-family:'andaluz';" href="{{route('perfil_medico',$lista->id)}}">Ver Perfil</a> - <a class="perfil" style="color:darkgoldenrod;font-family:'andaluz';" href="{{route('calendar_view',$lista->id)}}">Agendar Cita</a> *<span style="color: darkgoldenrod">*</span>*<br>  <span style="color:darkgoldenrod;font-family:'andaluz'">{{$lista->nombre}} {{$lista->apellido}}</span> - {{$lista->especialidad}} <br><span class="badge bg-success">{{$lista->consultorio_costo}}$ / {{$lista->consultorio_costo * config('global.dolar')}}BsD </span> por consulta - En {{ucfirst($lista->estado)}} {{ucfirst($lista->ciudad)}}</td>
    </tr>
    @endforeach
</table>
</div>
</div>

<div class="d-flex justify-content-center">
   {{ $lista_medico->appends(['nombre'=>$nombre ?? '', 'especialidad'=>$especialidad ?? '', 'consultorio_costo'=>$consultorio_costo ?? '', 'estado'=>$estado ?? '', 'ciudad'=>$ciudad ?? ''])->links() }}
</div> 
</div>
</div>
</header>

<!-- Copyright Section-->
<footer class="bg-dark py-4 text-center text-white foo">
  <p class="p-2">Copyright &copy; tumedibot 2022 <a class="forgot m-2 text-success" href="{{ route('privacy') }}" target="_self">Privacidad</a> &middot; <a class="forgot m-2 text-success" href="{{ route('terms') }}" target="_self">Términos y condiciones</a> &middot; <a class="forgot m-2 text-success" href="{{ route('cookies') }}">Política de Cookies</a><a class="mx-3" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="darkgreen" id="circle-green" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
</svg></a></p>
</footer>
    <style type="text/css">
        #area_medico{
            display:none;
        }
    </style>
    @if (session('status'))
        <script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\status.js"></script>
    @endif
    @if (session('statusa'))
        <script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\statusa.js"></script>
    @endif
    @if (session('statusb'))
        <script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\statusb.js"></script>
    @endif
        @if (session('statusg'))
        <script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\statusg.js"></script>
    @endif
    @if($factu == $user)
        <script>
            let a = document.getElementById('area_medico');
            a.style.display='block';
        </script>
    @endif
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->

<script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="startbootstrap-freelancer-gh-pages/startbootstrap-freelancer-gh-pages/js/jquery-slim.min.js"><\/script>')</script>
<script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\popper.min.js"></script>
<script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\bootstrap.min.js"></script>


</body>
</html>
