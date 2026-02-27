<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Películas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .success { color: green; font-weight: bold; }
        .actions a, .actions form { display: inline-block; margin-right: 5px; }
    </style>
</head>
<body>
    <h1>Listado de Películas</h1>

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    <a href="{{ route('peliculas.create') }}">➕ Nueva Película</a>

    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Duración (min)</th>
                <th>Estreno</th>
                <th>Director</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peliculas as $pelicula)
            <tr>
                <td>{{ $pelicula->titulo }}</td>
                <td>{{ $pelicula->duracion }}</td>
                <td>{{ $pelicula->estreno }}</td>
                <td>{{ $pelicula->director->nombre }}</td>
                <td class="actions">
                    <a href="{{ route('peliculas.show', $pelicula) }}">Ver</a>
                    <a href="{{ route('peliculas.edit', $pelicula) }}">Editar</a>
                    <form action="{{ route('peliculas.destroy', $pelicula) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Eliminar esta película?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>