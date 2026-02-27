<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles de la Película</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
    </style>
</head>
<body>
    <h1>{{ $pelicula->titulo }}</h1>

    <p><strong>Duración:</strong> {{ $pelicula->duracion }} minutos</p>
    <p><strong>Fecha de estreno:</strong> {{ $pelicula->estreno }}</p>
    <p><strong>Director:</strong> {{ $pelicula->director->nombre }}</p>

    <a href="{{ route('peliculas.index') }}">Volver al listado</a>
</body>
</html>