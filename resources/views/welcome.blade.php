@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <a href="{{ route('cursos.index') }}" class="btn btn-primary btn-lg btn-block mb-3">Gestionar Cursos</a>
                        <a href="{{ route('materias.index') }}" class="btn btn-primary btn-lg btn-block mb-3">Gestionar Materias</a>
                        <a href="{{ route('notas.index') }}" class="btn btn-primary btn-lg btn-block mb-3">Gestionar Notas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
