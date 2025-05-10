<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tumedibot" />
    <meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
	<title>tumedibot</title>
		<style type="text/css">
		body {
            font-family: 'Arial', sans-serif;
            margin: 30px;
            padding: 0;
            background-color: #ffffff;
            color: #333;
        }

        .container {
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            margin: auto;
        }

        .header {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            color: green;
        }

        .sub-header {
            text-align: center;
            font-size: 18px;
            color: #555;
        }

        .table-info {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .table-info th, .table-info td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table-info th {
            background: green;
            color: white;
        }

        .historial {
            background: #f8f8f8;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            border-left: 5px solid green;
        }

        .historial h2 {
            font-size: 18px;
            color: green;
        }

        .label {
            font-weight: bold;
            color: #555;
        }

        .archivo {
            margin: 10px 0;
        }

        .archivo a {
            text-decoration: none;
            color:green;
            font-weight: bold;
        }

        .archivo a:hover {
            text-decoration: underline;
        }

        hr {
            border: 1px solid #ddd;
        }
	</style>
	<link rel="icon" href="{{asset('icon_medibot.jpg')}}" type="image/x-icon"/>
</head>
<body>
	<div class="head">
	    <table class="table-head">
	        <tr class="tr-head">
	            <td><img width="16" height="16" src="{{public_path('icon_medibot.png')}}" alt="tumedibot"><i> tu<span style="color:green">medi</span>bot.com</i></td>
	        </tr>
	    </table>
	</div>
	<div class="container">
        <div class="header">Historial Médico</div>
        <div class="sub-header">Información del Paciente</div>
        <hr>

        <table class="table-info">
            <tr>
                <th>Nombre</th>
                <td>{{ $historiales[0]->cita->paciente->nombre_paciente }}</td>
            </tr>
            <tr>
                <th>Edad</th>
                <td>{{ $historiales[0]->cita->paciente->edad }} años</td>
            </tr>
            <tr>
                <th>Peso</th>
                <td>{{ $historiales[0]->cita->paciente->peso }} kg</td>
            </tr>
            <tr>
                <th>Estatura</th>
                <td>{{ $historiales[0]->cita->paciente->estatura }} m</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $historiales[0]->cita->paciente->tlf_paciente }}</td>
            </tr>
            <tr>
                <th>Correo</th>
                <td>{{ $historiales[0]->cita->paciente->email_paciente }}</td>
            </tr>
        </table>
        <hr>
        <div class="sub-header">Historial de Citas</div>
        @foreach ($historiales as $historial)
            <div class="historial">
                <h2>Cita: {{ date('d/m/Y H:i', strtotime($historial->cita->start)) }}</h2>
                <p><span class="label">Motivo:</span> {{ $historial->cita->motivo_consulta }}</p>
                <p><span class="label">Médico:</span> {{ $historial->cita->medico->nombre }} {{ $historial->cita->medico->second_name ?? '' }} {{ $historial->cita->medico->apellido }} {{ $historial->cita->medico->last_name ?? '' }}</p>
                <p><span class="label">Hospital/Clínica:</span> {{ $historial->cita->medico->nombre_hos_cli }}</p>
                <p><span class="label">Síntomas:</span> {{ $historial->cita->sintomas }}</p>
                <p><span class="label">Diagnóstico:</span> {{ $historial->diagnostico }}</p>
                <p><span class="label">Tratamiento:</span> {{ $historial->tratamiento }}</p>

                @if ($historial->notas->count())
                    <h3>Notas:</h3>
                    <ul>
                        @foreach ($historial->notas as $nota)
                            <li>{{ $nota->contenido }}</li>
                        @endforeach
                    </ul>
                @endif

                @if ($historial->archivos->count())
                    <h3>Archivos Adjuntos:</h3>
                    <ul>
                        @foreach ($historial->archivos as $archivo)
                            <li class="archivo">
                                <a href="{{ asset($archivo->ruta_archivo) }}" target="_blank">
                                    {{ $archivo->nombre_archivo }}
                                </a> ({{ strtoupper($archivo->extension) }})
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @endforeach
    </div>
</body>
</html>
