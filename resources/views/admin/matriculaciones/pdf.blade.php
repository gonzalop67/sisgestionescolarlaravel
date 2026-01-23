<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Matrícula del estudiante</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border: none;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td style="text-align: center; font-size: 8pt; width: 200px;">
                <img src="{{ url('storage/' . $configuracion->logo) }}" alt="" width="70px"><br>
                <b>{{ $configuracion->nombre }}</b><br>
                {{ $configuracion->direccion }}<br>
                {{ $configuracion->telefono }}<br>
                {{ $configuracion->correo_electronico }}<br>
            </td>
            <td style="width: 300px; text-aling: center;">
                <br><br><br><br><br><br>
                <h2><u>Matrícula del estudiante</u></h2>
            </td>
            <td style="text-align: center; width: 200px;">
                <p>Fotografía</p>
                <img src="{{ url('storage/' . $matricula->estudiante->foto) }}" width="100px" alt="">
            </td>
        </tr>
    </table>

    <table cellpadding="5" style="margin-left: 50px;">
        <tr>
            <td><b>Gestión: </b></td>
            <td>{{ $matricula->gestion->nombre }}</td>
        </tr>
        <tr>
            <td><b>Turno: </b></td>
            <td>{{ $matricula->turno->nombre }}</td>
        </tr>
        <tr>
            <td><b>Nivel: </b></td>
            <td>{{ $matricula->nivel->nombre }}</td>
        </tr>
        <tr>
            <td><b>Grado: </b></td>
            <td>{{ $matricula->grado->nombre }}</td>
        </tr>
        <tr>
            <td><b>Paralelo: </b></td>
            <td>{{ $matricula->paralelo->nombre }}</td>
        </tr>
    </table>
</body>

</html>
