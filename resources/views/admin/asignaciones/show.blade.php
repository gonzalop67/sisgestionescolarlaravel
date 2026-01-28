@extends('adminlte::page')

@section('content_header')
    <h1>Asignaciones/Datos de la asignación de materias del docente</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del docente</h3>
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
                                                <img src="{{ url('storage/' . $asignacion->personal->foto) }}"
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
                                        <p id="apellidos">{{ $asignacion->personal->apellidos }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Nombres</label>
                                        <p id="nombres">{{ $asignacion->personal->nombres }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Carnet de Identidad</label>
                                        <p id="ci">{{ $asignacion->personal->ci }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Fecha de nacimiento</label>
                                        <p id="fecha_nacimiento">{{ $asignacion->personal->fecha_nacimiento }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Teléfono</label>
                                        <p id="telefono">{{ $asignacion->personal->telefono }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Dirección</label>
                                        <p id="direccion">{{ $asignacion->personal->direccion }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Correo electrónico</label>
                                        <p id="email">{{ $asignacion->personal->usuario->email }}</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Profesión</label>
                                        <p id="profesion">{{ $asignacion->personal->profesion }}</p>
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
                            <h3 class="card-title">Formación académica</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Título</th>
                                        <th>Institución</th>
                                        <th>Nivel</th>
                                        <th>Fecha graduación</th>
                                        <th>Archivo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($asignacion->personal->formaciones as $item)
                                        <tr>
                                            <td>{{ $item->titulo }}</td>
                                            <td>{{ $item->institucion }}</td>
                                            <td>{{ $item->nivel }}</td>
                                            <td>{{ $item->fecha_graduacion }}</td>
                                            <td>
                                                <a href="{{ url('storage/' . $item->archivo) }}" target="_blank">Ver
                                                    Archivo</a>
                                            </td>
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
                    <h3 class="card-title">Datos de la asignación</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Turno</label>
                                <p>{{ $asignacion->turno->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Gestión</label>
                                <p>{{ $asignacion->gestion->nombre }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nivel_id">Nivel</label>
                                <p>{{ $asignacion->nivel->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Grado</label>
                                <p>{{ $asignacion->grado->nombre }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Paralelo</label>
                                <p>{{ $asignacion->paralelo->nombre }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Fecha</label>
                                <p>{{ $asignacion->fecha_asignacion }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="materia_id">Materia a impartir</label>
                                <p>{{ $asignacion->materia->nombre }}</p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/asignaciones') }}" class="btn btn-default"><i
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
