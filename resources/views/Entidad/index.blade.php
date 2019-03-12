@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Entidades</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('entidad.create') }}" class="btn btn-info" >Añadir Entidades</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Entidad</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($entidades->count())
              @foreach($Entidades as $entidad)
              <tr>
                <td>{{$entidad->entdiad}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('EntidadController@edit', $entidad->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('EntidadController@destroy', $entidad->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">

                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $entidades->links() }}
    </div>
  </div>
</section>

@endsection
