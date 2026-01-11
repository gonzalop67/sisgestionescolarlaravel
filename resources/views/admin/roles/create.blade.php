@extends('adminlte::page')

@section('content_header')
    <h1>Creación de un nuevo rol</h1>
    <hr>
@stop

@section('content')
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Llene los datos del formulario</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('/admin/roles/create') }}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Nombre del rol</label><b> (*)</b>
                            <div class="input-group">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ old('name') }}" placeholder="Escriba aquí..." required>
                                </div>
                                @error('name')
                                    <small style="color: red">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <a href="{{ url('/admin/roles') }}" class="btn btn-default"><i class="fas fa-arrow-left"></i>
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
