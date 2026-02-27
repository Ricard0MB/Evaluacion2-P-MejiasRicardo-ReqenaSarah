<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Película</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .error { color: red; font-size: 0.9em; }
        form div { margin-bottom: 15px; }
        label { display: inline-block; width: 120px; }
        input, select { padding: 5px; width: 250px; }
        #nuevo_director_container { display: none; margin-top: 5px; }
    </style>
</head>
<body>
    <h1>Nueva Película</h1>

    <form action="{{ route('peliculas.store') }}" method="POST">
        @csrf

        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
            @error('titulo')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="duracion">Duración (min):</label>
            <input type="number" id="duracion" name="duracion" value="{{ old('duracion') }}" required>
            @error('duracion')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="estreno">Fecha de estreno:</label>
            <input type="date" id="estreno" name="estreno" value="{{ old('estreno') }}" required>
            @error('estreno')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="director_id">Director:</label>
            <select id="director_id" name="director_id">
                <option value="">Seleccione un director</option>
                @foreach($directores as $director)
                    <option value="{{ $director->id }}" {{ old('director_id') == $director->id ? 'selected' : '' }}>
                        {{ $director->nombre }}
                    </option>
                @endforeach
                <option value="nuevo">➕ Otro(a) (nuevo director)</option>
            </select>
            @error('director_id')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div id="nuevo_director_container">
            <label for="nuevo_director">Nuevo director:</label>
            <input type="text" id="nuevo_director" name="nuevo_director" 
                   value="{{ old('nuevo_director') }}" 
                   list="lista_directores"
                   placeholder="Escribe el nombre">
            <datalist id="lista_directores">
                @foreach($directores as $director)
                    <option value="{{ $director->nombre }}">
                @endforeach
            </datalist>
            @error('nuevo_director')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Guardar</button>
            <a href="{{ route('peliculas.index') }}">Cancelar</a>
        </div>
    </form>

    <script>
        const selectDirector = document.getElementById('director_id');
        const nuevoContainer = document.getElementById('nuevo_director_container');
        const nuevoInput = document.getElementById('nuevo_director');

        function toggleNuevoDirector() {
            if (selectDirector.value === 'nuevo') {
                nuevoContainer.style.display = 'block';
                nuevoInput.required = true;
            } else {
                nuevoContainer.style.display = 'none';
                nuevoInput.required = false;
            }
        }

        toggleNuevoDirector();

        selectDirector.addEventListener('change', toggleNuevoDirector);
    </script>
</body>
</html>