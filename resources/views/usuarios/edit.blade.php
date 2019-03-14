@include('header')
    <div class="container">
        <div class="row">
                <div class="col-lg-12"></div>
          <div class="col-lg-6">
            <form method="POST" action="{{ url("usuarios/{$usuario->rut}")}}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                        <input type="hidden" id="rut" name="rut" value="{{old('rut', $usuario->rut)}}">

                        <div class="form-group">
                            <label for="username">Nombre de usuario</label>
                            <input type="text" class="form-control" id="username" name="username" value="{{old('username', $usuario->username)}}" >
                        </div>
                        <div class="form-group">
                            <label for="pass">Contraseña</label>
                            <input type="password" class="form-control" id="pass" name="pass" value="{{old('pass', $usuario->pass)}} ">
                        </div>

                        <div><input type="submit" value="Enviar">
                        </div>
                    </form>
          </div>
        </div>
      </div>


@include('footer')
