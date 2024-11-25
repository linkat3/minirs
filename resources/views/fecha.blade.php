<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha</title>
</head>

<body>
    <!-- <h1>Fecha de hoy</h1>
    <p>Día: {{ $datos->dia }}</p>
    <p>Mes: {{ $datos->mes }}</p>
    <p>Año: {{ $datos->año }}</p> -->

    <!-- usando compact() -->
    <h1>Fecha de hoy</h1>
    <ul>
        @foreach($datos as  $dato)
        <li>{{$dato->dia}}</li>
        <li>{{$dato->mes}}</li>
        <li>{{$dato->año}}</li>
        @endforeach
    </ul>
</body>


</html>