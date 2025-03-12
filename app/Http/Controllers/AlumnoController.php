<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        return view('alumnos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:alumnos,correo|max:255',
            'fecha_nacimiento' => 'required|date|before:today',
            'ciudad' => 'required|string|max:255',
        ]);

        Alumno::create($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno registrado con éxito');
    }

    // Mostrar un alumno específico
    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    // Mostrar formulario de edición
    public function edit(Alumno $alumno)
    {
        return view('alumnos.editar-alumno', compact('alumno'));
    }

    // Actualizar un alumno existente
    public function update(Request $request, Alumno $alumno)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:alumnos,correo,' . $alumno->id,
            'fecha_nacimiento' => 'required|date|before:today',
            'ciudad' => 'required|string|max:255',
        ]);

        $alumno->update($request->all());

        return redirect()->route('alumnos.index')->with('success', 'Alumno actualizado con éxito');
    }

    // Opcional: Eliminar (si lo necesitas más adelante)
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.index')->with('success', 'Alumno eliminado con éxito');
    }
}