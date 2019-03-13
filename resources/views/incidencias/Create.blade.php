@extends('incidencias.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h3>Agregando incidencia</h3>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Something went wrong<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('incidencias.store') }}" method="POST" name="incidencia">
    {{ csrf_field() }}

     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Título</strong>
                <input type="text" name="titulo" class="form-control" placeholder="Ingrese Incidencia">
            </div>
            <div class="form-group">
                <strong>Descripción</strong>
                <input type="text" name="descripcion" class="form-control" placeholder="Ingrese Descripción">
            </div>
        </div>
        <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>

</form>
@endsection
