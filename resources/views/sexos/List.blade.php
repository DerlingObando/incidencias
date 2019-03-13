@extends('sexos.layout')

@section('content')
<div class="row mt40">
   <div class="col-md-10">
    <h3>Lista de Sexoes</h3>
   </div>
   <div class="col-md-2">
    <a href="{{ route('sexos.create') }}" class="btn btn-danger">Agregar Sexo</a>
   </div>
   <br><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Opps!</strong> Something went wrong<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
    <table class="table table-bordered" id="laravel_crud">
       <thead>
          <tr>
             <th>Id</th>
             <th>Sexo</th>
             <th>Created at</th>
             <td colspan="2">Acción</td>
          </tr>
       </thead>
       <tbody>
          @foreach($sexos as $sexo)
          <tr>
             <td>{{ $sexo->id }}</td>
             <td>{{ $sexo->sexo }}</td>

             <td>{{ date('d m Y', strtotime($sexo->created_at)) }}</td>
             <td><a href="{{ route('sexos.edit',$sexo->id)}}" class="btn btn-
                  primary">Editar</a></td>
                 <td>
                <form action="{{ route('sexos.destroy', $sexo->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
          </tr>
          @endforeach
       </tbody>
    </table>
    {!! $sexos->links() !!}
</div>
@endsection
</div>
