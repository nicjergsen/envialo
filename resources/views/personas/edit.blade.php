@include('header')
    <div class="container">
        <div class="row">
                <div class="col-lg-12"></div>
          <div class="col-lg-6">
            <form method="POST" action="{{ url("personas/{$persona->rut}")}}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                        <input type="hidden" id="rut" name="rut" value="{{old('rut', $persona->rut)}}">

                        <div class="form-group">
                            <label for="nombreUsu">Nombre</label>
                            <input type="text" class="form-control" id="nombreUsu" name="nombreUsu" value="{{old('nombreUsu', $persona->nombreUsu)}}" >
                        </div>

                        <div class="form-group">
                            <label for="apellidoUsu">Apellido</label>
                            <input type="text" class="form-control" id="apellidoUsu" name="apellidoUsu" value="{{old('apellidoUsu', $persona->apellidoUsu)}} ">
                        </div>

                        <div class="form-group">
                            <label for="telefonoUsu">Telefono</label>
                            <input type="text" class="form-control" id="telefonoUsu" name="telefonoUsu" value="{{old('telefonoUsu', $persona->telefonoUsu)}}">
                        </div>

                        <div class="form-group">
                            <label for="emailUsu">Email</label>
                            <input type="email" class="form-control" id="emailUsu" name="emailUsu" value="{{old('emailUsu', $persona->emailUsu)}}">
                        </div>

                        <div class="form-group">
                            <label for="direccionUsu">Direccion</label>
                            <input type="text" class="form-control" id="direccionUsu" name="direccionUsu" value="{{old('direccionUsu', $persona->direccionUsu)}}">
                        </div>

                        <div><input type="submit" value="Enviar">
                        </div>
                    </form>
          </div>
        </div>
      </div>


@include('footer')
