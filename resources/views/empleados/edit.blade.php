@include('header')
    @include('mensajes')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/empleados">Empleados</a></li>
                <li class="breadcrumb-item active">{{ $empleado->usuario->persona->nombreUsu}} {{$empleado->usuario->persona->apellidoUsu}}</li>
            </ol>
            <h1>Editar empleado - {{ $empleado->usuario->persona->nombreUsu}} {{$empleado->usuario->persona->apellidoUsu}}</h1>
        </div>
        <div class="col-lg-6">
            <form method="POST" action="{{ url("empleados/{$empleado->rut}")}}"> {{ method_field('PUT') }} {{ csrf_field() }}
                <div class="form-group">
                    <label for="rut">Rut</label>
                    <input type="text" class="form-control" id="rut" name="rut" value="{{old('rut', $empleado->rut)}} " readonly>
                </div>

                <div class="form-group">
                    <label for="nombreUsu">Nombre</label>
                    <input type="text" class="form-control" id="nombreUsu" name="nombreUsu" value="{{old('nombreUsu', $empleado->usuario->persona->nombreUsu)}}">
                </div>

                <div class="form-group">
                    <label for="apellidoUsu">Apellido</label>
                    <input type="text" class="form-control" id="apellidoUsu" name="apellidoUsu" value="{{old('apellidoUsu', $empleado->usuario->persona->apellidoUsu)}}">
                </div>

                <div class="form-group">
                    <label for="telefonoUsu">Telefono</label>
                    <input type="text" class="form-control" id="telefonoUsu" name="telefonoUsu" value="{{old('telefonoUsu', $empleado->usuario->persona->telefonoUsu)}}">
                </div>

                <div class="form-group">
                    <label for="emailUsu">Email</label>
                    <input type="email" class="form-control" id="emailUsu" name="emailUsu" value="{{old('emailUsu', $empleado->usuario->persona->emailUsu)}}">
                </div>

                <div class="form-group">
                    <label for="direccionUsu">Direccion</label>
                    <input type="text" class="form-control" id="direccionUsu" name="direccionUsu" value="{{old('direccionUsu', $empleado->usuario->persona->direccionUsu)}}">
                </div>

                <div class="form-group">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{old('username', $empleado->usuario->username)}}">
                </div>

                <div class="form-group">
                    <label for="pass">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="pass" value="{{old('pass', $empleado->usuario->pass)}}">
                </div>

                <div class="form-group">
                    <label for="idTipusu">Rol</label>
                    <select name="idTipusu" id="idTipusu" class="form-control">
                    @foreach ($roles as $rol)
                        <option value="{{$rol->idTipusu}}">{{$rol->nombre}}</option>
                        @endforeach
                        <option value="{{$rol->idTipusu}}" selected>{{$empleado->tipousuario->nombre}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="idSuc">Sucursal</label>
                    <select name="idSuc" id="idSuc" class="form-control">
                        @foreach ($sucursales as $sucursal)
                        <option value="{{$sucursal->idSuc}}">{{$sucursal->nombreSuc}}</option>
                        @endforeach
                        <option value="{{$sucursal->idSuc}}" selected>{{$empleado->sucursal->nombreSuc}}</option>
                    </select>
                </div>


                <div><input type="submit" value="Enviar">
                </div>
            </form>
            <a class="btn btn-lg btn-primary" href="{{url('empleados')}}">Volver al menú Empleados</a>
        </div>
    </div>
</div>
    @include('footer')
