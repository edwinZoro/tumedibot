<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="tumedibot" />
    <meta name="author" content="EDWIN ENRIQUE BOADA MENA" />
    <title>tumedibot</title>
    <style type="text/css">
        hr {
            border: 1px solid #000000;
        }
    </style>
</head>

<body>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            @if($logoBase64)
            <td style="width: 100px; vertical-align: middle;">
                <img src="{{ $logoBase64 }}" alt="Logo del médico"
                    style="width: 100px; height: 100px; object-fit: cover;">
            </td>
            @endif
            <td style="vertical-align: start;">
                <h2 style="margin: 5px; margin-left: 10px;"><b>{{ $historial->cita->medico->hospital_clinica }} {{
                        $historial->cita->medico->nombre_hos_cli }}</b></h2>
                <h3 style="margin: 5px; margin-left: 10px;">{{ $historial->cita->medico->av_calle }} {{
                    $historial->cita->medico->nombre_av_calle }} {{ $historial->cita->medico->nombre_ca_ed_cc }} {{
                    $historial->cita->medico->nmro_ca_ed_cc }}, {{ $historial->cita->medico->municipio->name }}</h3>
                <h3 style="margin: 5px; margin-left: 10px;">Telf: {{ $historial->cita->medico->telefono }}</h3>
            </td>
        </tr>
    </table>
    <hr>
    <h1 style="text-align: center">Informe médico</h1>
    <b>Paciente</b>
    <hr>
    <table style="width: 100%; margin-bottom:1rem">
        <tr>
            <td style="width: 50%; vertical-align: top;">
                <strong>Historia:</strong> {{ $historial->id }}<br>
                <strong>Nombre:</strong> {{ $historial->cita->paciente->nombre_paciente }}<br>
                <strong>Teléfono:</strong> {{ $historial->cita->paciente->tlf_paciente }}<br>
                <strong>Email:</strong> {{ $historial->cita->paciente->email_paciente }}<br>
            </td>
            <td style="width: 50%; vertical-align: top;">
                <strong>Edad:</strong> {{ $historial->cita->paciente->edad }} años<br>
                <strong>Peso:</strong> {{ $historial->cita->paciente->peso }}kg<br>
                <strong>Estatura:</strong> {{ $historial->cita->paciente->estatura }}m<br>
            </td>
        </tr>
    </table>
    <b>Consulta</b>
    <hr>
    <strong>Fecha: </strong>{{ $historial->cita->start }} / <strong>Motivo: </strong>{{
    $historial->cita->motivo_consulta }} / <strong>Atendida por: </strong>{{ $historial->cita->medico->nombre }} {{
    $historial->cita->medico->apellido }}<br>
    <strong>Sintomas: </strong>{{ $historial->cita->sintomas }}<br>
    <br>
    @if($historial->examen_fisico)
    <strong>Examen físico:</strong> {{ $historial->examen_fisico }}<br><br>
    @endif

    @if($historial->examen_funcional)
    <strong>Examen funcional:</strong> {{ $historial->examen_funcional }}<br><br>
    @endif

    @if($historial->examen_paraclinico)
    <strong>Examen paraclínico:</strong> {{ $historial->examen_paraclinico }}<br><br>
    @endif
    <strong>Diagnóstico: </strong>{{ $historial->diagnostico }}<br>
    <br>
    <strong>Tratamiento: </strong>{{ $historial->tratamiento }}<br>
    <br>
    @if($historial->conclusiones)
    <strong>Conclusiones:</strong> {{ $historial->conclusiones }}<br><br>
    @endif
    <strong>Notas:</strong>
    @if($historial->notas)
    <ul>
        @foreach($historial->notas as $nota)
        <li>{{ $nota->contenido }}</li>
        @endforeach
    </ul>
    @else
    <p>No hay notas registradas.</p>
    @endif
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <table style="width: 100%; border-collapse: collapse;">
        <tr>
            <td style="width: 50%; vertical-align: top; padding: 10px;">
                <div style="border-top: 1px solid black;"></div>
                <p style="text-align: center;">Firma del paciente</p>
            </td>
            <td style="width: 50%; vertical-align: top; padding: 10px;">
                <div style="border-top: 1px solid black;"></div>
                <p style="text-align: center;">Firma del médico</p>
                <p style="text-align: center;"><i>{{ $historial->cita->medico->nombre }} {{
                        $historial->cita->medico->second_name ?? "" }} {{
                        $historial->cita->medico->apellido }} {{ $historial->cita->medico->last_name ?? "" }}</i></p>
                <p style="text-align: center;">{{ $historial->cita->medico->especialidad }} </p>
            </td>
        </tr>
    </table>
</body>

</html>
