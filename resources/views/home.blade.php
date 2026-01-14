@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Bienvenido: </b>{{ Auth::user()->name }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fw fa-tasks"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Gestiones registradas</span>
                <span class="info-box-number">
                  {{ $total_gestiones }} gestiones
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-fw fa-calendar-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Periodos registrados</span>
                <span class="info-box-number">
                  {{ $total_periodos }} periodos
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-fw fa-layer-group"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Niveles registrados</span>
                <span class="info-box-number">
                  {{ $total_niveles }} niveles
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-fw fa-list-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Grados registrados</span>
                <span class="info-box-number">
                  {{ $total_grados }} grados
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-fw fa-clone"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Paralelos registrados</span>
                <span class="info-box-number">
                  {{ $total_paralelos }} paralelos
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-fw fa-clock"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Turnos registrados</span>
                <span class="info-box-number">
                  {{ $total_turnos }} turnos
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-fw fa-book"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Materias registradas</span>
                <span class="info-box-number">
                  {{ $total_materias }} materias
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-fw fa-user-check"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Roles registrados</span>
                <span class="info-box-number">
                  {{ $total_roles }} roles
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-fw fa-users-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Administrativos registrados</span>
                <span class="info-box-number">
                  {{ $total_personal_administrativo }} administrativos
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box"> 
              <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-fw fa-chalkboard-teacher"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Docentes registrados</span>
                <span class="info-box-number">
                  {{ $total_personal_docente }} docentes
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>
    </div>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop
