@extends('adminlte::page')

@section('content_header')
    <h1>Matriculaciones/Datos de la matriculación del estudiante</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del estudiante</h3>
                </div>
                <div class="card-body">

                    <div id="datos_estudiante">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Fotografía</label>
                                            <div class="text-center">
                                                <img src="{{ url('storage/' . $matricula->estudiante->foto) }}"
                                                    id="foto" width="150px" alt="foto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Apellidos</label>
                                        <p id="apellidos">{{ $matricula->estudiante->apellidos }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Nombres</label>
                                        <p id="nombres">{{ $matricula->estudiante->nombres }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Carnet de Identidad</label>
                                        <p id="ci">{{ $matricula->estudiante->ci }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Fecha de nacimiento</label>
                                        <p id="fecha_nacimiento">{{ $matricula->estudiante->fecha_nacimiento }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Teléfono</label>
                                        <p id="telefono">{{ $matricula->estudiante->telefono }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Dirección</label>
                                        <p id="direccion">{{ $matricula->estudiante->direccion }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Correo electrónico</label>
                                        <p id="email">{{ $matricula->estudiante->usuario->email }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Género</label>
                                        <p id="genero">{{ $matricula->estudiante->genero }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-info">
                        <div class="card-header">
                            <h3 class="card-title">Historial académico</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Turno</th>
                                        <th>Gestión</th>
                                        <th>Nivel</th>
                                        <th>Grado</th>
                                        <th>Paralelo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($matricula->estudiante->matriculaciones as $item)
                                        <tr>
                                            <td>{{ $item->turno->nombre }}</td>
                                            <td>{{ $item->gestion->nombre }}</td>
                                            <td>{{ $item->nivel->nombre }}</td>
                                            <td>{{ $item->grado->nombre }}</td>
                                            <td>{{ $item->paralelo->nombre }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos de la matrícula</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Turno</label>
                                <p>{{ $matricula->turno->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Gestión</label>
                                <p>{{ $matricula->gestion->nombre }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nivel_id">Nivel</label>
                                <p>{{ $matricula->nivel->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Grado</label>
                                <p>{{ $matricula->grado->nombre }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Paralelo</label>
                                <p>{{ $matricula->paralelo->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Fecha</label>
                                <p>{{ $matricula->fecha_matriculacion }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/matriculaciones') }}" class="btn btn-default"><i
                                        class="fas fa-arrow-left"></i>
                                    Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .select2-container .select2-selection--single {
            height: 40px !important;
        }
    </style>
@stop

@section('js')
    
@stop
