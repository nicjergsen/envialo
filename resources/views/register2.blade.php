@include('header')
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-img-left d-none d-md-flex">
                    <!-- Background image for card set in CSS! -->
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Registrarse</h5>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="form-signin" method="POST">
                        {{ csrf_field() }}
                        <div class="form-label-group">
                            <input type="text" id="rut" name="rut" class="form-control" placeholder="Rut" {{-- onfocusout="verifyClient()" --}}>
                            <label for="rut">Rut</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" class="form-control" id="nombreUsu" name="nombreUsu" placeholder="Nombre">
                            <label for="nombreUsu">Nombre</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" class="form-control" id="apellidoUsu" name="apellidoUsu" placeholder="Apellido">
                            <label for="apellidoUsu">Apellido</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" class="form-control" id="telefonoUsu" name="telefonoUsu" placeholder="Telefono">
                            <label for="telefonoUsu">Telefono</label>
                        </div>

                        <div class="form-label-group">
                            <input type="email" class="form-control" id="emailUsu" name="emailUsu" placeholder="Email">
                            <label for="emailUsu">Email</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" class="form-control" id="direccionUsu" name="direccionUsu" placeholder="Direccion">
                            <label for="direccionUsu">Direccion</label>
                        </div>
                        <hr>
                        <div class="form-label-group">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" autofocus>
                            <label for="username">Nombre de usuario</label>
                        </div>
                        <div class="form-label-group">
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Contraseña">
                            <label for="pass">Contraseña</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Repetir contraseña">
                            <label for="confirmpassword">Confirmar contraseña</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrarse</button>
                        <p class="d-block text-center mt-2 small">o</p>
                        <a class="d-block text-center mt-2 small" href="/login">Iniciar Sesion</a>
                        {{-- <hr class="my-4">
                        <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Registrarse con Google</button>
                        <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Registrase con Facebook</button> --}}
                    </form>
                </div>
            </div>
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
                        $("#rut").val("");
                        $("#nombreUsu").val("");
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
                    }
                });
        }

        </script>
