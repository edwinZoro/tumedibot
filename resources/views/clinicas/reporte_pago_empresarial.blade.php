<!DOCTYPE html>
<html>
<head>
  <title>tumedibot</title>
  <meta charset="UTF-8">
      <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\factura.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\css\bootstrap.min.css')}}">
  <link href="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\font\bootstrap-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\fuentes\fuentes_tumedibot.css')}}"  rel="stylesheet">
  <link rel="stylesheet" type="text/css" href='{{asset('sweetalert2-11.4.8\package\dist\sweetalert2.min.css')}}'/>
  <script src='{{asset('sweetalert2-11.4.8\package\dist\sweetalert2.all.min.js')}}'></script>
  <link rel="icon" type="image/x-icon" href="{{asset('icon_medibot.png')}}" />
    <style type="text/css">
      #second{
        display: none;

      }
      #tercero{
        display:none;
      }
    </style>
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
      <li class="nav-item" id="area_empresarial">
        <a class="nav-link text-underline" href="{{route('area_empresarial_get',Auth::id())}}"><i class="bi bi-clipboard-plus"></i> &Aacuterea Empresarial</a>
       </li>  
        <li >
              <a class="nav-link" href={{route('disease_robot')}}><i class="bi bi-house"></i> Principal <span class="sr-only"></span></a>
        </li>
             <li class=" ">
         <a class="nav-link text-underline" href="{{route('lista_medico')}}"><i class="bi bi-journal-plus"></i> Buscar Médicos</a>

        </li>
            <li class="nav-item">
              <a class="nav-link " href={{route('lista_empresarial')}}><i class="bi bi-building"></i> Clínicas-Laboratorios-Farmacias</a>
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
  <style>
    #area_empresarial{
      display: none;
    }
  .bg{
    background: hsla(192, 96%, 50%, 1);

    background: linear-gradient(90deg, hsla(192, 96%, 50%, 1) 0%, hsla(65, 92%, 54%, 1) 100%);

    background: -moz-linear-gradient(90deg, hsla(192, 96%, 50%, 1) 0%, hsla(65, 92%, 54%, 1) 100%);

    background: -webkit-linear-gradient(90deg, hsla(192, 96%, 50%, 1) 0%, hsla(65, 92%, 54%, 1) 100%);
  }
  </style>
  <div class="masthead bg">
     <h1 class="text-center text-white fuente_e" style="text-shadow: 0 0 3px white,0 0 6px white,0 0 10px black">Reporte de Pagos</h1>
  </div>  
    <div style="background-color: black"  class="container card mt-5 col-6">
    <h5 class="text-center text-light">Seleccione Tipo de Pago</h5>
    <form class="text-center text-light" id="modesto">
      <input class="form-radio" type="radio" name="transaccion" onclick="ca()"  checked id="paypal" value="paypal">
      <label class="form-label">Paypal</label>
      <input class="form-radio" type="radio" name="transaccion" onclick="cb()" id="bitcoin" value="bitcoin">
      <label class="form-label">Bitcoin</label>
     {{-- <input class="form-radio" type="radio" name="transaccion" onclick="cc()" id="banco" value="Banco">
      <label class="form-label">Banco</label>--}}
    </form>
    
  </div>
  <div class="container">
    <div class="container">
    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>

<form id="first" class="enviar" action="{{route('reporte_pago_empresarial_post',$user)}}" method="POST">
@csrf
<div class="container_c">
    <div class="card_c">
        <div class="form">
            <div class="left-side">
                <div class="left-heading">
                    <h3>Datos de Pago</h3>
                </div>
                <div class="steps-content">
                    <h3>Paso <span class="step-numberb">1</span></h3>
                </div>
                <ul class="progress-bar_cb">
                    <li class="activeb">Datos Paypal</li>
                    <li>Tipo de Transacci&oacute;n</li>
                    <li>Enviar Formulario</li>
                </ul>
            </div>
            <div class="right-side">
                <div class="mainb activeb">
                    <small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
