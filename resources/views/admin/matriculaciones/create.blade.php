@extends('adminlte::page')

@section('content_header')
    <h1>Matriculaciones/Registro de una nueva matriculación del estudiante</h1>
    <hr>
@stop

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del estudiante</h3>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nombre">Buscar estudiante:</label><b> (*)</b>
                                <div class="input-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-users"></i></span>
                                        </div>
                                        <select name="" id="buscar_estudiante" class="form-control d-inline select2">
                                            <option value="">Selecciona un estudiante...</option>
                                            @foreach ($estudiantes as $estudiante)
                                                <option value="{{ $estudiante->id }}">
                                                    {{ $estudiante->apellidos . ' ' . $estudiante->nombres . ' - ' . $estudiante->ci }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('nombre')
                                        <small style="color: red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="datos_estudiante">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Fotografía</label>
                                            <div class="text-center">
                                                <img src="" id="foto" width="150px" alt="foto">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Apellidos</label>
                                        <p id="apellidos">a</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Nombres</label>
                                        <p id="nombres">a</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Carnet de Identidad</label>
                                        <p id="ci">a</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Fecha de nacimiento</label>
                                        <p id="fecha_nacimiento">a</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Teléfono</label>
                                        <p id="telefono">a</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Dirección</label>
                                        <p id="direccion">a</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Correo electrónico</label>
                                        <p id="email">a</p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="">Género</label>
                                        <p id="genero">a</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Historial académico</h3>
                        </div>
                        <div class="card-body">
                            <div id="tabla_historial"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos del formulario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/admin/matriculaciones/create') }}" method="POST">
                        @csrf
                        <input type="text" name="estudiante_id" id="estudiante_id" hidden>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Turnos</label><b> (*)</b>
                                    <div class="input-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                            </div>
                                            <select name="turno_id" id="" class="form-control">
                                                <option value="">Seleccione un turno...</option>
                                                @foreach ($turnos as $turno)
                                                    <option value="{{ $turno->id }}">{{ $turno->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('turno_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Gestiones</label><b> (*)</b>
                                    <div class="input-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-university"></i></span>
                                            </div>
                                            <select name="gestion_id" id="" class="form-control">
                                                <option value="">Seleccione una gestión...</option>
                                                @foreach ($gestiones as $gestion)
                                                    <option value="{{ $gestion->id }}">{{ $gestion->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('gestion_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Niveles</label><b> (*)</b>
                                    <div class="input-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-layer-group"></i></span>
                                            </div>
                                            <select name="gestion_id" id="" class="form-control">
                                                <option value="">Seleccione un nivel...</option>
                                                @foreach ($niveles as $nivel)
                                                    <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('nivel_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Grados</label><b> (*)</b>
                                    <div class="input-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                            </div>
                                            <select name="grado_id" id="" class="form-control">
                                                <option value="">Seleccione un grado...</option>
                                                @foreach ($grados as $grado)
                                                    <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('grado_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Paralelos</label><b> (*)</b>
                                    <div class="input-group">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-clone"></i></span>
                                            </div>
                                            <select name="paralelo_id" id="" class="form-control">
                                                <option value="">Seleccione un paralelo...</option>
                                                @foreach ($paralelos as $paralelo)
                                                    <option value="{{ $paralelo->id }}">{{ $paralelo->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('paralelo_id')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
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
        .select2-container .select2-selection--single {
            height: 40px !important;
        }
    </style>
@stop

@section('js')
    <script>
        $('.select2').select2();

        $("#datos_estudiante").hide();

        $('#buscar_estudiante').on('change', function() {
            var id = $(this).val();

            if (id) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/admin/matriculaciones/buscar_estudiante') }}" + "/" + id,
                    success: function(estudiante) {
                        $("#apellidos").html(estudiante.apellidos);
                        $("#nombres").html(estudiante.nombres);
                        $("#nombres").html(estudiante.nombres);
                        $("#ci").html(estudiante.ci);
                        $("#ci").html(estudiante.ci);
                        $("#fecha_nacimiento").html(estudiante.fecha_nacimiento);
                        $("#fecha_nacimiento").html(estudiante.fecha_nacimiento);
                        $("#telefono").html(estudiante.telefono);
                        $("#telefono").html(estudiante.telefono);
                        $("#direccion").html(estudiante.direccion);
                        $("#direccion").html(estudiante.direccion);
                        $("#email").html(estudiante.usuario.email);
                        $("#genero").html(estudiante.genero);
                        $("#foto").attr("src", estudiante.foto_url).show();
                        $("#estudiante_id").val(estudiante.id);
                        $("#datos_estudiante").show();

                        if (estudiante.matriculaciones && estudiante.matriculaciones.length > 0) {
                            var tabla = '<table class="table table-bordered">';
                            tabla +=
                                '<thead><tr><th>Turno</th><th>Gestión</th><th>Nivel</th><th>Grado</th><th>Paralelo</th></tr></thead>';
                            tabla += '<tbody>';
                            estudiante.matriculaciones.forEach(matriculacion => {
                                tabla += '<tr>';
                                tabla += '<td>' + matriculacion.turno.nombre + '</td>';
                                tabla += '<td>' + matriculacion.gestion.nombre + '</td>';
                                tabla += '<td>' + matriculacion.nivel.nombre + '</td>';
                                tabla += '<td>' + matriculacion.grado.nombre + '</td>';
                                tabla += '<td>' + matriculacion.paralelo.nombre + '</td>';
                                tabla += '</tr>';
                            });
                            tabla += '</tbody>';
                            tabla += '</table>';

                            $("#tabla_historial").html(tabla).show();
                        } else {
                            $("#tabla_historial").html(
                                "<p>No hay historial académico registrado del estudiante.</p>");
                        }
                    },
                    error: function() {
                        alert('No se puede obtener información del estudiante')
                    }
                });
            } else {
                //
            }
        });
    </script>
@stop
