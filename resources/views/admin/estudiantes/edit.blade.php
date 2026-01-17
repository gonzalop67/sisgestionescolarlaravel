@extends('adminlte::page')

@section('content_header')
    <h1>Editar datos del estudiante</h1>
    <hr>
@stop

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Datos del padre de familia</h3>
                    <div class="card-tools">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalSearch"><i
                                class="fas fa-search"></i> Buscar padre de familia</button>
                        <!-- Modal -->
                        <div class="modal fade" id="modalSearch" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Padres de familia</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table id="example1"
                                            class="table table-bordered table-striped table-hover table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Nro</th>
                                                    <th class="text-center">Apellidos y Nombres</th>
                                                    <th class="text-center">Cédula de Identidad</th>
                                                    <th class="text-center">Fecha de nacimiento</th>
                                                    <th class="text-center">Teléfono</th>
                                                    <th class="text-center">Parentesco</th>
                                                    <th class="text-center">Ocupación</th>
                                                    <th class="text-center">Dirección</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ppffs as $ppff)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $ppff->apellidos }} {{ $ppff->nombres }}</td>
                                                        <td>{{ $ppff->ci }}</td>
                                                        <td>{{ $ppff->fecha_nacimiento }}</td>
                                                        <td>{{ $ppff->telefono }}</td>
                                                        <td>{{ $ppff->parentesco }}</td>
                                                        <td>{{ $ppff->ocupacion }}</td>
                                                        <td>{{ $ppff->direccion }}</td>
                                                        <td>
                                                            <button class="btn btn-info btn-seleccionar"
                                                                data-id={{ $ppff->id }}>Seleccionar</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cerrar</button>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#ModalUpdatePpff">Crear nuevo ppff</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="ModalUpdatePpff" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #1727b8; color: #fff;">
                                        <h5 class="modal-title" id="exampleModalLabel">Registro de un nuevo PPFF</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('/admin/estudiantes/ppff/create') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nombres</label>
                                                        <input type="text" class="form-control" name="nombres" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Apellidos</label>
                                                        <input type="text" class="form-control" name="apellidos"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Carnet de identidad</label>
                                                        <input type="text" class="form-control" name="ci" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Fecha de nacimiento</label>
                                                        <input type="date" class="form-control" name="fecha_nacimiento"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Teléfono</label>
                                                        <input type="text" class="form-control" name="telefono" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Parentesco</label>
                                                        <input type="text" class="form-control" name="parentesco"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Ocupación</label>
                                                        <input type="text" class="form-control" name="ocupacion"
                                                            required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Dirección</label>
                                                        <input type="text" class="form-control" name="direccion"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos del estudiante en el formulario</h3>
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
                    <form action="{{ url('/admin/estudiantes/' . $estudiante->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="text" name="ppff_id" id="ppff_id" value="{{ $estudiante->ppff->id }}" hidden>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="foto">Fotografía</label><b> (*)</b>

                                    <input type="file" class="form-control" name="foto" id="foto"
                                        onchange="mostrarImagen(event)" accept="image/*">

                                    <div class="text-center">
                                        <img src="{{ url('storage/' . $estudiante->foto) }}" id="preview"
                                            style="max-width: 200px; margin-top: 10px;" alt="">
                                    </div>
                                    <script>
                                        const mostrarImagen = e =>
                                            document.getElementById('preview').src = URL.createObjectURL(e.target.files[0]);
                                    </script>
                                    @error('foto')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Nombre del rol</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-check"></i></span>
                                            </div>
                                            <select name="rol" id="rol" class="form-control">
                                                <option value="">Seleccione un rol...</option>
                                                @foreach ($roles as $rol)
                                                    @if ($rol->name == 'ESTUDIANTE')
                                                        <option value="{{ $rol->name }}"
                                                            {{ $rol->name == 'ESTUDIANTE' ? 'selected' : '' }}>
                                                            {{ $rol->name }}</option>
                                                    @endif
                                                @endforeach
                                                <option value="">No existe el rol estudiante</option>
                                            </select>
                                        </div>
                                        @error('rol')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="nombres">Nombres</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="nombres" id="nombres"
                                                value="{{ old('nombres', $estudiante->nombres) }}" placeholder="Ingrese nombres..." required>
                                        </div>
                                        @error('nombres')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="apellidos">Apellidos</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user-friends"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="apellidos" id="apellidos"
                                                value="{{ old('apellidos', $estudiante->apellidos) }}" placeholder="Ingrese apellidos..."
                                                required>
                                        </div>
                                        @error('apellidos')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="ci">Cédula de Identidad</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="ci" id="ci"
                                                value="{{ old('ci', $estudiante->ci) }}" placeholder="Ingrese CI..." required>
                                        </div>
                                        @error('ci')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="fecha_nacimiento">Fecha de Nacimiento</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                                            </div>
                                            <input type="date" class="form-control" name="fecha_nacimiento"
                                                id="fecha_nacimiento" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento) }}" required>
                                        </div>
                                        @error('fecha_nacimiento')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="telefono">Teléfono</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="telefono" id="telefono"
                                                value="{{ old('telefono', $estudiante->telefono) }}" placeholder="Ingrese teléfono..." required>
                                        </div>
                                        @error('telefono')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="genero">Género</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-users"></i></span>
                                            </div>
                                            <select name="genero" id="genero" class="form-control">
                                                <option value="masculino" {{ $estudiante->genero == "masculino" ? 'selected' : '' }}>Masculino</option>
                                                <option value="femenino" {{ $estudiante->genero == "femenino" ? 'selected' : '' }}>Femenino</option>
                                            </select>
                                        </div>
                                        @error('genero')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <label for="email">Email</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                            </div>
                                            <input type="email" class="form-control" name="email" id="email"
                                                value="{{ old('email', $estudiante->usuario->email) }}" placeholder="Ingrese profesión..." required>
                                        </div>
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="direccion">Dirección</label><b> (*)</b>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                        class="fas fa-map-marker-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" name="direccion" id="direccion"
                                                placeholder="Ingrese dirección..." value="{{ old('direccion', $estudiante->direccion) }}"
                                                required>
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
                                    <a href="{{ url('/admin/estudiantes/') }}" class="btn btn-default"><i
                                            class="fas fa-arrow-left"></i>
                                        Cancelar</a>
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>
                                        Guardar</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
            $(".btn-seleccionar").click(function() {
                let id = $(this).data('id');

                $.ajax({
                    url: "{{ route('admin.estudiantes.obtenerPPFF') }}", // Ruta definida en web.php
                    type: "POST",
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Token CSRF
                    },
                    success: function(response) {
                        $("#nombres").html(response.data.nombres);
                        $("#apellidos").html(response.data.apellidos);
                        $("#ci").html(response.data.ci);
                        $("#fecha_nacimiento").html(response.data.fecha_nacimiento);
                        $("#telefono").html(response.data.telefono);
                        $("#parentesco").html(response.data.parentesco);
                        $("#ocupacion").html(response.data.ocupacion);
                        $("#direccion").html(response.data.direccion);
                        $("#ppff_id").val(response.data.id);
                    },
                    error: function(xhr) {
                        alert("Error: " + xhr.status + " " + xhr.statusText);
                    }
                });

                $("#modalSearch").modal("hide");
                
            });

            $("#example1").DataTable({
                "pageLength": 5,
                "language": {
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Ppffs",
                    "infoEmpty": "Mostrando 0 a 0 de 0 Personal",
                    "infoFiltered": "(Filtrado de _MAX_ total Ppffs)",
                    "lengthMenu": "Mostrar _MENU_ Ppffs",
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
            }).buttons().container().appendTo('#example1_wrapper .row:eq(0)');
        });
    </script>
@stop
