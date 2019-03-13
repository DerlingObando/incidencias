@extends('modulos.layout')

@section('content')
<div class="row mt40">
   <div class="col-md-10">
    <h3>Lista de Modulo</h3>
   </div>
   <div class="col-md-2">
    <a href="{{ route('modulos.create') }}" class="btn btn-danger">Agregar Modulo</a>
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
             <th>Modulo</th>
             <th>Created at</th>
             <td colspan="2">Acción</td>
          </tr>
       </thead>
       <tbody>
          @foreach($modulos as $modulo)
          <tr>
             <td>{{ $modulo->id }}</td>
             <td>{{ $modulo->modulo }}</td>

             <td>{{ date('d m Y', strtotime($modulo->created_at)) }}</td>
             <td><a href="{{ route('modulos.edit',$modulo->id)}}" class="btn btn-
                  primary">Editar</a></td>
                 <td>
                <form action="{{ route('modulos.destroy', $modulo->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
          </tr>
          @endforeach
       </tbody>
    </table>
    {!! $modulos->links() !!}
</div>
@endsection
</div>
