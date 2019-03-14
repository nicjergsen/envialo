@include('header')
    @include('mensajes')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/empleados">Empleados</a></li>
                <li class="breadcrumb-item active">Listado de empleados</li>
            </ol>
            <h2>Empleados</h2>
            <br>
        </div>
        <div class="col-4 ">
            <a class="btn btn-lg btn-primary" href="/empleados/create">
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
                                            <option selected value="rut">RUT</option>
                                            <option value="idTipusu">Rol</option>
                                            <option value="idSuc">Sucursal</option>
                                          </select>
                        <input type="text" class="form-control" placeholder="Buscar..." name="valor" id="valor" minlength="4" autocomplete="off">
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
                <th>Rut</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Nombre de usuario</th>
                <th>Rol</th>
                <th>Sucursal del empleado</th>
                <th>Estado de la cuenta</th>
                <th>Acciones</th>
            </tr>


            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->rut}}</td>
                <td>{{ $empleado->usuario->persona->nombreUsu}}</td>
                <td>{{ $empleado->usuario->persona->apellidoUsu}}</td>
                <td>{{ $empleado->usuario->username }}</td>
                <td>{{ $empleado->tipousuario->nombre}}</td>
                <td>{{ $empleado->sucursal->nombreSuc }}</td>
                <td>@if ($empleado->isActive=="1") Activa @else Inactiva @endif
                </td>
                <td><a href="/empleados/{{$empleado->rut}}">Detalles</a> @if ($empleado->isActive=="1") | <a href="/empleados/edit/{{$empleado->rut}}">Editar</a>                    | <a href="/empleados/delete/{{$empleado->rut}}">Eliminar</a> @endif
                </td>
            </tr>
            @endforeach
        </table>
        {{ $empleados->links() }}
    </div>
</div>
</div>
<br>
    @include('footer')
