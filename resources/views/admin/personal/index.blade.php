@extends('adminlte::page')

@section('content_header')
    <h1><b>Listado del personal {{ $tipo }}</b></h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Personal {{ $tipo }} registrado</h3>

                    <div class="card-tools">
                        <a href="{{ url('/admin/personal/create/' . $tipo) }}" class="btn btn-primary">Crear nuevo personal</a>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example" class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nro</th>

                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personals as $personal)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ url('/admin/personal/' . $personal->id) . '/edit' }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i> Editar</a>
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="preguntar{{ $personal->id }}(event)">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </div>
                                        <form action="{{ url('/admin/personal/' . $personal->id) }}" method="post"
                                            id="miFormulario{{ $personal->id }}" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        <script>
                                            function preguntar{{ $personal->id }}(event) {
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
                                                        document.getElementById('miFormulario{{ $personal->id }}').submit();
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
