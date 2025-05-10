<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="tumedibot" />
  <meta name="author" content="EDWIN ENRIQUE BOADA MENA" />

  <title>
    @if($medico->sexo === 'MASCULINO' && $medico->especialidad === 'ENFERMERÍA')
    Lcdo {{ucfirst($medico->nombre)}} {{ucfirst($medico->apellido)}}
    @elseif($medico->sexo === 'FEMENINO' && $medico->especialidad === 'ENFERMERÍA')
    Lcda {{ucfirst($medico->nombre)}} {{ucfirst($medico->apellido)}}
    @endif
    @if($medico->sexo === 'MASCULINO' && $medico->especialidad != 'ENFERMERÍA')
    Dr {{ucfirst($medico->nombre)}} {{ucfirst($medico->apellido)}}
    @elseif($medico->sexo === 'FEMENINO' && $medico->especialidad != 'ENFERMERÍA')
    Dra {{ucfirst($medico->nombre)}} {{ucfirst($medico->apellido)}}
    @endif
  </title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="..\..\icon_medibot.png" />
        <!-- Font Awesome icons (free version)
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
      -->
      <!-- Google fonts-->
      <link href="../../bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\font\bootstrap-icons.css" rel="stylesheet" />
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
      <!-- Core theme CSS (includes Bootstrap)-->
      <link href="..\..\startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\css\styles.css" rel="stylesheet" />
      <link rel="stylesheet" type="text/css" href={{asset('sweetalert2-11.4.8\package\dist\sweetalert2.min.css')}}/>
      <script src={{asset('sweetalert2-11.4.8\package\dist\sweetalert2.all.min.js')}}></script>
      <style type="text/css">
        h3{
          text-decoration: underline;
        }

      </style>
    </head>
    <body id="page-top">
      <!-- Navigation-->
      <header class="container">
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#"><img src={{asset('medibot_f.png')}}></a>
        <a class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </a>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
                         <li class=" ">
         <a class="nav-link text-underline pequeño" href="{{route('lista_medico')}}"><i class="bi bi-journal-plus"></i> Buscar Médicos</a>
        </li>
      <li class="nav-item" id="area_medico">
        <a class="nav-link text-underline" href="#portfolio"><i class="bi bi-journal-medical"></i> Acerca de mí</a>
       </li>       
      <li class="nav-item" id="area_empresarial">
        <a  class="nav-link text-underline" href="#about"><i class="bi bi-geo-alt"></i> Dirección</a>
       </li>  

        <li class=" ">
          <a class="nav-link text-underline pequeño" href="#contact"><i class="bi bi-shield-plus"></i>  Contacto</a>
          </li>
          </ul>
{{--     <form class="form-inline mt-2 mt-md-0" method="POST" action="/logout">
              {{ csrf_field() }}           
            <button class="btn btn-outline-danger my-2 my-sm-0" type="submit"><i class="bi bi-box-arrow-left"></i> Salir</button>
          </form> --}}
        </div>
      </nav>
          </header>    
              <!-- Masthead-->

              <header class="masthead bg-dark text-white text-center mt-4">
                <div class="container d-flex align-items-center flex-column">
                  <!-- Masthead Avatar Image-->
                  <!-- Masthead Heading-->
                  <div class="trabajo">

                   <h1 class="pe text-uppercase mb-0 background-clip">
                    @if($medico->sexo === 'MASCULINO' && $medico->especialidad === 'ENFERMERÍA')
                    L<span class="text-lowercase">cdo</span> {{ucfirst($medico->nombre)}} {{ucfirst($medico->apellido)}}
                    @elseif($medico->sexo === 'FEMENINO' && $medico->especialidad === 'ENFERMERÍA')
                    L<span class="text-lowercase">cda</span> {{ucfirst($medico->nombre)}} {{ucfirst($medico->apellido)}}
                    @endif
                    @if($medico->sexo === 'MASCULINO' && $medico->especialidad != 'ENFERMERÍA')
                    D<span class="text-lowercase">r</span> {{ucfirst($medico->nombre)}} {{ucfirst($medico->apellido)}}
                    @elseif($medico->sexo === 'FEMENINO' && $medico->especialidad != 'ENFERMERÍA')
                    D<span class="text-lowercase">ra</span> {{ucfirst($medico->nombre)}} {{ucfirst($medico->apellido)}}
                    @endif
                  </h1>

                </div>
                  <img class="masthead-avatar my-5" style="outline-style: dashed;outline-offset: 4px;outline-color:white;filter:drop-shadow(0px 0px 15px gray);" src="..\..\imagen/{{$medico->foto}}" alt="..." />
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                  <div class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="white" class="bi bi-shield-plus" viewBox="0 0 16 16">
                    <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                    <path d="M8 4.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5a.5.5 0 0 1 .5-.5z"/>
                  </svg></div>
                  <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading-->
                <p class="masthead-subheading font-weight-light mb-0 dr">ESPECIALISTA EN: <span class="text-warning ">{{$medico->especialidad}}</span>    </p>
              </div>
            </header>
            <!-- Portfolio Section-->
            <div class="mb-5" id="portfolio"></div>
            <section class="page-section " >
              <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 style="color:#007bff;" class="page-section-heading text-center text-uppercase mb-0">Acerca de Mí</h2>
                <!-- Icon Divider-->
                <div style="color:#007bff;" class="divider-custom">
                  <div style="background-color:#007bff;" class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="#007bff" class="bi bi-journal-medical" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L9 6l.549.317a.5.5 0 1 1-.5.866L8.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L7 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 8 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                    <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                    <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                  </svg></div>
                  <div style="background-color:#007bff;" class="divider-custom-line"></div>
                </div>
                <!-- About Section Content-->
                <div class="row">
                  <div style="border-color:#007bff;border-style:double;box-shadow: 0 0 10px black;text-align:justify;" class="col-lg-12  card-group"><p>
                    {!!$medico->perfil_medico!!}
                  </p></div>

                </div>
                <!-- About Section Button-->
                <div class="text-center mt-4" >
                  <a class="btn btn-xl btn-outline-primary" href={{route('calendar_view',$medico->id)}} ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="24" fill="currentColor" class="bi bi-calendar-week" viewBox="0 3 16 16">
  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
