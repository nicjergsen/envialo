@include('header')
@include('mensajes')
<div class="container">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="row">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Sign In</h5>
                    <form class="form-signin" method="POST" action="{{ url('/')}}">
                        {{ csrf_field() }}
                        <div class="form-label-group">
                            <input type="text" id="rut" name="rut" class="form-control" placeholder="Rut" required autofocus>
                            <label for="rut">Rut</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" required>
                            <label for="pass">Contraseña</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Identificarse</button>
                        <br>
                        <a href="/register">Registrate aqui si ya has realizado envíos</a>
                        <hr class="my-2">
                        <p><a href="/register2">Si nunca has realizado envíos registrate aquí</a></p>
                        {{-- <hr class="my-2">
                        <p>Coming soon.</p>
                        <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Identificarse con Google</button>
                        <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Identificarse con Facebook</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    @include('footer')
