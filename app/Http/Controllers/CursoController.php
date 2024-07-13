<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('cursos', compact('cursos'));
    }

    public function create()
    {
        return view('cursos.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string|max:255']);

        Curso::create($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso creado exitosamente.');
    }

    public function show(string $id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.show', compact('curso'));
    }

    public function edit(string $id)
    {
        $curso = Curso::findOrFail($id);
        return view('cursos.edit', compact('curso'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(['nombre' => 'required|string|max:255']);

        $curso = Curso::findOrFail($id);
        $curso->update($request->all());

        return redirect()->route('cursos.index')->with('success', 'Curso actualizado exitosamente.');
    }

    public function destroy(string $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();

        return redirect()->route('cursos.index')->with('success', 'Curso eliminado exitosamente.');
    }
}
