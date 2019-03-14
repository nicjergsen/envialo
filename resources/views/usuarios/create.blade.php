@include('header')
    <div class="container">
        <div class="row">
                <div class="col-lg-12"></div>
          <div class="col-lg-6">
            <form method="POST" action="{{ url('home')}}">
                {{ csrf_field() }}
                        <div class="form-group">
                            <label for="rut">Rut</label>
                            <input type="text" class="form-control" id="rut" name="rut">
                        </div>

                        <div class="form-group">
                            <label for="username">Nombre de usuario</label>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>

                        <div class="form-group">
                            <label for="pass">Contraseña</label>
                            <input type="password" class="form-control" id="pass" name="pass">
                        </div>

                        <div><input type="submit" value="Enviar">
                        </div>
                    </form>
          </div>
        </div>
      </div>


@include('footer')
