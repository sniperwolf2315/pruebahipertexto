@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Lista de Cursos</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario para crear/editar cursos -->
        <div class="card mb-3">
            <div class="card-header">
                @if(isset($curso))
                    Editar Curso
                @else
                    Agregar Curso
                @endif
            </div>
            <div class="card-body">
                <form action="{{ isset($curso) ? route('cursos.update', $curso->id) : route('cursos.store') }}" method="POST">
                    @csrf
                    @if(isset($curso))
                        @method('PUT')
                    @endif
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre" value="{{ isset($curso) ? $curso->nombre : '' }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ isset($curso) ? 'Actualizar' : 'Guardar' }}</button>
                </form>
            </div>
        </div>

        <!-- Tabla de cursos -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                <tr>
                    <td>{{ $curso->id }}</td>
                    <td>{{ $curso->nombre }}</td>
                    <td>
                        <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-sm btn-info">Editar</a>
                        <form action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display: inline;">
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
