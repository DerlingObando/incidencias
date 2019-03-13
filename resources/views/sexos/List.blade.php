@extends('entidades.layout')

@section('content')
<div class="row mt40">
   <div class="col-md-10">
    <h3>Lista de Entidades</h3>
   </div>
   <div class="col-md-2">
    <a href="{{ route('entidades.create') }}" class="btn btn-danger">Agregar Entidad</a>
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
             <th>Entidad</th>
             <th>Created at</th>
             <td colspan="2">Acción</td>
          </tr>
       </thead>
       <tbody>
          @foreach($entidades as $entidad)
          <tr>
             <td>{{ $entidad->id }}</td>
             <td>{{ $entidad->entidad }}</td>

             <td>{{ date('d m Y', strtotime($entidad->created_at)) }}</td>
             <td><a href="{{ route('entidades.edit',$entidad->id)}}" class="btn btn-
                  primary">Editar</a></td>
                 <td>
                <form action="{{ route('entidades.destroy', $entidad->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
          </tr>
          @endforeach
       </tbody>
    </table>
    {!! $entidades->links() !!}
</div>
@endsection
</div>
