@include('header')
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 ">
          <br>
            <a class="btn btn-lg btn-primary"  href="/roles/create">
                <span class="glyphicon glyphicon-plus"></span>Nuevo
            </a>
            <br>
            <br>
        @if (count($roles) != 0)

        <table class="table table-hover">
            <tr>
              <th>Rol</th>
              <th>Descripcion</th>
              <th>Acciones</th>
            </tr>


            @foreach ($roles as $rol)
            <tr>
                <td>{{ $rol->nombre}}</td>
                <td>{{ $rol->descripcion}}</td>
                <td><a href="/roles/{{$rol->idTipusu}}">Detalles</a> | <a href="/roles/edit/{{$rol->idTipusu}}">Editar</a>
                </td>
            </tr>
            @endforeach
          </table>
          @else
          <div class="alert alert-info">
                <strong>Info!</strong> No hay roles creados.
              </div>
          @endif
      </div>
    </div>
  </div>
  <br>
@include('footer')
