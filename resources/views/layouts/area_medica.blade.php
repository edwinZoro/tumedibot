<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tumedibot" />
    <meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>tumedibot</title>
    <link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\fuentes\fuentes_tumedibot.css')}}"  rel="stylesheet">
    <link href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\css\bootstrap.min.css')}}"  rel="stylesheet">
    <link href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\font\bootstrap-icons.css')}}" rel="stylesheet" />
    <style type="text/css">
        .my-custom-scrollbar {
            position: relative;
            height: 160px;
            overflow: auto;
        }
        .table-wrapper-scroll-y {
            display: block;
        }
        .encabezado{
            background:0px 100px url({{asset('area_medico.png')}});
            background-size:cover;
            background-repeat:no-repeat;
            background-attachment:fixed;
        }
        .card{
            border-color:white;
            box-shadow:0 0 5px green,0 0 10px white,0 0 15px black;
        }
        .forgot{
            text-decoration: none;
        }
        .forgot:hover{
            opacity: 0.9;
            transition: all 0.5s;
        }
    </style>
    <link rel="stylesheet" type="text/css" href='{{asset('sweetalert2-11.4.8\package\dist\sweetalert2.min.css')}}'/>
    <script src='{{asset('sweetalert2-11.4.8\package\dist\sweetalert2.all.min.js')}}'></script>
    <link rel="icon" type="image/x-icon" href="{{asset('icon_medibot.png')}}" />
</head>
<body id="page-top">
 <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href={{route('lista_medico')}}><img class="medibot" src={{asset('medibot_f.png')}}></a>
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
          <a class="nav-link text-underline" href="{{route('perfilesMedicosAutenticated',$user)}}"><i class="bi bi-shield-plus"></i> Soy Doctor</a>
          </li>
          </ul>
          <!-- mibew button --><a id="mibew-agent-button" href="/helpChat/chat?locale=es" target="_blank" onclick="Mibew.Objects.ChatPopups['67912371209871dd'].open();return false;"><img src="/helpChat/b?i=mibew&amp;lang=es" border="0" alt="" /></a><script type="text/javascript" src="/helpChat/js/compiled/chat_popup.js"></script><script type="text/javascript">Mibew.ChatPopup.init({"id":"67912371209871dd","url":"\/helpChat\/chat?locale=es","preferIFrame":true,"modSecurity":false,"forceSecure":false,"style":"","width":640,"height":480,"resizable":true,"styleLoader":"\/helpChat\/chat\/style\/popup"});</script><!-- / mibew button -->
         <form class="form-inline ml-2 mt-2 mt-md-0" method="POST" action="/logout">
              {{ csrf_field() }}
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="bi bi-box-arrow-left"></i> Salir</button>
          </form>
        </div>
      </nav>

<header class="masthead bg-light  text-light text-center encabezado" >
        <h2 class="fuente_j">&Aacute;rea M&eacute;dico</h2>
