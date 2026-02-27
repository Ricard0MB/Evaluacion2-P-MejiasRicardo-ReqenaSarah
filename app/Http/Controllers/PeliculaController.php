<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Pelicula;
use Illuminate\Http\Request;

class PeliculaController extends Controller
{
    public function index()
    {
        $peliculas = Pelicula::with('director')->get();
        return view('peliculas.index', compact('peliculas'));
    }

    public function create()
    {
        $directores = Director::orderBy('nombre')->get();
        return view('peliculas.create', compact('directores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo'   => 'required|string|max:255',
            'duracion' => 'required|integer|min:1',
            'estreno'  => 'required|date|after:today',
            'director_id' => 'nullable',
        ]);

        if ($request->director_id === 'nuevo') {
            $request->validate([
                'nuevo_director' => 'required|string|max:255|unique:directores,nombre'
            ]);

            $director = Director::create([
                'nombre' => $request->nuevo_director,
                'nacionalidad' => null
            ]);
            $directorId = $director->id;
        } else {
            $request->validate([
                'director_id' => 'required|exists:directores,id'
            ]);
            $directorId = $request->director_id;
        }

        Pelicula::create([
            'titulo'      => $request->titulo,
            'duracion'    => $request->duracion,
            'estreno'     => $request->estreno,
            'director_id' => $directorId,
        ]);

        return redirect()->route('peliculas.index')
                         ->with('success', 'Película creada correctamente.');
    }

    public function show(Pelicula $pelicula)
    {
        return view('peliculas.show', compact('pelicula'));
    }

    public function edit(Pelicula $pelicula)
    {
        $directores = Director::orderBy('nombre')->get();
        return view('peliculas.edit', compact('pelicula', 'directores'));
    }

    public function update(Request $request, Pelicula $pelicula)
    {
        $request->validate([
            'titulo'   => 'required|string|max:255',
            'duracion' => 'required|integer|min:1',
            'estreno'  => 'required|date|after:today',
            'director_id' => 'nullable',
        ]);

        if ($request->director_id === 'nuevo') {
            $request->validate([
                'nuevo_director' => 'required|string|max:255|unique:directores,nombre'
            ]);

            $director = Director::create([
                'nombre' => $request->nuevo_director,
                'nacionalidad' => null
            ]);
            $directorId = $director->id;
        } else {
            $request->validate([
                'director_id' => 'required|exists:directores,id'
            ]);
            $directorId = $request->director_id;
        }

        $pelicula->update([
            'titulo'      => $request->titulo,
            'duracion'    => $request->duracion,
            'estreno'     => $request->estreno,
            'director_id' => $directorId,
        ]);

        return redirect()->route('peliculas.index')
                         ->with('success', 'Película actualizada correctamente.');
    }

    public function destroy(Pelicula $pelicula)
    {
        $pelicula->delete();
        return redirect()->route('peliculas.index')
                         ->with('success', 'Película eliminada.');
    }
}