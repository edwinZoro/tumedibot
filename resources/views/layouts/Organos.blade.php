<!DOCTYPE html>
<html >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="tumedibot" />
  <meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
      <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('titulo')</title>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
        <!-- Font Awesome icons (free version)
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
      -->
      <!-- Google fonts-->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\styles.css" rel="stylesheet" />
      <link href="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\Organos.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href="..\..\sweetalert2-11.4.8\package\dist\sweetalert2.min.css">
          <link href="../../bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\font\bootstrap-icons.css" rel="stylesheet" />
      <script src="..\..\sweetalert2-11.4.8\package\dist\sweetalert2.all.min.js"></script>
      <!-- Styles -->
      <style type="text/css">
        .pequeño{
          text-transform: capitalize;
          font-size: 10px;
          letter-spacing: 0;
        }
        .informacion{
          font-size: 10px;
          color:darkgreen;
        }
        .informacion:hover{
          color:darkgreen;
          text-decoration: none;
          text-shadow: 0 0 4px darkgreen;
          transition: text-shadow 1s;

        }
          .encabezado{
                  background: hsla(192, 96%, 50%, 1);
                  background: linear-gradient(90deg, hsla(192, 96%, 50%, 1) 0%, hsla(65, 92%, 54%, 1) 100%);
                  background: -moz-linear-gradient(90deg, hsla(192, 96%, 50%, 1) 0%, hsla(65, 92%, 54%, 1) 100%);
                  background: -webkit-linear-gradient(90deg, hsla(192, 96%, 50%, 1) 0%, hsla(65, 92%, 54%, 1) 100%);
          }

</style>
</head>
<body id="page-top" >
 <nav class="navbar navbar-dark bg-dark  text-uppercase fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand " href="{{route('disease_robot')}}"><img class="medibot" src={{asset('medibot_f.png')}} alt="medibot"></a>
    <button class="button navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
      <span></span>
    </button>
  </div>

  <div class="container my-2">
    <div class="collapse navbar-collapse" id="navbarsExample01">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
         <a class="nav-link text-underline" href="{{route('lista_medico')}}"><i class="bi bi-journal-plus"></i> Buscar Médicos</a>

        </li>
        <li class="nav-item">
              <a class="nav-link " href={{route('lista_empresarial')}}><i class="bi bi-building"></i> Empresas De Salud</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link text-underline" href="{{route('perfilesMedicosAutenticated',$user ?? '')}}"><i class="bi bi-shield-plus"></i> Soy Doctor</a>
        </li>
        <li class="nav-item ">
          <form class="form" method="POST" action="/logout">
            {{ csrf_field() }}
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
              <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>
            <button class="button btn" type="submit">
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

<header  class="masthead text-center my-5 encabezado">

  <h2 class="text-white" style="text-shadow: 0 0 6px black">@yield('subtitulo')</h2>
  <div class="container">
   <p class="parrafo">Tu<span style="color:darkgreen">medi</span>bot se encargará de sugerir enfermedad relacionada con @yield('articulo') @yield('subtituloa') y encontrar el especialista necesario en su zona, sólo debe <span style="color:darkgreen">seleccionar sus síntomas, presionar Obtener Resultados y listo.</span> La finalidad de la aplicación es de caracter informativo, por esto tu<span style="color:darkgreen">medi</span>bot no establece un diágnostico de enfermedad. Para un diágnostico, consulte un especialista que revise su estado de salud. En tu<span style="color:darkgreen">medi</span>bot puede encontrar los mejores perfiles de especialistas médicos</p>

 </div>
<!--  <div class="container">
   <small><a class="btn-link" style="font-size: 11px" href="http://www.freepik.com" target="_blank">slidesgo / Freepik</a></small>
 </div> -->
</header>

<div class="container text-white align-items-center  mb-5 cas">
  @yield('formulario')
</div>
  @if(isset($probability))
    <script type="text/javascript">
      const m = {!! json_encode($enfermedad) !!}
      const d = {!! json_encode($d) !!}
      const x = {!! json_encode($x) !!}
      const p_a = {!! json_encode($probability) !!}
      const especialidad = {!! json_encode($especialidades[0]) !!}
      const especialidad_a = {!! json_encode($especialidades[1]) !!}
      const especialidad_b = {!! json_encode($especialidades[2]) !!}
      const enlace = {!! json_encode($enlace) !!}
      const ruta = {!! json_encode($ruta[0]) !!}
      const ruta_a = {!! json_encode($ruta[1]) !!}
      const ruta_b = {!! json_encode($ruta[2]) !!}
        Swal.fire({
          title:d +''+'<span style="color:darkgreen">'+m+'</span>',
          text:x +' '+ p_a ,
          icon: 'success',
          showDenyButton: true,
          showCancelButton: true,
          cancelButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta}`+'"'+'>'+`${especialidad}`+'</a>',
          denyButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_a}`+'"'+'>'+`${especialidad_a}`+'</a>',
          confirmButtonText: '<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_b}`+'"'+'>'+`${especialidad_b}`+'</a>',
          confirmButtonColor: '#004455',
          denyButtonColor:'#445500',
          cancelButtonColor:'#0045ff',
          footer:'<a class="informacion" href="'+`${enlace}`+'" target="_blank">Más Información de enfermedad'+' '+`${m}`+' '+'de MayoClinic.org</a>'
        })
