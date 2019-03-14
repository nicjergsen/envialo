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
                            <label for="nombreUsu">Nombre</label>
                            <input type="text" class="form-control" id="nombreUsu" name="nombreUsu">
                        </div>

                        <div class="form-group">
                            <label for="apellidoUsu">Apellido</label>
                            <input type="text" class="form-control" id="apellidoUsu" name="apellidoUsu">
                        </div>

                        <div class="form-group">
                            <label for="telefonoUsu">Telefono</label>
                            <input type="text" class="form-control" id="telefonoUsu" name="telefonoUsu">
                        </div>

                        <div class="form-group">
                            <label for="emailUsu">Email</label>
                            <input type="email" class="form-control" id="emailUsu" name="emailUsu">
                        </div>

                        <div class="form-group">
                            <label for="direccionUsu">Direccion</label>
                            <input type="text" class="form-control" id="direccionUsu" name="direccionUsu">
                        </div>

                        <div><input type="submit" value="Enviar">
                        </div>
                    </form>
          </div>
        </div>
      </div>


@include('footer')