</svg></small>
                    <div class="text">
                        <h2>Informaci&oacute;n de Paypal</h2>
                        <p>Agregue datos de transferencia Paypal.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="banco_emisor" required require id="user_nameb">
                            <span>Correo de Paypal</span>
                        </div>
                        <div class="input-div"> 
                            <input type="text" name="banco_receptor" required require>
                            <span>Nombre Usuario</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="nmro_referencia" required require>
                            <span>Id de Transacci&oacute;n</span>
                        </div>
                        <div class="input-div">
                            <input type="text" name="monto_pagado" required require>
                            <span>Monto Pagado</span>
                        </div>
                    </div>
                    <div class="buttons">
                        <a class="next_buttonb btn btn-sm btn-primary text-white">Siguiente</a>
                    </div>
                </div>
                <div class="mainb">
                    <small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
</svg></small>
                    <div class="text">
                        <h2>Más Informaci&oacute;n </h2>
                        <p>Agregue datos de transacci&oacute;n.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <label>Tipo de Transacci&oacute;n</label>
                            <select type="text" required require name="metodo_transaccion">
                                <option value="paypal">PAYPAL</option>
                            </select>
                            <div class="">
                            <input type="hidden" name="pedido_id" value={{$pedido_id ?? ''}} >
                            <input type="hidden" name="pedido_total" value={{$pedido_total ?? ''}} >
                        </div> 
                        </div>
                    </div>
                    <div class="buttons button_space">
                  <a class="back_buttonb btn btn-sm btn-dark text-white">Regresar</a>
                  <a class="next_buttonb btn btn-sm btn-primary text-white">Siguiente</a>
                   </div>
                 </div>
                 <div class="mainb">
                  <small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
</svg></small>
                  <div class="text">
                    <h2>Por &uacute;ltimo envie el formulario.</h2>
                     <p>
                         Su reporte aparecera en el &aacute;rea medica en estado de procesando
                    </p>
                    <p>
                         Espere que nuestro equipo considere el reporte como procesado
                    </p>
                  <p>
                    Recuerde no aceptar pagar en efectivo. Tumedibot no es responsable por dinero pagado en efectivo.
                  </p>
                  </div>
                  <br>

                  <div class="buttons button_space">
                  <a class="back_buttonb btn btn-sm btn-dark text-white">Regresar</a>
                  <input class="btn btn-primary text-white" type="submit"></input>  
                   </div>
                 </div>
                
                 <div class="mainb">
                     <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                     
                    <div class="text congrats">
                        <h2>Felicitaciones!</h2>
                        <p>Gracias. <span class="shown_nameb"></span>-Su informaci&oacute;n de facturaci&oacute;n fue enviada correctamente.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</form>

<form id="second" class="enviar" action="{{route('reporte_pago_empresarial_post',$user)}}" method="POST">
@csrf
<div class="container_c">
    <div class="card_c">
        <div class="form">
            <div class="left-side">
                <div class="left-heading">
                    <h3>Datos de Pago</h3>
                </div>
                <div class="steps-content">
                    <h3>Paso <span class="step-numbera">1</span></h3>
                </div>
                <ul class="progress-bar_ca">
                    <li class="activea">Datos Bitcoin</li>
                    <li>Tipo de Transacci&oacute;n</li>
                    <li>Enviar Formulario</li>
                </ul>
            </div>
            <div class="right-side">
                <div class="maina activea">
                    <small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
