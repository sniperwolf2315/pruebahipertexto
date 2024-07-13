<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Estudiante;
use App\Models\Curso;
use App\Models\Materia;

class NotaController extends Controller
{
    public function index()
    {
        $notas = Nota::all();
        return view('notas', compact('notas'));
    }

    public function create()
    {
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        $materias = Materia::all();
        return view('notas.create', compact('estudiantes', 'cursos', 'materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'materia_id' => 'required|exists:materias,id',
            'nota' => 'required|numeric|min:0|max:20',
        ]);

        Nota::create($request->all());

        return redirect()->route('notas.index')->with('success', 'Nota creada exitosamente.');
    }

    public function show(string $id)
    {
        $nota = Nota::findOrFail($id);
        return view('notas.show', compact('nota'));
    }

    public function edit(string $id)
    {
        $nota = Nota::findOrFail($id);
        $estudiantes = Estudiante::all();
        $cursos = Curso::all();
        $materias = Materia::all();
        return view('notas.edit', compact('nota', 'estudiantes', 'cursos', 'materias'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'curso_id' => 'required|exists:cursos,id',
            'materia_id' => 'required|exists:materias,id',
            'nota' => 'required|numeric|min:0|max:20',
        ]);

        $nota = Nota::findOrFail($id);
        $nota->update($request->all());

        return redirect()->route('notas.index')->with('success', 'Nota actualizada exitosamente.');
    }

    public function destroy(string $id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();

        return redirect()->route('notas.index')->with('success', 'Nota eliminada exitosamente.');
    }
}
