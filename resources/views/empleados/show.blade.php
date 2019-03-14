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
            <h1>{{ $empleado->usuario->persona->nombreUsu}} {{$empleado->usuario->persona->apellidoUsu}}</h1>
            <!--
            <p>Rut {{ $empleado->rut }}</p>
            <p>Nombre de usuario: {{ $empleado->usuario->username}}</p>
            <p>Telefono: {{ $empleado->usuario->persona->telefonoUsu }} </p>
            <p>Email: {{ $empleado->usuario->persona->emailUsu}}</p>
            <p>Direccion: {{ $empleado->usuario->persona->direccionUsu}} </p>
            <p>Rol: {{ $empleado->tipousuario->nombre}}</p>
            <p>Sucursal a cargo: {{ $empleado->sucursal->nombreSuc}} </p>
            <p>Estado de la cuenta: @if ($empleado->isActive=="1") Activa @else Suspendida @endif
            </p> -->
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
            <a class="btn btn-lg btn-primary" href="{{url('empleados')}}">Volver al menú Empleados</a>
        </div>
    </div>
</div>
    @include('footer')
