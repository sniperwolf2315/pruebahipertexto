@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Materias</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario para crear/editar materias -->
        <div class="card mb-3">
            <div class="card-header">
                @if(isset($materia))
                    Editar Materia
                @else
                    Agregar Materia
                @endif
            </div>
            <div class="card-body">
                <form action="{{ isset($materia) ? route('materias.update', $materia->id) : route('materias.store') }}" method="POST">
                    @csrf
                    @if(isset($materia))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{ isset($materia) ? $materia->nombre : '' }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($materia) ? 'Actualizar' : 'Guardar' }}</button>
                </form>
            </div>
        </div>

        <!-- Tabla de materias -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materias as $materia)
                <tr>
                    <td>{{ $materia->id }}</td>
                    <td>{{ $materia->nombre }}</td>
                    <td>
                        <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-sm btn-info">Editar</a>
                        <form action="{{ route('materias.destroy', $materia->id) }}" method="POST" style="display: inline;">
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
