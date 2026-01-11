@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1><b>Bienvenido: </b>{{ Auth::user()->name }}</h1>
@stop

@section('content')
    <div class="row">

        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
        </div>
    </div>
@endsection