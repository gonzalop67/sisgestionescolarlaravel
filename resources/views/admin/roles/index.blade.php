@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado de roles</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Roles registrados</h3>

                    <div class="card-tools">
                        <a href="{{ url('/admin/roles/create') }}" class="btn btn-primary">Crear nuevo rol</a>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th>Nombre del Rol</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ url('/admin/roles/' . $role->id) . '/edit' }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> Editar</a>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="preguntar{{ $role->id }}(event)">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </div>
                                        <form action="{{ url('/admin/roles/' . $role->id) }}" method="post"
                                            id="miFormulario{{ $role->id }}" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <script>
                                            function preguntar{{ $role->id }}(event) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: '¿Desea eliminar este registro?',
                                                    text: '',
                                                    icon: 'question',
                                                    showDenyButton: true,
                                                    confirmButtonText: 'Eliminar',
                                                    confirmButtonColor: '#a5161d',
                                                    denyButtonColor: '#270a0a',
                                                    denyButtonText: 'Cancelar',
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        document.getElementById('miFormulario{{ $role->id }}').submit();
                                                    }
                                                });
                                            }
                                        </script>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    
@stop
