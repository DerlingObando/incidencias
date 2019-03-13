@extends('cargos.layout')

@section('content')

<div class="row">
    <div class="col-lg-12 mt40">
        <div class="pull-left">
            <h3>Actualizar cargo</h3>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opps!</strong> Something went wrong<br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('cargos.update', $cargo->id) }}" method="POST" name="cargo">
    {{ csrf_field() }}
    @method('PATCH')

     <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <strong>Cargo</strong>
                <input type="text" name="cargo" class="form-control" placeholder="Ingrese la cargo" value="{{ $cargo->cargo}}">
            </div>
        </div>

        <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </div>

</form>
@endsection
