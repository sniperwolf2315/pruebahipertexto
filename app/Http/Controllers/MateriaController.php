<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        return view('materias', compact('materias'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|string|max:255']);

        Materia::create($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia creada exitosamente.');
    }

    public function show(string $id)
    {
        $materia = Materia::findOrFail($id);
        return view('materias.show', compact('materia'));
    }

    public function edit(string $id)
    {
        $materia = Materia::findOrFail($id);
        return view('materias.edit', compact('materia'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate(['nombre' => 'required|string|max:255']);

        $materia = Materia::findOrFail($id);
        $materia->update($request->all());

        return redirect()->route('materias.index')->with('success', 'Materia actualizada exitosamente.');
    }

    public function destroy(string $id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();

        return redirect()->route('materias.index')->with('success', 'Materia eliminada exitosamente.');
    }
}