</svg></small>
                    <div class="text">
                        <h2>Informaci&oacute;n Bitcoin</h2>
                        <p>Agregue datos de transferencia Bitcoin.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="banco_emisor" required require id="user_namea">
                            <span>Cartera Bitcoin</span>
                        </div>
                        <div class="input-div"> 
                            <input type="text" name="banco_receptor" required require>
                            <span>Correo de Usuario</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="nmro_referencia" required require>
                            <span>Nº de Hash</span>
                        </div>
                        <div class="input-div">
                            <input type="text" name="monto_pagado" required require>
                            <span>Monto Pagado</span>
                        </div>
                    </div>
                    <div class="buttons">
                        <a class="next_buttona btn btn-sm btn-primary text-white">Siguiente</a>
                    </div>
                </div>
                <div class="maina">
                    <small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
</svg></small>
                    <div class="text">
                        <h2>Informaci&oacute;n Bitcoin</h2>
                        <p>Agregue datos de transacci&oacute;n.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <label>Tipo de Transacci&oacuten</label>
                            <select type="text" required require name="metodo_transaccion">
                                <option value="bitcoin">BITCOIN</option>
                            </select>
                            <div class="">
                            <input type="hidden" name="pedido_id" value={{$pedido_id ?? ''}} >
                            <input type="hidden" name="pedido_total" value={{$pedido_total ?? ''}} >
                        </div> 
                        </div>
                    </div>
                    <div class="buttons button_space">
                  <a class="back_buttona btn btn-sm btn-dark text-white">Regresar</a>
                  <a class="next_buttona btn btn-sm btn-primary text-white">Siguiente</a>
                   </div>
                 </div>
                 <div class="maina">
                  <small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
</svg></small>
                  <div class="text">
                    <h2>Por &uacute;ltimo envie el formulario.</h2>
                     <p>
                         Su reporte aparecera en el &aacute;rea medica en estado de procesando
                    </p>
                    <p>
                         Espere que nuestro equipo considere el reporte como procesado
                    </p>
                  <p>
                    Recuerde no aceptar pagar en efectivo. Tumedibot no es responsable por dinero pagado en efectivo.
                  </p>
                  </div>
                  <br>

                  <div class="buttons button_space">
                  <a class="back_buttona btn btn-sm btn-dark text-white">Regresar</a>
                  <input class="btn btn-primary text-white" type="submit"></input>  
                   </div>
                 </div>
                
                 <div class="maina">
                     <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                     
                    <div class="text congrats">
                        <h2>Felicitaciones!</h2>
                        <p>Gracias. <span class="shown_namea"></span>-Su informaci&oacute;n de facturaci&oacute;n fue enviada correctamente.</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</form>

<form id="tercero" class="enviar" action="{{route('reporte_pago_empresarial_post',$user)}}" method="POST">
@csrf
<div class="container_c">
    <div class="card_c">
        <div class="form">
            <div class="left-side">
                <div class="left-heading">
                    <h3>Datos de Pago</h3>
                </div>
                <div class="steps-content">
                    <h3>Paso <span class="step-number">1</span></h3>
                </div>
                <ul class="progress-bar_c">
                    <li class="active">Datos Bancarios</li>
                    <li>Tipo de Transacci&oacute;n</li>
                    <li>Enviar Formulario</li>
                </ul>
            </div>
            <div class="right-side">
                <div class="main active">
                    <small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
</svg></small>
                    <div class="text">
                        <h2>Informaci&oacute;n Bancaria</h2>
                        <p>Agregue datos de transacci&oacute;n.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="banco_emisor" required require id="user_name">
                            <span>Banco Emisor</span>
                        </div>
                        <div class="input-div"> 
                            <input type="text" name="banco_receptor" required require>
                            <span>Banco Receptor</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="nmro_referencia" required require>
                            <span>Nro de referencia</span>
                        </div>
                        <div class="input-div">
                            <input type="text" name="monto_pagado" required require>
                            <span>Monto Pagado</span>
                        </div>
                    </div>
                    <div class="buttons">
                        <a class="next_button btn btn-sm btn-primary text-white">Siguiente</a>
                    </div>
                </div>
                <div class="main">
                    <small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
