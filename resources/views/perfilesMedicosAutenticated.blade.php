 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="medibot" />
	<meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
	<title>tumedibot</title>
	<link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\styles.css')}}" rel="stylesheet" />
	<link rel="icon" type="image/x-icon" href="..\..\icon_medibot.png" />
    <!-- Font Awesome icons (free version)
    <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>-->
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\css\bootstrap.min.css')}}">
    <!--PersonalCss-->
    <link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\card.css')}}" rel="stylesheet" />
         <link href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\font\bootstrap-icons.css')}}" rel="stylesheet" />
   <style>
    #area_empresarial{
      display: none;
    }    
    #area_medico{
       display: none;
    }
    .forgot{
    text-decoration: none;
	}
	.forgot:hover{
		opacity: 0.9;
	    transition: all 0.5s;
	}
  </style>
</head>
<body id="page-top">
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href={{route('lista_medico')}}><img  src={{asset('medibot_f.png')}}></a>
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
	        <li>
	          <a class="nav-link text-underline" href="{{route('lista_medico')}}"><i class="bi bi-journal-plus"></i> Buscar Médicos</a>
	        </li>
            <li class="nav-item">
              <a class="nav-link " href={{route('lista_empresarial')}}><i class="bi bi-building"></i> Empresas De Salud</a>
            </li>    
             <li >
              <a class="nav-link" href={{route('disease_robot')}}><i class="bi bi-thermometer-half"></i> Buscar enfermedad <span class="sr-only"></span></a>
            </li>
        </ul>
            <!-- mibew button --><a id="mibew-agent-button" href="/helpChat/chat?locale=es" target="_blank" onclick="Mibew.Objects.ChatPopups['67912371209871dd'].open();return false;"><img src="/helpChat/b?i=mibew&amp;lang=es" border="0" alt="" /></a><script type="text/javascript" src="/helpChat/js/compiled/chat_popup.js"></script><script type="text/javascript">Mibew.ChatPopup.init({"id":"67912371209871dd","url":"\/helpChat\/chat?locale=es","preferIFrame":true,"modSecurity":false,"forceSecure":false,"style":"","width":640,"height":480,"resizable":true,"styleLoader":"\/helpChat\/chat\/style\/popup"});</script><!-- / mibew button -->
          <form class="form-inline ml-2 mt-2 mt-md-0" method="POST" action="/logout">
              {{ csrf_field() }}           
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="bi bi-box-arrow-left"></i> Salir</button>
          </form>
        </div>
      </nav>

	<div class="masthead">
		<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
			<div class="container">
				<div class="card-deck">
					<div class="card " id="b">
						<div class="card-header border border-dark" id="a">
							<h4 class=" my-0 font-weight-normal text-center text-dark "><svg xmlns="http://www.w3.org/2000/svg" width="18" height="28" fill="white" class="bi bi-calendar2-plus-fill" viewBox="0 0 16 22">
								<path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 3.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5H2.545c-.3 0-.545.224-.545.5zm6.5 5a.5.5 0 0 0-1 0V10H6a.5.5 0 0 0 0 1h1.5v1.5a.5.5 0 0 0 1 0V11H10a.5.5 0 0 0 0-1H8.5V8.5z"/>
							</svg> Per&iacute;odo de Prueba para especialistas m&eacute;dicos</h4>
						</div>
						
						<div class="card-body text-light">
							<p class=" " style="text-align: justify;text-indent:25px;font-weight: 900"> En tumedibot.com otorgamos la posibilidad de suscribirse gratuitamente durante un período de prueba de 3 meses. Sí quiere hacer uso de este beneficio notifique por chat la siguiente información:</p>
							<ul class="text-left text-dark" style="font-weight:900">
								<li>La frase: Quiero Mis tres Meses Gratis.</li>
								<li>Correo  de usuario.</li>
								<li>Se pedirá información para corroborar que usted es médico.</li>
							</ul>
							<p style="text-align: justify;text-indent:25px;font-weight: 900">De negar la solicitud es porque consideramos que usted no es un médico. En este caso envienos un correo para estudiar su caso.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="container">
				<h1 class="titulo display-4">Precios</h1>
				<p class="lead" style="text-align: justify;text-indent:25px;">El procedimiento de pago en <b>tumedibot.com</b> es muy simple. Sólo observe los precios de los planes y escoja el que más se adapte a su presupuesto.{{--  Sólo Aceptamos pagomóvil y transferencias en bancos de Venezuela. Los demás paises se acepta paypal y bitcoin. --}} {{-- No acepte pagar efectivo (tu<span class="text-success">medi</span>bot no es responsable por dinero pagado en efectivo) --}}<b>Ninguno de los precios debajo incluye impuesto.</b></p>
				<p style="text-align: justify;text-indent:25px;"><ins class="text-warning lead">Advertencia:</ins><b> No acepte pagar efectivo, ni en otra cuenta que no sea la que se proporciona en la factura. Tumedibot no es responsable por dinero pagado en efectivo ni a otras cuentas ajenas a la empresa.</b></p>
			</div>
			
		</div>
		<div class="container">
			<h1 class="titulo display-4 text-center">Planes para M&eacute;dicos</h1>
			<div class="card-deck m-3 ">
				<div class="card mb-4 box-shadow">
					<div class="card-header border border-dark">
						<h4 class="my-0 font-weight-normal text-center text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="white" class="bi bi-heart-pulse-fill" viewBox="0 0 16 22">
							<path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
						</svg> Andromeda</h4>
					</div>
					<div class="card-body border border-dark">
						<h1 class="card-title pricing-card-title text-center titulo">$10 <small class="text-dark">/Al mes</small></h1>
						<ul class="">
							<li>Llenar Perfil M&eacute;dico.</li>
							<li>Agregar 1 foto a Perfil.</li>
							<li>Agregar enlaces de redes sociales: Facebook, Instagram, Twitter y Linkedin.</li>
							<li>Agregar Nmros de Tel&eacute;fono. </li>
							<li>Agregar Nmros de Whatsapp. </li>
							<li>Agregar Direcci&oacute;n De Consultorio.</li>
							<li>Crear, Editar y eliminar perfil.</li>
							<li>Ver/Descargar Facturas.</li>
							<li>Habilitar &Aacuterea M&eacute;dico.</li>
							<li>Habilitar Chat de Soporte.</li>
							<li>Aparecer en listados de busqueda</li>
							<li>Configurar Calendario de Citas</li>
						</ul>
					</div>
					<div class="card-footer border border-dark text-center">
						<a href="{{route('comprando_perfil_medico',$user)}}" class="btn btn-dark" style="font-weight: 900" target="_self">Comprar</a>

					</div>
				</div>
				<div class="card mb-4 box-shadow">
					<div class="card-header  border border-dark">
						<h4 class="my-0 font-weight-normal text-center text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="white" class="bi bi-moon-stars-fill" viewBox="0 0 16 22">
							<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
							<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
						</svg> Fenix</h4>
					</div>
					<div class="card-body border border-dark">
						<h1 class="card-title pricing-card-title text-center titulo">$55 <small class="text-dark">/6 meses</small></h1>
						<ul class="">
							<li>Llenar Perfil M&eacute;dico.</li>
							<li>Agregar 1 foto a Perfil.</li>
							<li>Agregar enlaces de redes sociales: Facebook, Instagram, Twitter y Linkedin.</li>
							<li>Agregar Nmros de Tel&eacute;fono. </li>
							<li>Agregar Nmros de Whatsapp. </li>
							<li>Agregar Direcci&oacute;n De Consultorio.</li>
							<li>Crear, Editar y eliminar perfil.</li>
							<li>Ver/Descargar Facturas.</li>
							<li>Habilitar &Aacuterea M&eacute;dico.</li>
							<li>Habilitar Chat de Soporte.</li>
							<li>Aparecer en listados de busqueda</li>
							<li>Configurar Calendario de Citas</li>
							<li>Ahorre <span class="green"><strong>$10</strong></span></li>
						</ul>

					</div>
					<div class="card-footer border border-dark text-center">
						<a href="{{route('comprando_perfil_medico_b',$user)}}" class="btn btn-dark" style="font-weight: 900">Comprar</a>
					</div>
				</div>
				<div class="card mb-4 box-shadow">
					<div class="card-header  border border-dark">
						<h4 class="my-0 font-weight-normal text-center text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="white" class="bi bi-shield-fill-plus" viewBox="0 0 16 22">
							<path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm-.5 5a.5.5 0 0 1 1 0v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5z"/>
						</svg> Pegasus</h4>
					</div>
					<div class="card-body border border-dark">
						<h1 class="card-title pricing-card-title text-center titulo">$100 <small class="text-dark">/1 año</small></h1>
						<ul class="">
							<li>Llenar Perfil M&eacute;dico.</li>
							<li>Agregar 1 foto a Perfil.</li>
							<li>Agregar enlaces de redes sociales: Facebook, Instagram, Twitter y Linkedin.</li>
							<li>Agregar Nmros de Tel&eacute;fono. </li>
							<li>Agregar Nmros de Whatsapp. </li>
							<li>Agregar Direcci&oacute;n De Consultorio.</li>
							<li>Crear, Editar y eliminar perfil.</li>
							<li>Ver/Descargar Facturas.</li>
							<li>Habilitar &Aacuterea M&eacute;dico.</li>
							<li>Habilitar Chat de Soporte.</li>
							<li>Aparecer en listados de busqueda</li>
							<li>Configurar Calendario de Citas</li>
							<li>Ahorre <span class="green"><strong>$20</strong></span></li>
						</ul>

					</div>
					<div class="card-footer border border-dark text-center">
						<a href="{{route('comprando_perfil_medico_c',$user)}}" class="btn btn-dark" style="font-weight: 900">Comprar</a>
					</div>
				</div>
			</div>
			<h1 class="titulo display-4 text-center">Planes para Empresas de Salud</h1>
			<h6 class="titulo  text-center">(Ambulatorio-Cl&iacute;nica-Hospital-Farmacia-Laboratorio-Seguro)</h6>
			<div class="card-deck m-3 ">
				<div class="card mb-4 box-shadow">
					<div class="card-header border border-dark">
						<h4 class="my-0 font-weight-normal text-center text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="white" class="bi bi-heart-pulse-fill" viewBox="0 0 16 22">
							<path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
						</svg> Cisne</h4>
					</div>
					<div class="card-body border border-dark">
						<h1 class="card-title pricing-card-title text-center titulo">$30 <small class="text-dark">/Al mes</small></h1>
						<ul class="">
							<li>Llenar Perfil Empresarial.</li>
							<li>Agregar 3 fotos a Carrousel.</li>
							<li>Agregar 3 fotos a Perfil.</li>
							<li>Agregar enlaces de redes sociales: Facebook, Instagram, Twitter y Linkedin.</li>
							<li>Agregar Nmros de Tel&eacute;fono.</li>
							<li>Agregar Nmros de Whatsapp.</li>
							<li>Agregar Dirección De Empresa.</li>
							<li>Crear, Editar y eliminar perfil.</li>
							<li>Ver/Descargar Facturas.</li>
							<li>Habilitar &Aacuterea de Empresa.</li>
							<li>Habilitar Chat de Soporte.</li>
							<li>Aparecer en listados de busqueda.</li>
						</ul>
					</div>
					<div class="card-footer border border-dark text-center">
						<a href="{{route('comprando_perfil_empresarial_cisne',$user)}}" class="btn btn-dark" style="font-weight: 900" target="_self">Comprar</a>

					</div>
				</div>
				<div class="card mb-4 box-shadow">
					<div class="card-header  border border-dark">
						<h4 class="my-0 font-weight-normal text-center text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="white" class="bi bi-moon-stars-fill" viewBox="0 0 16 22">
							<path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
							<path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
						</svg> Aioria</h4>
					</div>
					<div class="card-body border border-dark">
						<h1 class="card-title pricing-card-title text-center titulo">$170 <small class="text-dark">/6 meses</small></h1>
						<ul class="">
							<li>Llenar Perfil Empresarial. </li>
							<li>Agregar 3 fotos a Carrousel.</li>
							<li>Agregar 3 fotos a Perfil.</li>
							<li>Agregar enlaces de redes sociales: Facebook, Instagram, Twitter y Linkedin.</li>
							<li>Agregar Nmros de Tel&eacute;fono. </li>
							<li>Agregar Nmros de Whatsapp. </li>
							<li>Agregar Dirección De Empresa.</li>
							<li>Crear, Editar y eliminar perfil.</li>
							<li>Ver/Descargar Facturas.</li>
							<li>Habilitar &Aacuterea de Empresa.</li>
							<li>Habilitar Chat de Soporte.</li>
							<li>Aparecer en listados de busqueda.</li>
							<li>Ahorre <span class="green"><strong>$20</strong></span></li>
						</ul>

					</div>
					<div class="card-footer border border-dark text-center">
						<a href="{{route('comprando_perfil_empresarial_aioria',$user)}}" class="btn btn-dark" style="font-weight: 900">Comprar</a>
					</div>
				</div>
				<div class="card mb-4 box-shadow">
					<div class="card-header  border border-dark">
						<h4 class="my-0 font-weight-normal text-center text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="25" fill="white" class="bi bi-shield-fill-plus" viewBox="0 0 16 22">
							<path fill-rule="evenodd" d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm-.5 5a.5.5 0 0 1 1 0v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5z"/>
						</svg> Drag&oacute;n</h4>
					</div>
					<div class="card-body border border-dark">
						<h1 class="card-title pricing-card-title text-center titulo">$300 <small class="text-dark">/1 año</small></h1>
						<ul class="">
							<li>Llenar Perfil Empresarial.</li>
							<li>Agregar 3 fotos a Carrousel.</li>
							<li>Agregar 3 fotos a Perfil.</li>
							<li>Agregar enlace de redes sociales: Facebook, Instagram, Twitter y Linkedin.</li>
							<li>Agregar Nmros de Tel&eacute;fono. </li>
							<li>Agregar Nmros de Whatsapp. </li>
							<li>Agregar Dirección De Empresa.</li>
							<li>Crear, Editar y eliminar perfil.</li>
							<li>Ver/Descargar Facturas.</li>
							<li>Habilitar &Aacuterea de Empresa.</li>
							<li>Habilitar Chat de Soporte.</li>
							<li>Aparecer en listados de busqueda.</li>
							<li>Ahorre <span class="green"><strong>$60</strong></span></li>
						</ul>

					</div>
					<div class="card-footer border border-dark text-center">
						<a href="{{route('comprando_perfil_empresarial_dragon',$user)}}" class="btn btn-dark" style="font-weight: 900">Comprar</a>
					</div>
				</div>
			</div>
				</div>
			</div>
		</div>
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
		<!-- Copyright Section-->
        <footer  class="bg-dark py-4 text-center text-white foo">
          <p class="p-2">  &copy; tumedibot 2023 <a class="forgot m-2 text-success" href="{{ route('privacy') }}"  target="_self">Privacidad</a> &middot; <a class="forgot m-2 text-success" href="{{ route('terms') }}" target="_self">Términos y condiciones</a> &middot; <a class="forgot m-2 text-success" href="{{ route('cookies') }}">Política de Cookies</a> &middot; <a class="forgot m-2 text-success" href="{{ route('manual_usuario') }}"  target="_self">Manual de Usuario</a><i class="bi bi-download"></i><a class="mx-3" href="#"><i class="bi bi-arrow-up-circle text-success" ></i></a></p>
        </footer> 
	</body>
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
	<script>window.jQuery || document.write('<script src="../../startbootstrap-freelancer-gh-pages/startbootstrap-freelancer-gh-pages/js/jquery-slim.min.js"><\/script>')</script>
	<script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\popper.min.js"></script>
	<script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\bootstrap.min.js"></script>
</body>
</html>