</header>
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-4 my-2">
                <div class="card p-3" >
                    <h4 class="text-primary">Perfil M&eacute;dico</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center">
                               <a class="btn btn-success btn-sm my-1 crear_perfil"   href="{{route('perfilesMedicos')}}"><i class="bi bi-shield-plus"></i> Crear M&eacute;dico</a>
                            </div>

                        <div class="text-center">
                                <a id="botonc" class="btn btn-primary btn-sm my-1 "   href="{{route('perfil_personal',$medico ?? '')}}"><i class="bi bi-eye"></i> Perfil M&eacute;dico</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="text-center ">
                                    <a id="boton" class="btn btn-secondary btn-sm my-1 " href="{{route('editar_medico_perfil',$medico ?? '')}}" ><i class="bi bi-pencil"></i> Editar M&eacute;dico</a>
                                </div>
                                <div class="text-center">
                                    <form class="my-1 eliminar"  method="POST" action="{{route('delete_medico_perfil',$medico ?? '')}}">
                                     @csrf
                                     @method('delete')
                                     <button id="botona" type="submit" class="btn btn-danger btn-sm " value=""><i class="bi bi-shield-x"></i> Eliminar Perf&iacute;l</button>
                                    </form>
                                </div>
                        </div>
                    </div>
                        <div>
                            <h4 class="text-primary">Calendario</h4>
                              <div class="text-center">
                               <a id="botond" class="btn btn-success btn-sm my-1 crear_perfil"   href="{{route('prove_fetch',[$medico ?? '',$user ?? ''])}}"><i class="bi bi-calendar2-check"></i> Config Calendario</a>
                               <a id="botond" class="btn btn-primary btn-sm my-1 crear_perfil"   href="{{route('pacientes',[$medico ?? '',$user ?? ''])}}"><i class="bi bi-people"></i> Pacientes</a>
                            </div>
                        </div>
                        @if(isset($medico) === false)
                                <script type="text/javascript">
                                    let a = document.getElementById('botonc')
                                    let b = document.getElementById('boton')
                                    let c = document.getElementById('botona')
                                    let d = document.getElementById('botond')
                                    a.style.visibility= 'hidden';
                                    b.style.visibility= 'hidden';
                                    c.style.visibility= 'hidden';
                                    d.style.visibility= 'hidden';
                               </script>
                        @endif
                </div>


        </div>
        <div class="col-md-8 my-2">
            <div class="card p-3">
                <h4 class="text-primary">Pagos de Plan</h4>
			     <div class="table-responsive ">
                    <ul>
                        <li><small>Presione el bot&oacuten Pagar para hacer sus pedidos.</small></li>
                        <li><small>Si desea cambiar plan avisenos por el chat.</small></li>
                    </ul>
    			   <table class=" table table-dark table-striped">
                            <th>Nombre</th>
                            <th>Plan</th>
                            <th>Costo</th>
                            <th>Pague Plan</th>
                            <th>@yield('mejoras')</th>
                            <tr>
                            @foreach($factura as $f)
                            <td><i>{{ucfirst($f->nombre)}}, {{ucfirst($f->apellido)}}</i></td>
                            @endforeach
                            <td>@yield('titulo_plan')</td>
                            <td>$@yield('plan_precio') + iva</td>
                            <td><a href="@yield('ruta_pagar')" class="btn btn-sm btn-primary" href="_blank">Pagar</a></td>
                            <td><a href="" class="btn btn-sm btn-primary" disabled>Cambiar Plan</a></td>
                            </tr>
    			    </table>
			     </div>
            </div>
	    </div>
    </div>
        <div class="row">
            <div class="col-md-4 my-2">
                                <div class="card p-3">
                    <h4 class="text-primary">Datos de Factura</h4>
                         @foreach($factura as $f)
                        <i>{{ucfirst($f->nombre)}}, {{ucfirst($f->apellido)}}</i>
                        <i>Nº de identificaci&oacute;n: {{$f->ci_rif}}</i>
                        <i>{{$f->estado}}, {{$f->ciudad}},</i>
                        <i>{{$f->direccion}}, {{$f->codigo_postal}}</i>
                        <i>TLF: {{$f->celular}}</i>
                        @endforeach
                <div class="card-footer text-center bg-white" >
                    <a href="@yield('ruta_actualizar')" class="btn btn-sm btn-success"><i class="bi bi-arrow-down-up"></i> Actualizar</a>
                </div>
                </div>
            </div>
        <div class="col-md-8 my-2">
            <div class="card p-3" >
                <h4 class="text-primary">Pedidos</h4>
			     <div class="table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar">
                    <ul>
                        <li><small>Presione el bot&oacuten (No Pagado/Pagado) para ver pdf de facturas.</small></li>
                        <li><small>Luego de pagar, Reporte El Pago y notifique por chat a nuestros operadores.</small></li>
                        <li><small>Si desea pagar con crypto presione el siguiente enlace: <a href={{route('crypto_pay')}} target="_blank">Pagar con Crypto</a>. Tambien se puede suscribir con Paypal presionando el siguiente Botón</small></li></ul>
                        @foreach($pedi as $p)
                        <div class="d-flex justify-content-center">
                          @if($p->plan === 'andromeda')
                                    <div id="paypal-button-container-P-0TH61499TM750412VMQ2ADIQ"></div>
                                    <script src="https://www.paypal.com/sdk/js?client-id=AcjKr1dIRIlqcsimhDghBhccQXif2wgwS5V4todPbBerLYSeQIP7eFqjw-EZ1eIs5QPFgX84-sHBQCJT&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
                                    <script>
                                      paypal.Buttons({
                                          style: {
                                              shape: 'pill',
                                              color: 'blue',
                                              layout: 'horizontal',
                                              label: 'subscribe'
                                          },
                                          createSubscription: function(data, actions) {
                                            return actions.subscription.create({
                                              /* Creates the subscription */
                                              plan_id: 'P-0TH61499TM750412VMQ2ADIQ'
                                            });
                                          },
                                          onApprove: function(data, actions) {
                                            alert(data.subscriptionID); // You can add optional success message for the subscriber here
                                          }
                                      }).render('#paypal-button-container-P-0TH61499TM750412VMQ2ADIQ'); // Renders the PayPal button
                                    </script>
                                @elseif($p->plan === 'fenix')
                                    <div id="paypal-button-container-P-64F7219433878621WMQ2AM3I"></div>
                                    <script src="https://www.paypal.com/sdk/js?client-id=AcjKr1dIRIlqcsimhDghBhccQXif2wgwS5V4todPbBerLYSeQIP7eFqjw-EZ1eIs5QPFgX84-sHBQCJT&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
                                    <script>
                                      paypal.Buttons({
                                          style: {
                                              shape: 'pill',
                                              color: 'blue',
                                              layout: 'horizontal',
                                              label: 'subscribe'
                                          },
                                          createSubscription: function(data, actions) {
                                            return actions.subscription.create({
                                              /* Creates the subscription */
                                              plan_id: 'P-64F7219433878621WMQ2AM3I'
                                            });
                                          },
                                          onApprove: function(data, actions) {
                                            alert(data.subscriptionID); // You can add optional success message for the subscriber here
                                          }
                                      }).render('#paypal-button-container-P-64F7219433878621WMQ2AM3I'); // Renders the PayPal button
                                    </script>
                                @elseif($p->plan === 'pegasus')
                                    <div class="col-md-6" id="paypal-button-container-P-97K39607M8380533KMQ2AOKA"></div>
                                    <script src="https://www.paypal.com/sdk/js?client-id=AcjKr1dIRIlqcsimhDghBhccQXif2wgwS5V4todPbBerLYSeQIP7eFqjw-EZ1eIs5QPFgX84-sHBQCJT&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
                                    <script>
                                      paypal.Buttons({
                                          style: {
                                              shape: 'pill',
                                              color: 'blue',
                                              layout: 'horizontal',
                                              label: 'subscribe'
                                          },
                                          createSubscription: function(data, actions) {
                                            return actions.subscription.create({
                                              /* Creates the subscription */
                                              plan_id: 'P-97K39607M8380533KMQ2AOKA'
                                            });
                                          },
                                          onApprove: function(data, actions) {
                                            alert(data.subscriptionID); // You can add optional success message for the subscriber here
                                          }
                                      }).render('#paypal-button-container-P-97K39607M8380533KMQ2AOKA'); // Renders the PayPal button
                                    </script>
                                @endif

                      </div>
                        @endforeach
    			   <table class="table table-dark table-striped table-sm " >
        					<th scope="col"><small>Pedido &#8470;</small></th>
        					<th scope="col"><small>Fecha del pedido</small></th>
        					<th scope="col"><small>Fecha de Vencimiento</small></th>
        					<th scope="col"><small>Total $.</small></th>
        					<th scope="col"><small>Estado</small></th>
        					@foreach($pedi as $p)
        				    <tr>
        					<td>{{$p->ticket}}</td>
                            <td>{{$p->fecha_pedido}}</td>
                            <td>{{$p->fecha_vence_pedido}}</td>
                            <td>{{$p->total}}</td>

                            <td><a  target="_blank" href="{{route('pagando_perfil_medico',[$user,$p->id])}}" class="btn btn-sm {{$p->estado === 'No Pagado' ?'btn-danger':'btn-success'}}">{{$p->estado}}</a></td>
        				    </tr>
        				   @endforeach
    			    </table>
			     </div>
			    <div class="d-flex justify-content-center pagination pagination-sm mt-1">
                   {{ $pedi->appends(['reporte'=>$reporte])->links() }}
                </div>
            </div>
	    </div>
     </div>
     <div class="row">
        <div class="col-md-4 my-2">
            <div class="card p-3">
                 <h6 class="text-primary">Reportar Pagos</h6>
                    <div class="text-center">
                       <a class="btn btn-primary my-1 crear_perfil"   href="{{route('reporte_pago',$user)}}"><i class="bi bi-credit-card"></i> Reporte Pago</a>
                    </div>
                    <h6 class="text-primary">Saldo de {{ucfirst($f->nombre)}} {{ucfirst($f->apellido)}}</h6>
                    <div class="row">
                        <div class="col-md-3">
                           <b>USD</b>
                        </div>
                        <div class="col-md-9">
                           <i>Ingreso: <b>{{$reporte_b->ingreso ?? '0'}}</b>$.</i><br>
                           <i>Egreso:<b> {{$reporte_b->egreso ?? '0'}}</b>$.</i><br>
                           <i>Balance: <b>{{$reporte_b->credito ?? '0'}}</b>$.</i>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col-md-8 my-2">
        <div class="card p-3" >
            <h4 class="text-primary">Pagos Realizados</h4>
			    <div class="table-responsive-sm table-wrapper-scroll-y my-custom-scrollbar">
			        <ul>
			            <li><small>La informaci&oacute;n que esta viendo puede tener un retardo de hasta 30 minutos.</small></li>
			            <li><small>Las transacciones pendientes no se veran reflejadas en su saldo.</small></li>
			            <li><small>El saldo se le abona o debita a los datos de facturaci&oacuten con el que reporto el pago.</small></li>
			        </ul>

    			   <table class="table table-dark table-striped table-sm" >
        					<th><small>ID</small></th>
        					<th><small>Fecha de Ingreso</small></th>
        					<th><small>Fecha de Vencimiento</small></th>
        					<th><small>Total $.</small></th>
        					<th><small>Estado</small></th>
        					@foreach($reporte ?? '' as $r)
        				    <tr>
        					<td>{{$r->transaccion_id}}</td>
                            <td>{{$r->fecha_transaccion}}</td>
                            <td>{{$r->fecha_vence_transaccion}}</td>
                            <td>{{$r->monto_pagado}}</td>
                            <td><p class="btn btn-sm {{$r->estado === 'procesando' ?'btn-secondary':'btn-primary'}}">{{$r->estado}}</p></td>
        				    </tr>
        				    @endforeach
    			    </table>
			     </div>
			     <div class="d-flex justify-content-center pagination pagination-sm mt-1">
                   {{ $reporte->appends(['pedi'=>$pedi])->links() }}
                </div>
            </div>

	    </div>
     </div>
    </div>
		<!-- Copyright Section-->
	      <footer  class="bg-dark py-4 mt-5 text-center text-white foo">
          <p class="p-2">  &copy; tumedibot 2023 <a class="forgot m-2 text-success" href="{{ route('privacy') }}"  target="_self">Privacidad</a> &middot; <a class="forgot m-2 text-success" href="{{ route('terms') }}" target="_self">Términos y condiciones</a> &middot; <a class="forgot m-2 text-success" href="{{ route('cookies') }}">Política de Cookies</a> &middot; <a class="forgot m-2 text-success" href="{{ route('manual_usuario') }}"  target="_self">Manual de Usuario</a><i class="bi bi-download"></i><a class="mx-3" href="#"><i class="bi bi-arrow-up-circle text-success" ></i></a></p>
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
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\jquery-slim.min.js')}}"></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\popper.min.js')}}" ></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\js\bootstrap.min.js')}}" ></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\holder.min.js')}}"></script>

        		<!--Monkey D Luffy-->
        <script type="text/javascript" src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\eliminar.js"></script>
        @if (session('status'))
        <script src="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\crear_perfil.js')}}"></script>
        @endif
        @if (session('statusg'))
        <script src="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\statusg.js')}}"></script>
        @endif
        @if (session('report'))
        <script src="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\report.js')}}"></script>
        @endif
        @if (session('status_pago'))
        <script src="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\pagar_perfil.js')}}"></script>
        @endif
        @if (session('mensajepago'))
        <script src="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\mensaje_paga.js')}}"></script>
        @endif
</body>
</html>
