<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
      <!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
	<meta name="description" content="tumedibot" />
	<meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
	<link href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\css\bootstrap.min.css')}}"  rel="stylesheet">
	<link href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\font\bootstrap-icons.css')}}" rel="stylesheet" />
	<link rel="icon" type="image/x-icon" href="{{asset('icon_medibot.png')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('sweetalert2-11.4.8\package\dist\sweetalert2.min.css')}}"/>
	  <link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\responsive_robot_disease.css')}}" rel="stylesheet" />
    <script src='{{asset('sweetalert2-11.4.8\package\dist\sweetalert2.all.min.js')}}'></script>
	<title>@yield('t')</title>
	<style type="text/css">
	h2{
		color: #007bff;
	}
	@keyframes as{
		to{
			letter-spacing: 3px;
			background-position: right;
		}
	}
	h4{
		text-align: center;
		text-transform: uppercase;
		color:white;
		text-shadow: 0 0 3px #007bff, 0 0 6px black;
	}
	input.form-control,.custom-select,select.form-control,textarea.form-control{
		border-color:#007bff;
	}
    ul{
    	list-style-type: none;
    }
    a:hover{
    	color:#007bff;
    	opacity: 0.5;
    }
    label{
    	color:darkgreen;
    }
	</style>
	<script src="..\..\vendors\ckeditor\ckeditor\ckeditor.js"></script>

</head>
<body>
	<header class="m-2">
		<div class="row">
			<div  class="col-md-1 text-right">
				<h2><a href=@yield('back')><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a></h2>
			</div>
			<div class="col-md-11">
				<h2 class="text-uppercase text-center">  @yield('titulo')</h2>
			</div>
		</div>
		
	</header>
    
    <div class="container p-1">
    	@yield('formulario')
    </div>

		<!-- Copyright Section-->
{{--         <footer  class="bg-dark p-4 mt-5 text-center text-white">
          <p class="p-2">  &copy; tumedibot 2023 <a class="forgot m-2 text-success" href="{{ route('privacy') }}"  target="_self">Privacidad</a> &middot; <a class="forgot m-2 text-success" href="{{ route('terms') }}" target="_self">Términos y condiciones</a> &middot; <a class="forgot m-2 text-success" href="{{ route('cookies') }}">Política de Cookies</a> &middot; <a class="forgot m-2 text-success" href="{{ route('manual_usuario') }}"  target="_self">Manual de Usuario</a><i class="bi bi-download"></i><a class="mx-3" href="#"><i class="bi bi-arrow-up-circle text-success" ></i></a></p>
        </footer>  --}}
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

        @yield('js');
</body>
</html>