@include('header')
    @include('mensajes')
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/empleados">Empleados</a></li>
                <li class="breadcrumb-item active">{{ $empleado->usuario->persona->nombreUsu}} {{$empleado->usuario->persona->apellidoUsu}}</li>
            </ol>
            <h1>Eliminar empleado - {{ $empleado->usuario->persona->nombreUsu}} {{$empleado->usuario->persona->apellidoUsu}}</h1>
            <table class="table table-hover">
            <tr>
                <th>Rut</th>
                <td>{{ $empleado->rut}}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $empleado->usuario->persona->nombreUsu}}</td>
            </tr>
            <tr>
                <th>Apellido</th>
                <td>{{ $empleado->usuario->persona->apellidoUsu}}</td>
            </tr>
            <tr>
                <th>Nombre de usuario</th>
                <td>{{ $empleado->usuario->username}}</td>
            </tr>
            <tr>
                <th>Telefono</th>
                <td>{{ $empleado->usuario->persona->telefonoUsu}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $empleado->usuario->persona->emailUsu}}</td>
            </tr>
            <tr>
                <th>Direccion</th>
                <td>{{ $empleado->usuario->persona->direccionUsu}}</td>
            </tr>
            <tr>
                <th>Rol</th>
                <td>{{ $empleado->tipousuario->nombre}}</td>
            </tr>
            <tr>
                <th>Sucursal</th>
                <td>{{$empleado->sucursal->nombreSuc}}</td>
            </tr>
            <tr>
                <th>Estado de la cuenta</th>
                <td>@if ($empleado->isActive=="1") Activa @else Suspendida @endif</td>
            </tr>
        </table>


            <form method="POST" action="{{ url("empleados/{$empleado->rut}")}}"> {{ method_field('PUT') }} {{ csrf_field() }}
                <input type="hidden" class="form-control" id="rut" name="rut" value="{{old('rut', $empleado->rut)}}">
                <input type="hidden" class="form-control" id="isActive" name="isActive" value="0">
                <div><input type="submit" class="btn btn-warning" value="Suspender empleado">
                </div>
            </form>
            <a class="btn btn-lg btn-primary" href="{{url('empleados')}}">Volver al menú Empleados</a>
        </div>
    </div>
</div>
    @include('footer')
