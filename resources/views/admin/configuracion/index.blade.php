@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Datos del sistema</h1>
@stop

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Bienvenido a la sección de configuración del sistema.</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ url('/admin/configuracion/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="logo">Logo de la institución</label><b> (*)</b>
                            <div class="input-group">
                                <input type="file" name="logo" id="logo" onchange="mostrarImagen(event)"
                                    accept="image/*" required>
                                <br>
                                <div class="text-center">
                                    {{-- <img id="preview" style="max-width: 200px; margin-top: 10px;"> --}}
                                    @if (isset($configuracion) && $configuracion->logo)
                                        <img src="{{ asset('storage/' . $configuracion->logo) }}" id="preview"
                                            style="max-width: 200px; margin-top: 10px;" alt="Logo Actual">
                                    @else
                                        <img src="" id="preview" style="max-width: 200px; margin-top: 10px;"
                                            alt="">
                                    @endif
                                </div>
                                <script>
                                    const mostrarImagen = e =>
                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                </script>
                                @error('logo')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label><b> (*)</b>
                                    <div class="input-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-university"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nombre" id="nombre"
                                                value="{{ old('nombre', $configuracion->nombre ?? '') }}"
                                                placeholder="Escriba aquí..." required>
                                        </div>
                                        @error('nombre')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="descripcion">Descripción</label><b> (*)</b>
                                    <div class="input-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="descripcion" id="descripcion"
                                                value="{{ old('descripcion', $configuracion->descripcion ?? '') }}"
                                                placeholder="Escriba aquí..." required>
                                        </div>
                                        @error('descripcion')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="direccion">Dirección</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control"
                                            value="{{ old('direccion', $configuracion->direccion ?? '') }}" name="direccion"
                                            id="direccion" placeholder="Escriba aquí..." required>
                                    </div>
                                    @error('direccion')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="telefono">Teléfono</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control"
                                            value="{{ old('telefono', $configuracion->telefono ?? '') }}" name="telefono"
                                            id="telefono" placeholder="Escriba aquí..." required>
                                    </div>
                                </div>
                                @error('telefono')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="divisa">Divisa</label><b> (*)</b>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                        </div>
                                        <select name="divisa" id="divisa" class="form-control" required>
                                            <option value="">Seleccione una opción</option>
                                            @foreach ($divisas as $divisa)
                                                <option value="{{ $divisa['symbol'] }}"
                                                    {{ old('divisa', $configuracion->divisa ?? '') == $divisa['symbol'] ? 'selected' : '' }}>
                                                    {{ $divisa['name'] . ' (' . $divisa['symbol'] . ')' }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @error('divisa')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="correo_electronico">Correo Electrónico</label><b> (*)</b>
                                    <div class="input-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" name="correo_electronico"
                                                id="correo_electronico"
                                                value="{{ old('correo_electronico', $configuracion->correo_electronico ?? '') }}"
                                                placeholder="Escriba aquí..." required>
                                        </div>
                                        @error('correo_electronico')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="web">Sitio Web</label>
                                    <div class="input-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-globe"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="web" id="web"
                                                value="{{ old('web', $configuracion->web ?? '') }}"
                                                placeholder="Escriba aquí...">
                                        </div>
                                        @error('web')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="{{ url('/admin') }}" class="btn btn-default"><i class="fas fa-arrow-left"></i>
                                Cancelar</a>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
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
