@include('header')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
    @include('mensajes')
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Sucursales</li>
            </ol>
            <h2>Listado de sucursales</h2>
            <br>
        </div>
        <div class="col-4 ">
            <a class="btn btn-lg btn-primary" href="/sucursales/create">
                <span class="glyphicon glyphicon-plus"></span>Nuevo
            </a>
        </div>
        <div class="col-6 ">
            <form class="navbar-form" role="search" method="GET">
                <div class="form-group">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <label class="input-group-text" for="campo">Filtrar por</label>
                        </div>
                        <select class="custom-select" id="campo" name="campo">
                                    <option selected value="nombreSuc">Nombre</option>
                                    <option value="idComuna">Comuna</option>
                                    <option value="emailContactoSuc">Email</option>
                                  </select>
                        <input type="text" class="form-control" placeholder="Buscar..." name="valor" id="valor"  minlength="4" autocomplete="off">
                        <div class="input-group-append">
                            <span class="input-group-text icon-magnifier" id="basic-addon2"></span>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br>
        <br>
        <table class="table table-hover">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Comuna</th>
                <th>Fono</th>
                <th>Direccion</th>
                <th>Apertura</th>
                <th>Cierre</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>


            @foreach ($sucursales as $sucursal)
            <tr>
                <td>{{ $sucursal->idSuc}}</td>
                <td>{{ $sucursal->nombreSuc}}</td>
                <td>{{ $sucursal->comuna->nombreComuna}}</td>
                <td>{{ $sucursal->telefonoSuc }}</td>
                <td>{{ $sucursal->direccionSuc}}</td>
                <td>{{ $sucursal->aperturaSuc}}</td>
                <td>{{ $sucursal->cierreSuc}}</td>
                <td>{{ $sucursal->emailContactoSuc}}</td>
                <td>@if ($sucursal->isActive=="1") Operativa @else Clausurada @endif
                </td>
                <td><a href="/sucursales/{{$sucursal->idSuc}}">Detalles</a> @if ($sucursal->isActive=="1") | <a href="/sucursales/edit/{{$sucursal->idSuc}}">Editar</a>                    | <a href="/sucursales/delete/{{$sucursal->idSuc}}">Eliminar</a> @endif
                </td>
            </tr>
            @endforeach
        </table>
        {{ $sucursales->links() }}
    </div>
    <a href="{{ url()->previous() }}">Volver atrás</a>
</div>
</div>
<br>
    @include('footer')