</script>
  @elseif(isset($probability_zero))
    <script type="text/javascript">
      const m = {!! json_encode($enfermedad) !!}
      const d = {!! json_encode($d) !!}
      const x = {!! json_encode($x) !!}
      const p_a = {!! json_encode($probability_zero) !!}
      const especialidad = {!! json_encode($especialidades[0]) !!}
      const especialidad_a = {!! json_encode($especialidades[1]) !!}
      const especialidad_b = {!! json_encode($especialidades[2]) !!}
      const enlace = {!! json_encode($enlace) !!}
      const ruta = {!! json_encode($ruta[0]) !!}
      const ruta_a = {!! json_encode($ruta[1]) !!}
      const ruta_b = {!! json_encode($ruta[2]) !!}
        Swal.fire({
          title:d +''+'<span style="color:darkgreen">'+m+'</span>',
          text:x +' '+ p_a ,
          icon: 'success',
          showDenyButton: true,
          showCancelButton: true,
          cancelButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta}`+'"'+'>'+`${especialidad}`+'</a>',
          denyButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_a}`+'"'+'>'+`${especialidad_a}`+'</a>',
          confirmButtonText: '<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_b}`+'"'+'>'+`${especialidad_b}`+'</a>',
          confirmButtonColor: '#004455',
          denyButtonColor:'#445500',
          cancelButtonColor:'#0045ff',
          footer:'<a class="informacion" href="'+`${enlace}`+'" target="_blank">Más Información de enfermedad'+' '+`${m}`+' '+'de MayoClinic.org</a>'
        })
</script>    
  @elseif(isset($probability_a))
    <script type="text/javascript">
      const m = {!! json_encode($enfermedad) !!}
      const d = {!! json_encode($d) !!}
      const x = {!! json_encode($x) !!}
      const p_a = {!! json_encode($probability_a) !!}
      const especialidad = {!! json_encode($especialidades[0]) !!}
      const especialidad_a = {!! json_encode($especialidades[1]) !!}
      const especialidad_b = {!! json_encode($especialidades[2]) !!}
      const enlace = {!! json_encode($enlace) !!}
      const ruta = {!! json_encode($ruta[0]) !!}
      const ruta_a = {!! json_encode($ruta[1]) !!}
      const ruta_b = {!! json_encode($ruta[2]) !!}
        Swal.fire({
          title:d +''+'<span style="color:darkgreen">'+m+'</span>',
          text:x +' '+ p_a ,
          icon: 'success',
          showDenyButton: true,
          showCancelButton: true,
          cancelButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta}`+'"'+'>'+`${especialidad}`+'</a>',
          denyButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_a}`+'"'+'>'+`${especialidad_a}`+'</a>',
          confirmButtonText: '<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_b}`+'"'+'>'+`${especialidad_b}`+'</a>',
          confirmButtonColor: '#004455',
          denyButtonColor:'#445500',
          cancelButtonColor:'#0045ff',
          footer:'<a class="informacion" href="'+`${enlace}`+'" target="_blank">Más Información de enfermedad'+' '+`${m}`+' '+'de MayoClinic.org</a>'
        })
</script>    
  @elseif(isset($probability_b))
    <script type="text/javascript">
      const m = {!! json_encode($enfermedad) !!}
      const d = {!! json_encode($d) !!}
      const x = {!! json_encode($x) !!}
      const p_a = {!! json_encode($probability_b) !!}
      const especialidad = {!! json_encode($especialidades[0]) !!}
      const especialidad_a = {!! json_encode($especialidades[1]) !!}
      const especialidad_b = {!! json_encode($especialidades[2]) !!}
      const enlace = {!! json_encode($enlace) !!}
      const ruta = {!! json_encode($ruta[0]) !!}
      const ruta_a = {!! json_encode($ruta[1]) !!}
      const ruta_b = {!! json_encode($ruta[2]) !!}
        Swal.fire({
          title:d +''+'<span style="color:darkgreen">'+m+'</span>',
          text:x +' '+ p_a ,
          icon: 'success',
          showDenyButton: true,
          showCancelButton: true,
          cancelButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta}`+'"'+'>'+`${especialidad}`+'</a>',
          denyButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_a}`+'"'+'>'+`${especialidad_a}`+'</a>',
          confirmButtonText: '<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_b}`+'"'+'>'+`${especialidad_b}`+'</a>',
          confirmButtonColor: '#004455',
          denyButtonColor:'#445500',
          cancelButtonColor:'#0045ff',
          footer:'<a class="informacion" href="'+`${enlace}`+'" target="_blank">Más Información de enfermedad'+' '+`${m}`+' '+'de MayoClinic.org</a>'
        })
