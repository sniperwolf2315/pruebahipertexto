@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Agregar Nota</h2>
        <form action="{{ route('notas.update') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="estudiante_id">Estudiante</label>
                <select name="estudiante_id" id="estudiante_id" class="form-control">
                    @foreach($estudiantes as $estudiante)
                        <option value="{{ $estudiante->id }}">{{ $estudiante->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="curso_id">Curso</label>
                <select name="curso_id" id="curso_id" class="form-control">
                    @foreach($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="materia_id">Materia</label>
                <select name="materia_id" id="materia_id" class="form-control">
                    @foreach($materias as $materia)
                        <option value="{{ $materia->id }}">{{ $materia->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nota">Nota</label>
                <input type="number" name="nota" id="nota" class="form-control" step="0.1" min="0" max="10">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
