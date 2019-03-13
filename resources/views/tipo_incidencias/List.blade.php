@extends('tipo_incidencias.layout')

@section('content')
<div class="row mt40">
   <div class="col-md-10">
    <h3>Lista de TipoIncidenciaes</h3>
   </div>
   <div class="col-md-2">
    <a href="{{ route('tipo_incidencias.create') }}" class="btn btn-danger">Agregar TipoIncidencia</a>
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
             <th>TipoIncidencia</th>
             <th>Created at</th>
             <td colspan="2">Acción</td>
          </tr>
       </thead>
       <tbody>
          @foreach($tipo_incidencias as $tipo)
          <tr>
             <td>{{ $tipo->id }}</td>
             <td>{{ $tipo->tipo }}</td>

             <td>{{ date('d m Y', strtotime($tipo->created_at)) }}</td>
             <td><a href="{{ route('tipo_incidencias.edit',$tipo->id)}}" class="btn btn-
                  primary">Editar</a></td>
                 <td>
                <form action="{{ route('tipo_incidencias.destroy', $tipo->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            </td>
          </tr>
          <button type="button" class="btn btn-default">Normal</button>
          @endforeach
       </tbody>
    </table>
    {!! $tipo_incidencias->links() !!}
</div>
@endsection
</div>