</script>   
  @elseif(isset($probability_c))
    <script type="text/javascript">
      const m = {!! json_encode($enfermedad) !!}
      const d = {!! json_encode($d) !!}
      const x = {!! json_encode($x) !!}
      const p_a = {!! json_encode($probability_c) !!}
      const especialidad = {!! json_encode($especialidades[0]) !!}
      const especialidad_a = {!! json_encode($especialidades[1]) !!}
      const especialidad_b = {!! json_encode($especialidades[2]) !!}
      const enlace = {!! json_encode($enlace) !!}
      const ruta = {!! json_encode($ruta[0]) !!}
      const ruta_a = {!! json_encode($ruta[1]) !!}
      const ruta_b = {!! json_encode($ruta[2]) !!}
        Swal.fire({
          title:d +''+'<span style="color:darkgreen">'+m+'</span>',
          text:x +' '+ p_a ,
          icon: 'success',
          showDenyButton: true,
          showCancelButton: true,
          cancelButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta}`+'"'+'>'+`${especialidad}`+'</a>',
          denyButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_a}`+'"'+'>'+`${especialidad_a}`+'</a>',
          confirmButtonText: '<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_b}`+'"'+'>'+`${especialidad_b}`+'</a>',
          confirmButtonColor: '#004455',
          denyButtonColor:'#445500',
          cancelButtonColor:'#0045ff',
          footer:'<a class="informacion" href="'+`${enlace}`+'" target="_blank">Más Información de enfermedad'+' '+`${m}`+' '+'de MayoClinic.org</a>'
        })
</script>   
  @elseif(isset($probability_d))
    <script type="text/javascript">
      const m = {!! json_encode($enfermedad) !!}
      const d = {!! json_encode($d) !!}
      const x = {!! json_encode($x) !!}
      const p_a = {!! json_encode($probability_d) !!}
      const especialidad = {!! json_encode($especialidades[0]) !!}
      const especialidad_a = {!! json_encode($especialidades[1]) !!}
      const especialidad_b = {!! json_encode($especialidades[2]) !!}
      const enlace = {!! json_encode($enlace) !!}
      const ruta = {!! json_encode($ruta[0]) !!}
      const ruta_a = {!! json_encode($ruta[1]) !!}
      const ruta_b = {!! json_encode($ruta[2]) !!}
        Swal.fire({
          title: d +''+'<span style="color:darkgreen">'+m+'</span>',
          text:x +' '+ p_a ,
          icon: 'success',
          showDenyButton: true,
          showCancelButton: true,
          cancelButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta}`+'"'+'>'+`${especialidad}`+'</a>',
          denyButtonText:'<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_a}`+'"'+'>'+`${especialidad_a}`+'</a>',
          confirmButtonText: '<a class="text-white text-decoration-none pequeño" target="_blank" href="'+`${ruta_b}`+'"'+'>'+`${especialidad_b}`+'</a>',
          confirmButtonColor: '#004455',
          denyButtonColor:'#445500',
          cancelButtonColor:'#0045ff',
          footer:'<a class="informacion" href="'+`${enlace}`+'" target="_blank">Más Información de enfermedad'+' '+`${m}`+' '+'de MayoClinic.org</a>'
        })
</script>    
  @endif

        <!-- Copyright Section-->
         <footer  class="bg-dark py-4 text-center text-white foo">
          <p class="p-2">  &copy; tumedibot 2023 <a class="forgot m-2 text-success" href="{{ route('privacy') }}"  target="_self">Privacidad</a> &middot; <a class="forgot m-2 text-success" href="{{ route('terms') }}" target="_self">Términos y condiciones</a> &middot; <a class="forgot m-2 text-success" href="{{ route('cookies') }}">Política de Cookies</a> &middot; <a class="forgot m-2 text-success" href="{{ route('manual_usuario') }}"  target="_self">Manual de Usuario</a><i class="bi bi-download"></i> <a class="mx-3" href="#"><i class="bi bi-arrow-up-circle text-success" ></i></a></p>
        </footer>
      <style type="text/css">
       .forgot{
        text-decoration: none;
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
