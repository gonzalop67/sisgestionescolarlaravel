@extends('adminlte::page')

@section('content_header')
    <h1>Datos del estudiante</h1>
    <hr>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Datos del padre de familia</h3>
                </div>
                <div id="datos_ppff" class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombres</label>
                                <p id="nombres">{{ $estudiante->ppff->nombres }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellidos</label>
                                <p id="apellidos">{{ $estudiante->ppff->apellidos }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Carnet de identidad</label>
                                <p id="ci">{{ $estudiante->ppff->ci }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Fecha de nacimiento</label>
                                <p id="fecha_nacimiento">{{ $estudiante->ppff->fecha_nacimiento }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Teléfono</label>
                                <p id="telefono">{{ $estudiante->ppff->telefono }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Parentesco</label>
                                <p id="parentesco">{{ $estudiante->ppff->parentesco }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Ocupación</label>
                                <p id="ocupacion">{{ $estudiante->ppff->ocupacion }}</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Dirección</label>
                                <p id="direccion">{{ $estudiante->ppff->direccion }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del estudiante</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="foto">Fotografía</label>

                                <div class="text-center">
                                    <img src="{{ url('storage/' . $estudiante->foto) }}" id="preview" style="max-width: 200px; margin-top: 10px;"
                                        alt="">
                                </div>
                                <script>
                                    const mostrarImagen = e =>
                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                </script>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="">Nombre del rol</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                        </div>
                                        <select name="rol" id="rol" class="form-control" disabled>
                                            <option value="">{{ $estudiante->usuario->roles->pluck('name')->implode(', ') }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="nombres">Nombres</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nombres" id="nombres"
                                            value="{{ old('nombres', $estudiante->nombres) }}" placeholder="Ingrese nombres..." disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="apellidos">Apellidos</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="apellidos" id="apellidos"
                                            value="{{ old('apellidos', $estudiante->apellidos) }}" placeholder="Ingrese apellidos..." disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="ci">Cédula de Identidad</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="ci" id="ci"
                                            value="{{ old('ci', $estudiante->ci) }}" placeholder="Ingrese CI..." disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="date" class="form-control" name="fecha_nacimiento"
                                            id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento) }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="telefono">Teléfono</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="telefono" id="telefono"
                                            value="{{ old('telefono', $estudiante->telefono) }}" placeholder="Ingrese teléfono..." disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="genero">Género</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                        </div>
                                        <select name="genero" id="genero" class="form-control" disabled>
                                            <option value="">{{ $estudiante->genero }}</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="email">Email</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ old('email', $estudiante->usuario->email) }}" placeholder="Ingrese profesión..." disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="direccion">Dirección</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="direccion" id="direccion"
                                            placeholder="Ingrese dirección..." value="{{ old('direccion', $estudiante->direccion) }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/estudiantes/') }}" class="btn btn-default"><i
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
@stop

@section('js')
@stop
