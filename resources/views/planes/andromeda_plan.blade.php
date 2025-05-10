<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="medibot" />
	<meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
	<title>tumedibot</title>
	<link rel="icon" type="image/x-icon" href="..\..\icon_medibot.png" />
    <!-- Font Awesome icons (free version)
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
-->

<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
<!-- Core theme CSS (includes Bootstrap)-->
<link rel="stylesheet" type="text/css" href="../../bootstrap-4.0.0\bootstrap-4.0.0\dist\css\bootstrap.min.css">
<!--     <link href="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\styles.css" rel="stylesheet" />
	Styles --> 
	<link href="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\responsive_robot_disease.css" rel="stylesheet" />
	<style type="text/css">
		button{
			position: relative;
			display: inline-block;
			padding: 10px 10px;
			margin: 5px 0;
			color: #03e9f4;
			text-decoration: none;
			text-transform: uppercase;
			transition: 0.5s;
			letter-spacing: 4px;
			overflow: hidden;
			margin-right: 20px;

		}
		button:hover{
			background: #03e9f4;
			color: #050801;
			box-shadow: 0 0 5px #03e9f4,
			0 0 25px #03e9f4,
			0 0 50px #03e9f4,
			0 0 120px #03e9f4;
			-webkit-box-reflect:below 1px linear-gradient(transparent, #0005);
		}
		button:nth-child(1){
			filter: hue-rotate(170deg);
		}
		button:nth-child(2){
			filter: hue-rotate(350deg);
		}
		button span{
			position: absolute;
			display: block;
		}
		button span:nth-child(1){
			top: 0;
			left: 0;
			width: 100%;
			height: 2px;
			background: linear-gradient(90deg,transparent,#03e9f4);
			animation: animate1 1s linear infinite;
		}
		@keyframes animate1{
			0%{
				left: -100%;
			}
			50%,100%{
				left: 100%;
			}
		}
		button span:nth-child(2){
			top: -100%;
			right: 0;
			width: 2px;
			height: 100%;
			background: linear-gradient(180deg,transparent,#03e9f4);
			animation: animate2 1s linear infinite;
			animation-delay: 0.25s;
		}
		@keyframes animate2{
			0%{
				top: -100%;
			}
			50%,100%{
				top: 100%;
			}
		}
		button span:nth-child(3){
			bottom: 0;
			right: 0;
			width: 100%;
			height: 2px;
			background: linear-gradient(270deg,transparent,#03e9f4);
			animation: animate3 1s linear infinite;
			animation-delay: 0.50s;
		}
		@keyframes animate3{
			0%{
				right: -100%;
			}
			50%,100%{
				right: 100%;
			}
		}


		button span:nth-child(4){
			bottom: -100%;
			left: 0;
			width: 2px;
			height: 100%;
			background: linear-gradient(360deg,transparent,#03e9f4);
			animation: animate4 1s linear infinite;
			animation-delay: 0.75s;
		}
		@keyframes animate4{
			0%{
				bottom: -100%;
			}
			50%,100%{
				bottom: 100%;
			}
		}
		.green,h1{
			color:darkred;
		}
		@media(max-width: 500px){
			.pequeño{
				font-size: 10px;
			}
		}
	</style>
</head>
<body id="page-top">
	<nav class="navbar navbar-dark bg-dark  text-uppercase fixed-top">
		<div class="container">	
			<a class="navbar-brand  " href="{{route('disease_robot')}}"><img class="medibot img-fluid" src="../../medibot_f.png" alt="medibot"></a>
			<div class="trabajo trabajob text-center text-white  d-flex justify-content-center">
				<h3 class="background-clip " style="font-family: gabriola">Pague su perfil médico en tumedibot</h3> 
				
			</div>
			<ul class="navbar-nav img-fluid d-flex justify-content-end">
				<li class="nav-item ">
					<a class="nav-link text-underline pequeño" href="{{route('disease_robot')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-robot" viewBox="0 0 16 16">
						<path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z"/>
						<path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z"/>
					</svg> Principal</a>

				</li>
				<li class="nav-item ">
					<a class="nav-link text-underline pequeño" href="{{route('lista_medico')}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-shield-plus" viewBox="0 0 16 16">
						<path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
						<path d="M8 4.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5a.5.5 0 0 1 .5-.5z"/>
					</svg> Buscar Médicos</a>
				</li>
				<li class="nav-item ">
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

	</nav>
	<div class="masthead">

			<h1 class="text-center">Pago de Plan Andromeda</h1>
			<div class="container m-5 ">
			<div class="table-responsive ">
				
			
			<table class=" table table-dark table-striped">			
					<th>Nombre</th>
					<th>Plan</th>
					<th>Costo</th>
					<th>Pague Plan</th>		
					<th>Renovar</th>
					<th>Mejorar</th>			
				<tr>
					<td>{{$user->name}}</td>
                   <td>Andromeda</td>
                   <td>5$/Al mes</td>
                   <td><a href="{{route('pagando_perfil_medico',$user)}}" class="btn btn-sm btn-primary">Pagar</a></td>
                   <td><a href="{{route('pagando_perfil_medico',$user)}}" class="btn btn-sm btn-primary">Renovar</a></td>
                   <td><a href="{{route('pagando_perfil_medico',$user)}}" class="btn btn-sm btn-primary">Cambiar Plan</a></td>
				</tr>
			</table>
			</div>
</div>
		</div>
<p>{{mt_rand(1000000,3000000)}}</p>
		<!-- Copyright Section-->
		<footer class="bg-dark py-4 text-center text-white foo">
			<p class="p-2">Copyright &copy; tumedibot 2022 <a class="forgot m-2 text-success" href="{{ route('privacy') }}" target="_self">Privacidad</a> &middot; <a class="forgot m-2 text-success" href="{{ route('terms') }}" target="_self">Términos y condiciones</a> &middot; <a class="forgot m-2 text-success" href="#">Política de Cookies</a><a class="mx-3" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="darkgreen" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
			</svg></a></p>
		</footer> 

	</body>

 	<style type="text/css">

		.forgot:hover{
			color: black;
			text-decoration: none;
			text-shadow:0 0 4px rgba(0,255,0,0.5);
			transition: all 0.5s;
		}
		.foo{
			position: relative;
			top:30rem ;			
		}
	</style>
	<!--<script type="text/javascript">
		let b = document.getElementById('boton');
		b.style.display= 'none';
	</script> -->
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