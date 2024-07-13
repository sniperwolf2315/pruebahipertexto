@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Notas</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario para crear/editar notas -->
        <div class="card mb-3">
            <div class="card-header">
                @if(isset($nota))
                    Editar Nota
                @else
                    Agregar Nota
                @endif
            </div>
            <div class="card-body">
                <form action="{{ isset($nota) ? route('notas.update', $nota->id) : route('notas.store') }}" method="POST">
                    @csrf
                    @if(isset($nota))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="estudiante_id">Estudiante</label>
                        <select name="estudiante_id" id="estudiante_id" class="form-control" required>
                            @foreach($estudiantes as $estudiante)
                                <option value="{{ $estudiante->id }}" {{ isset($nota) && $nota->estudiante_id == $estudiante->id ? 'selected' : '' }}>
                                    {{ $estudiante->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="curso_id">Curso</label>
                        <select name="curso_id" id="curso_id" class="form-control" required>
                            @foreach($cursos as $curso)
                                <option value="{{ $curso->id }}" {{ isset($nota) && $nota->curso_id == $curso->id ? 'selected' : '' }}>
                                    {{ $curso->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="materia_id">Materia</label>
                        <select name="materia_id" id="materia_id" class="form-control" required>
                            @foreach($materias as $materia)
                                <option value="{{ $materia->id }}" {{ isset($nota) && $nota->materia_id == $materia->id ? 'selected' : '' }}>
                                    {{ $materia->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nota">Nota</label>
                        <input type="number" name="nota" class="form-control" id="nota" value="{{ isset($nota) ? $nota->nota : '' }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($nota) ? 'Actualizar' : 'Guardar' }}</button>
                </form>
            </div>
        </div>

        <!-- Tabla de notas -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Estudiante</th>
                    <th>Curso</th>
                    <th>Materia</th>
                    <th>Nota</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notas as $nota)
                <tr>
                    <td>{{ $nota->id }}</td>
                    <td>{{ $nota->estudiante->nombre }}</td>
                    <td>{{ $nota->curso->nombre }}</td>
                    <td>{{ $nota->materia->nombre }}</td>
                    <td>{{ $nota->nota }}</td>
                    <td>
                        <a href="{{ route('notas.edit', $nota->id) }}" class="btn btn-sm btn-info">Editar</a>
                        <form action="{{ route('notas.destroy', $nota->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