</svg> Agendar Cita
                  </a>
                </div>

              </div>
            </section>
            <!-- About Section-->
            <div class="mb-5" id="about"></div>
            <section class="page-section text-white mb-0 bg-dark">

              <div class="container">
                <!-- Portfolio Grid Items-->
                <h2 class="page-section-heading text-warning text-center text-uppercase mb-0">Dirección</h2>
                <!-- Icon Divider-->
                <div  class="divider-custom">
                  <div  class="divider-custom-line bg-warning"></div>
                  <div class="divider-custom-icon"><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="#ffff00" class="bi bi-hospital" viewBox="0 0 16 16">
                    <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                    <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                  </svg></div>
                  <div class="divider-custom-line bg-warning"></div>
                </div>
                <div class="row justify-content-center">
                  <!-- Portfolio Item 1-->
                  <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal1">
                      <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                      </div>
                      <h3 class="text-center">Nombre Completo</h3>

                      <p class="text-uppercase text-warning text-center">
                        {{$medico->nombre}} {{$medico->apellido}} {{$medico->second_name}} {{$medico->last_name}}
                      </p>
                    </div>
                  </div>
                  <!-- Portfolio Item 2-->
                  <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal2">
                      <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                      </div>
                      <h3 class="text-center">Correo</h3>
                      <p class="text-warning text-center">
                        {{$medico->correo}}
                      </p>
                    </div>
                  </div>
                  <!-- Portfolio Item 3-->
                  <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal3">
                      <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                      </div>
                      <h3 class="text-center">Precio Consulta</h3>
                      <p class="text-uppercase text-warning text-center">
                        {{$medico->consultorio_costo}} <span class="text-white text-uppercase">$</span>
                      </p>

                    </div>
                  </div>
                  <!-- Portfolio Item 4-->
                  <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal4">
                      <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                      </div>
                      <h3 class="text-center">Consultorio</h3>
                      <ul>
                        <li class="list-unstyled">Pais: <span class="text-warning">{{$medico->pais->nombre_paises}}</span></li>
                        <li class="list-unstyled">Estado: <span class="text-warning">{{$medico->estado->name}}</span></li>
                        <li class="list-unstyled">Ciudad: <span class="text-warning">{{$medico->ciudad->name}}</span></li>
                     {{--   <li class="list-unstyled">{{ucfirst($medico->av_calle)}}: <span class="text-warning">{{$medico->nombre_av_calle}}</span></li>
                        <li class="list-unstyled">{{ucfirst($medico->ca_ed_cc)}}: <span class="text-warning">{{$medico->nombre_ca_ed_cc}} | {{$medico->nmro_ca_ed_cc}}</span> </li>
                      </ul>
                    </div>
                  </div>
                  <!-- Portfolio Item 5-->
                  <div class="col-md-6 col-lg-4 mb-5 mb-md-0">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal5">
                      <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                      </div>
                      <h3 class="text-center">{{ucfirst($medico->hospital_clinica)}}</h3>
                      <ul>
                        <li class="list-unstyled">{{ucfirst($medico->hospital_clinica)}}: <span class="text-warning">{{$medico->nombre_hos_cli}}</span></li>
                        <li class="list-unstyled">Consultorio: <span class="text-warning">{{$medico->nmro_hos_cli}}</span></li>
                      </ul>  
                    </div>
                  </div>--}}
                  <!-- Portfolio Item 6-->
                  <div class="col-md-6 col-lg-4">
                    <div class="portfolio-item mx-auto" data-bs-toggle="modal" data-bs-target="#portfolioModal6">
                      <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                        <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                      </div>
                      <h3 class="text-center">Horario De Trabajo</h3>
                      <ul class="text-left">
                        <li class="list-unstyled">Horario: <span class="text-warning">{{$medico->horario}}</span></li>
                      </ul>                        
                    </div>
                  </div>
                </div>

              </div>
            </section>
            <!-- Contact Section-->
            <div class="mb-3" id="contact"></div>
            <section class="page-section" id="contact">
              <div class="container">
                <!-- Contact Section Heading-->
                <h2 style="color:#007bff;" class="page-section-heading text-center text-uppercase mb-0">Contactar</h2>
                <!-- Icon Divider-->
                <div style="color:#007bff;" class="divider-custom">
                  <div style="background-color:#007bff;" class="divider-custom-line"></div>
                  <div class="divider-custom-icon"><svg xmlns="http://www.w3.org/2000/svg" width="38" height="38" fill="#007bff" class="bi bi-robot" viewBox="0 0 16 16">
                    <path d="M6 12.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5ZM3 8.062C3 6.76 4.235 5.765 5.53 5.886a26.58 26.58 0 0 0 4.94 0C11.765 5.765 13 6.76 13 8.062v1.157a.933.933 0 0 1-.765.935c-.845.147-2.34.346-4.235.346-1.895 0-3.39-.2-4.235-.346A.933.933 0 0 1 3 9.219V8.062Zm4.542-.827a.25.25 0 0 0-.217.068l-.92.9a24.767 24.767 0 0 1-1.871-.183.25.25 0 0 0-.068.495c.55.076 1.232.149 2.02.193a.25.25 0 0 0 .189-.071l.754-.736.847 1.71a.25.25 0 0 0 .404.062l.932-.97a25.286 25.286 0 0 0 1.922-.188.25.25 0 0 0-.068-.495c-.538.074-1.207.145-1.98.189a.25.25 0 0 0-.166.076l-.754.785-.842-1.7a.25.25 0 0 0-.182-.135Z"/>
                    <path d="M8.5 1.866a1 1 0 1 0-1 0V3h-2A4.5 4.5 0 0 0 1 7.5V8a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1v1a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-1a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1v-.5A4.5 4.5 0 0 0 10.5 3h-2V1.866ZM14 7.5V13a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7.5A3.5 3.5 0 0 1 5.5 4h5A3.5 3.5 0 0 1 14 7.5Z"/>
                  </svg></div>
                  <div style="background-color:#007bff;" class="divider-custom-line"></div>
                </div>

                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                  <div class="col-lg-8 col-xl-7">

                    <form id="contactForm" method="POST" action={{route('enviar_correo')}}>
                      @csrf
                          @if($errors->any())
                            <div class="container m-3">
                              <ul class="alert alert-danger">
                              @foreach($errors->all() as $error)
                              <li class="error text-danger">{{ $error }}</li>
                              @endforeach 
                            </ul>
                            </div>
                            @endif
                      <!-- Name input-->
                      <div class="form-floating mb-3">
                        <input class="form-control" id="name" name="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Nombre Completo</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                      </div>
                      <!-- Email address input-->
                      <div class="form-floating mb-3">
                        <input class="form-control" id="email" name="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label for="email">Correo</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                      </div>
                      <!-- Phone number input-->
                      <div class="form-floating mb-3">
                        <input class="form-control" id="phone" name="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Número de Teléfono</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                      </div>
                      <!-- Message input-->
                      <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Mensaje</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                      </div>
                      <input type="hidden" name="email_doctor" value={{$medico->correo}} >
                      <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                      <!-- Submit Button-->
                      <button class="btn btn-xl btn-outline-primary" id="submitButton" type="submit">Enviar</button>
                    </form>
                  </div>
                </div>
              </div>
            </section>
            <!-- Footer-->
            <footer class="footer text-center bg-dark">
              <div class="container">
                <div class="row">
                  <!-- Footer Location-->
                  <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Localizacion</h4>
                    <p class="lead mb-0">
                      <i style="color:white" class="bi bi-telephone-plus"></i> <small>{{$medico->telefono}}</small>
                    </p>
                    <p class="lead mb-0">
                      <i style="color:white" class="{{$medico->whatsapp !== '' ?'bi bi-whatsapp':''}}"></i> <small>{{$medico->whatsapp}}</small>
                    </p>
                  </div>
                  <!-- Footer Social Icons-->
                  <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Redes Sociales</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{$medico->facebook}}" target="_blank"><img style="" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\facebook.svg" width="48" height="48"></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{$medico->twitter}}" target="_blank"><img style="" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\twitter.svg" width="40" height="40"></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{$medico->linkedin}}" target="_blank"><img style="" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\linkedin.svg" width="35" height="35"></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="{{$medico->instagram}}" target="_blank"><img style="" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\instagram.svg" width="40" height="40"></a>
                  </div>
                  <!-- Footer About Text-->
                  <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Doctor</h4>
                    <p class="lead mb-0">
                       {{ucfirst($medico->usted_es)}}  con {{$medico->experiencia}} años de experiencia. Especializado en: {{$medico->especialidad}}.
                    </p>
                  </div>

                </div>

              </div>
            </footer>

    @if (session('status_paciente'))
        <script src="../../startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\status_paciente.js"></script>
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
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\jquery-slim.min.js')}}" ></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\popper.min.js')}}" ></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\dist\js\bootstrap.min.js')}}" ></script>
        <script src="{{asset('bootstrap-4.0.0\bootstrap-4.0.0\assets\js\vendor\holder.min.js')}}" ></script>

</body>
</html>