</svg></small>
                    <div class="text">
                        <h2>Más Informaci&oacute;n Bancaria</h2>
                        <p>Agregue datos de transacci&oacute;n.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <label>Tipo de Transacci&oacuten</label>
                            <select type="text" required require name="metodo_transaccion">
                                <option></option>
                                <option value="transferencia">Transferencia</option>
                                <option value="pago movil">Pago M&oacute;vil</option>
                                <option value="deposito">Deposito</option>
                            </select>
                            <div class="">
                            <input type="hidden" name="pedido_id" value={{$pedido_id ?? ''}} >
                            <input type="hidden" name="pedido_total" value={{$pedido_total ?? ''}} >
                        </div> 
                        </div>
                    </div>
                    <div class="buttons button_space">
                  <a class="back_button btn btn-sm btn-dark text-white">Regresar</a>
                  <a class="next_button btn btn-sm btn-primary text-white">Siguiente</a>
                   </div>
                 </div>
                 <div class="main">
                  <small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.475 9C2.702 10.84 4.779 12.871 8 15c3.221-2.129 5.298-4.16 6.525-6H12a.5.5 0 0 1-.464-.314l-1.457-3.642-1.598 5.593a.5.5 0 0 1-.945.049L5.889 6.568l-1.473 2.21A.5.5 0 0 1 4 9H1.475ZM.879 8C-2.426 1.68 4.41-2 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C11.59-2 18.426 1.68 15.12 8h-2.783l-1.874-4.686a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.88Z"/>
</svg></small>
                  <div class="text">
                    <h2>Por &uacute;ltimo envie el formulario.</h2>
                     <p>
                         Su reporte aparecera en el &aacute;rea medica en estado de procesando
                    </p>
                    <p>
                         Espere que nuestro equipo considere el reporte como procesado
                    </p>
                  <p>
                    Recuerde no aceptar pagar en efectivo. Tumedibot no es responsable por dinero pagado en efectivo.
                  </p>
                  </div>
                  <br>

                  <div class="buttons button_space">
                  <a class="back_button btn btn-sm btn-dark text-white">Regresar</a>
                  <input class="btn btn-primary text-white" type="submit"></input>  
                   </div>
                 </div>
                
                 <div class="main">
                     <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                     
                    <div class="text congrats">
                        <h2>Felicitaciones!</h2>
                        <p>Gracias. <span class="shown_name"></span>-Su informaci&oacute;n de facturaci&oacute;n fue enviada correctamente.</p>
                        <p>Ahora s&oacute;lo debe pagar su factura con el monto establecido</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</form>
  <script type="text/javascript">
  var aa = document.getElementById('first');  
  var bb = document.getElementById('second');  
  var ccc = document.getElementById('tercero');  
    function ca(){
      aa.style.display = 'block';
      bb.style.display = 'none';
      ccc.style.display = 'none';
    }
    function cb(){
      bb.style.display = 'block';
      aa.style.display = 'none';
      ccc.style.display = 'none';
    }
    function cc(){
      ccc.style.display = 'block';
      aa.style.display = 'none';
      bb.style.display = 'none';
    }
    
  </script>
@if(session('estatus'))
<script>
            Swal.fire({
                  title: 'Reportado Pago Correctamente',
                  text: 'Espere que nuestro equipo confirme pago',
                  icon: 'success',
                  iconColor:'green',
                })
</script>
@endif
@if(session('estatusa'))
<script>
            Swal.fire({
                  title: 'Vaya al area medico',
                  text: 'Debe generar un pedido presionando el botón pagar plan',
                  icon: 'error',
                  iconColor:'red',
                })
</script>
@endif
  </div>
    <!-- Copyright Section-->
        <footer  class="bg-dark py-4 text-center text-white foo">
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
 
      @if($factu_cli->user_id === $user->id)
            <script>
                let a = document.getElementById('area_empresarial');
                a.style.display='block';
            </script>
      @endif
  <!--Factura-->
<script type="text/javascript" src="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\factura.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js"></script>
</body>
</html>


















