<!DOCTYPE html>
<html>
<head>
	<title>tumedibot</title>
	<meta charset="UTF-8">
	    <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/x-icon" href="{{asset('icon_medibot.png')}}" />
	<link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\factura.css')}}" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\css\bootstrap.min.css')}}">
  <link href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\font\bootstrap-icons.css')}}" rel="stylesheet" />
	<link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\responsive_robot_disease.css')}}" rel="stylesheet" />
  <link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\fuentes\fuentes_tumedibot.css')}}"  rel="stylesheet">
  <link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\facturas_clinicas.css')}}"  rel="stylesheet">
	<link rel="stylesheet" type="text/css" href='{{asset('sweetalert2-11.4.8\package\dist\sweetalert2.min.css')}}'/>
  <script src="{{asset('sweetalert2-11.4.8\package\dist\sweetalert2.all.min.js')}}"></script> 
  <script type="text/javascript" src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\jquery-slim.min.js')}}"></script>
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href={{route('disease_robot')}}><img  src={{asset('medibot_f.png')}}></a>
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
        <li >
              <a class="nav-link" href={{route('disease_robot')}}><i class="bi bi-house"></i> Principal <span class="sr-only"></span></a>
        </li>
             <li class=" ">
         <a class="nav-link text-underline" href="{{route('lista_medico')}}"><i class="bi bi-journal-plus"></i> Buscar Médicos</a>

        </li>
            <li class="nav-item">
              <a class="nav-link " href={{route('lista_empresarial')}}><i class="bi bi-building"></i> Empresas De Salud</a>
            </li>
        <li class=" ">
          <a class="nav-link text-underline" href="{{route('perfilesMedicosAutenticated',Auth::id())}}"><i class="bi bi-shield-plus"></i> Soy Doctor</a>
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

	<div class="masthead bg">
	   <h1 class="shadows text-center text-white fuente_d">@yield('plan')</h1>
	</div>	

	<div class="container">@yield('formulario')</div>
		<!-- Copyright Section-->
        <footer  class="bg-dark py-4 text-center text-white foo">
          <p class="p-2">  &copy; tumedibot 2023 <a class="forgot m-2 text-success" href="{{ route('privacy') }}"  target="_self">Privacidad</a> &middot; <a class="forgot m-2 text-success" href="{{ route('terms') }}" target="_self">Términos y condiciones</a> &middot; <a class="forgot m-2 text-success" href="{{ route('cookies') }}">Política de Cookies</a> &middot; <a class="forgot m-2 text-success" href="{{ route('manual_usuario') }}"  target="_self">Manual de Usuario</a><i class="bi bi-download"></i><a class="mx-3" href="#"><i class="bi bi-arrow-up-circle text-success" ></i></a></p>
        </footer> 

	    @if($factu_cli == $user->id)
            <script>
                let a = document.getElementById('area_empresarial');
                a.style.display='block';
            </script>
      @endif      
      @if($factu == $user->id)
            <script>
                let b = document.getElementById('area_medico');
                b.style.display='block';
            </script>
      @endif

                <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\jquery-slim.min.js')}}"></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\popper.min.js')}}" ></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\js\bootstrap.min.js')}}" ></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\holder.min.js')}}"></script>
        	     <!--Factura-->
        <script type="text/javascript" src="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\factura.js')}}"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script> 
</body>
</html>
