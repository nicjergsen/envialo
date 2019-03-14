@include('header')
    @include('mensajes')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/empleados">Empleados</a></li>
                <li class="breadcrumb-item active">Nuevo empleado</li>
            </ol>
            <h2>Nuevo empleado</h2>
        </div>
        <div class="col-lg-6">
            <form method="POST" action="{{ url('/empleados')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="rut">Rut</label>
                    <input type="text" class="form-control" id="rut" name="rut" value="{{ old('rut') }}" onfocusout="verifyClient()">
                </div>

                <div class="form-group">
                    <label for="nombreUsu">Nombre</label>
                    <input type="text" class="form-control" id="nombreUsu" name="nombreUsu" value="{{ old('nombreUsu') }}">
                </div>

                <div class="form-group">
                    <label for="apellidoUsu">Apellido</label>
                    <input type="text" class="form-control" id="apellidoUsu" name="apellidoUsu" value="{{ old('apellidoUsu') }}">
                </div>

                <div class="form-group">
                    <label for="telefonoUsu">Telefono</label>
                    <input type="text" class="form-control" id="telefonoUsu" name="telefonoUsu" value="{{ old('telefonoUsu') }}">
                </div>

                <div class="form-group">
                    <label for="emailUsu">Email</label>
                    <input type="email" class="form-control" id="emailUsu" name="emailUsu" value="{{ old('emailUsu') }}">
                </div>

                <div class="form-group">
                    <label for="direccionUsu">Direccion</label>
                    <input type="text" class="form-control" id="direccionUsu" name="direccionUsu" value="{{ old('direccionUsu') }}">
                </div>

                <div class="form-group">
                    <label for="username">Nombre de usuario</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
                </div>

                <div class="form-group">
                    <label for="pass">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="pass">
                </div>

                <div class="form-group">
                    <label for="idTipusu">Rol</label>
                    <select name="idTipusu" id="idTipusu" class="form-control">
                    @foreach ($roles as $rol)
                        <option value="{{$rol->idTipusu}}">{{$rol->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="idSuc">Sucursal</label>
                    <select name="idSuc" id="idSuc" class="form-control">
                        @foreach ($sucursales as $sucursal)
                        <option value="{{$sucursal->idSuc}}">{{$sucursal->nombreSuc}}</option>
                        @endforeach
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
<script>
    function verifyClient(){
            var rutSearch = $("#rut").val();
                $.ajax({
                    "type": "GET",
                    "url": "http://courier.test/personas/buscar/" + rutSearch,
                    "data": { funcion:rutSearch }
                }).fail(function() {
        /*             if ($('#ocupado').is(':hidden'))
                        $('#ocupado').show();
                    else
                        $('#ocupado').hide(); */
                    $("#nombreUsu").val("");
                    $("#apellidoUsu").val("");
                    $("#telefonoUsu").val("");
                    $("#emailUsu").val("");
                    $("#direccionUsu").val("");
                }).done(function(data){
                    if (data === ""){
                        $("#nombreUsu").val("");
                        $("#apellidoUsu").val("");
                        $("#telefonoUsu").val("");
                        $("#emailUsu").val("");
                        $("#direccionUsu").val("");
                    }else{
                    var persona = JSON.parse(data);
                    console.log(persona);
                    $("#rut").val(persona["rut"]);
                    $("#nombreUsu").val(persona["nombreUsu"]);
                    $("#apellidoUsu").val(persona["apellidoUsu"]);
                    $("#telefonoUsu").val(persona["telefonoUsu"]);
                    $("#emailUsu").val(persona["emailUsu"]);
                    $("#direccionUsu").val(persona["direccionUsu"]);
                    
                    $('#telefonoUsu').attr("readonly", "");
                    $('#apellidoUsu').attr("readonly", "");
                    $('#nombreUsu').attr("readonly", "");
                    $('#emailUsu').attr("readonly", "");
                    $('#direccionUsu').attr("readonly", "");
                    }
                    $.ajax({
                    "type": "GET",
                    "url": "http://courier.test/usuarios/buscar/" + rutSearch,
                    "data": { funcion:rutSearch }
                    }).done(function(data2){
                        var usuario = JSON.parse(data2);
                        $("#username").val(usuario["username"]);
                        $("#pass").val(usuario["pass"]);
                        $("#username").attr("readonly", "");
                        $("#pass").attr("readonly", "");
                    });
                });
        }
</script>
