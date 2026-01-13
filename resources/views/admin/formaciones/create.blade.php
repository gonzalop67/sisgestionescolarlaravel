@extends('adminlte::page')

@section('content_header')
    <h1>Creación de una nueva formación del personal</h1>
    <hr>
@stop

@section('content')
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos del formulario</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/personal/' . $id . '/formaciones/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="personal_id" value="{{ $id }}">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="archivo">Archivo</label><b> (*)</b>

                                <input type="file" class="form-control" name="archivo" id="archivo"
                                    onchange="mostrarImagen(event)" accept="image/*" required>

                                <div class="text-center">
                                    <img src="" id="preview" style="max-width: 200px; margin-top: 10px;"
                                        alt="">
                                </div>
                                <script>
                                    const mostrarImagen = e =>
                                        document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                </script>
                                @error('archivo')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="titulo">Titulo</label><b> (*)</b>
                                        <div class="input-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-certificate"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="titulo" id="titulo"
                                                    value="{{ old('titulo') }}" placeholder="Escriba aquí..." required>
                                            </div>
                                            @error('titulo')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="institucion">Institución</label><b> (*)</b>
                                        <div class="input-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-university"></i></span>
                                                </div>
                                                <input type="text" class="form-control" name="institucion"
                                                    id="institucion" value="{{ old('institucion') }}"
                                                    placeholder="Escriba aquí..." required>
                                            </div>
                                            @error('institucion')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nivel">Nivel</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                            </div>
                                            <select name="nivel" id="nivel" class="form-control" required>
                                                <option value="" disabled selected>Seleccione el nivel...</option>
                                                <option value="Técnico" {{ old('nivel') == 'Técnico' ? 'selected' : '' }}>
                                                    Técnico</option>
                                                <option value="Licenciatura"
                                                    {{ old('nivel') == 'Licenciatura' ? 'selected' : '' }}>Licenciatura
                                                </option>
                                                <option value="Maestría" {{ old('nivel') == 'Maestría' ? 'selected' : '' }}>
                                                    Maestría</option>
                                                <option value="Doctorado"
                                                    {{ old('nivel') == 'Doctorado' ? 'selected' : '' }}>Doctorado</option>
                                            </select>
                                            @error('nivel')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_graduacion">Fecha de graduación</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                            </div>
                                            <input type="date" name="fecha_graduacion" id="fecha_graduacion"
                                                class="form-control" value="{{ old('fecha_graduacion') }}" required>
                                        </div>
                                        @error('fecha_graduacion')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ URL::previous() }}" class="btn btn-default"><i class="fas fa-arrow-left"></i>
                                    Cancelar</a>
                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
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
