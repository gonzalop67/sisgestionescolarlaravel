@extends('adminlte::page')

@section('content_header')
    <h1>Formación del personal {{ $personal->tipo }}</h1>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <a href="{{ url('/admin/personal/' . $personal->tipo) }}" class="btn btn-default"><i
                        class="fas fa-arrow-left"></i> Volver</a>
            </div>
        </div>
    </div>
@stop

@section('content')

    <div class="row">
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
                                            <option value="">
                                                {{ $personal->usuario->roles->pluck('name')->implode(', ') }}
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
                                            value="{{ old('nombres', $personal->nombres) }}"
                                            placeholder="Ingrese nombres..." disabled>
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
                                        <input type="date" class="form-control" name="fecha_nacimiento"
                                            id="fecha_nacimiento"
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
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-info card-outline">
                <div class="card-header">
                    <h3 class="card-title">Formaciones registrados</h3>
                    <div class="card-tools">
                        <a href="{{ url('/admin/personal/' . $personal->id . '/formaciones/create') }}"
                            class="btn btn-primary">Registrar nueva formación</a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-hover table-sm">
                        <thead>
                            <tr>
                                <th>Nro</th>
                                <th class="text-center">Título</th>
                                <th class="text-center">Institución</th>
                                <th class="text-center">Nivel</th>
                                <th class="text-center">Fecha de graduación</th>
                                <th class="text-center">Archivo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formaciones as $formacion)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $formacion->titulo }}</td>
                                    <td>{{ $formacion->institucion }}</td>
                                    <td>{{ $formacion->nivel }}</td>
                                    <td>{{ $formacion->fecha_graduacion }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('storage/' . $formacion->archivo) }}" target="_blank">Ver
                                            Archivo</a>
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="{{ url('/admin/personal/formaciones/' . $formacion->id) }}"
                                                class="btn btn-success btn-sm"><i class="fas fa-pencil-alt"></i>
                                                Editar</a>
                                            <form action="{{ route('admin.formaciones.destroy', $formacion->id) }}"
                                                method="post" id="miFormulario{{ $formacion->id }}"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="preguntar{{ $formacion->id }}(event)">
                                                    <i class="fas fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </div>

                                        <script>
                                            function preguntar{{ $formacion->id }}(event) {
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
                                                        document.getElementById('miFormulario{{ $formacion->id }}').submit();
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
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        /* Fondo transparente y sin borde en el contenedor */
        #exampl1_wrapper .dt-buttons {
            background-color: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center;
            /* Centrar los botones */
            gap: 10px;
            /* Espaciado entre botones */
            margin-bottom: 15px;
            /* Separar botones de la tabla */
        }

        /* Estilo personalizado para los botones */
        #exampl1_wrapper .btn {
            color: #fff;
            /* Color del texto en blanco */
            border-radius: 4px;
            /* Bordes redondeados */
            padding: 5px 15px;
            /* Espaciado interno */
            font-size: 14px;
            /* Tamaño de fuente */
        }

        /* Colores por tipo de botón */
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-info {
            background-color: #17a2b8;
            border: none;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
            border: none;
        }

        .btn-default {
            background-color: #6e7176;
            color: #212529;
            border: none;
        }
    </style>
@stop

@section('js')
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Formaciones",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Personal",
                    "infoFiltered": "(Filtrado de _MAX_ total Formaciones)",
                    "lengthMenu": "Mostrar _MENU_ Formaciones",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscador",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                buttons: [{
                        text: '<i class="fas fa-copy"></i> COPIAR',
                        extend: 'copy',
                        className: 'btn btn-default'
                    },
                    {
                        text: '<i class="fas fa-file-pdf"></i> PDF',
                        extend: 'pdf',
                        className: 'btn btn-danger'
                    },
                    {
                        text: '<i class="fas fa-file-csv"></i> CSV',
                        extend: 'csv',
                        className: 'btn btn-info'
                    },
                    {
                        text: '<i class="fas fa-file-excel"></i> EXCEL',
                        extend: 'excel',
                        className: 'btn btn-success'
                    },
                    {
                        text: '<i class="fas fa-print"></i> IMPRIMIR',
                        extend: 'print',
                        className: 'btn btn-warning'
                    },
                ]
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });
    </script>
@stop
