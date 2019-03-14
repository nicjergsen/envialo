@include('header')
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 ">
          <br>
            <a class="btn btn-lg btn-primary"  href="/sucursales/create">
                <span class="glyphicon glyphicon-plus"></span>Nuevo
            </a>
            <br>
            <br>
        @if (count($sectores) != 0)

        <table class="table table-hover">
            <tr>
              <th>Encomienda</th>
              <th>Sector</th>
              <th>Acciones</th>
            </tr>


            @foreach ($sectores as $sector)
            <tr>
{{--                 <td>{{ $sector->ubicacionbodega->encomienda->idEncomienda}}</td>
 --}}                <td>{{ $sector->nombre}}</td>
                <td><a href="#">Detalles</a> | <a href="#">Editar</a>
                </td>
            </tr>
            @endforeach
          </table>
          @else
          <div class="alert alert-info">
                <strong>Info!</strong> No hay sucursales registradas.
              </div>
          @endif
      </div>
      <a href="{{ url()->previous() }}">Volver al menú de Administracion</a>
    </div>
  </div>
  <br>
@include('footer')
