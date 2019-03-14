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
                    <form class="form-signin" method="POST" action="/login">
                        {{ csrf_field() }}
                        <div class="form-label-group">
                            <input type="text" id="username" name="username" class="form-control" placeholder="Username" autofocus>
                            <label for="username">Nombre de usuario</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="rut" name="rut" class="form-control" placeholder="Rut">
                            <label for="rut">Rut</label>
                        </div>

                        <hr>

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
