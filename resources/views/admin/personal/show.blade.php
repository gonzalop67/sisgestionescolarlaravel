@extends('adminlte::page')

@section('content_header')
    <h1>Datos del personal {{ $personal->tipo }}</h1>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Datos registrados</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="foto">Fotografía</label>
                            <div class="text-center">
                                <img src="{{ url('storage/' . $personal->foto) }}" id="preview"
                                    class="img-fluid img-thumbnail" style="max-width: 200px; margin-top: 10px;"
                                    alt="Imagen de perfil">
                            </div>
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
                                    <select name="rol" id="" class="form-control" disabled>
                                        <option value="">{{ $personal->usuario->roles->pluck('name')->implode(', ') }}
                                        </option>
                                    </select>
                                </div>
                                @error('rol')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="nombres">Nombres</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="nombres" id="nombres"
                                        value="{{ old('nombres', $personal->nombres) }}" placeholder="Ingrese nombres..."
                                        disabled>
                                </div>
                                @error('nombres')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="apellidos">Apellidos</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="apellidos" id="apellidos"
                                        value="{{ old('apellidos', $personal->apellidos) }}"
                                        placeholder="Ingrese apellidos..." disabled>
                                </div>
                                @error('apellidos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="ci">Cédula de Identidad</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="ci" id="ci"
                                        value="{{ old('ci', $personal->ci) }}" placeholder="Ingrese CI..." disabled>
                                </div>
                                @error('ci')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                    </div>
                                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento"
                                        value="{{ old('fecha_nacimiento', $personal->fecha_nacimiento) }}" disabled>
                                </div>
                                @error('fecha_nacimiento')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="telefono">Teléfono</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="telefono" id="telefono"
                                        value="{{ old('telefono', $personal->telefono) }}"
                                        placeholder="Ingrese teléfono..." disabled>
                                </div>
                                @error('telefono')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="profesion">Profesión</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="profesion" id="profesion"
                                        value="{{ old('profesion', $personal->profesion) }}"
                                        placeholder="Ingrese profesión..." disabled>
                                </div>
                                @error('profesion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="email">Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="email"
                                        value="{{ old('email', $personal->usuario->email) }}"
                                        placeholder="Ingrese profesión..." disabled>
                                </div>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
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
                                        placeholder="Ingrese dirección..."
                                        value="{{ old('direccion', $personal->direccion) }}" disabled>
                                </div>
                                @error('direccion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('/admin/personal/' . $personal->tipo) }}" class="btn btn-default"><i
                                    class="fas fa-arrow-left"></i> Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
