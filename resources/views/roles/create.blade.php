@include('header')
    <div class="container">
        <div class="row">
                <div class="col-lg-12"></div>
          <div class="col-lg-6">
            <form method="POST" action="{{ url('roles')}}">
                {{ csrf_field() }}
                        <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion">
                        </div>
                        <div><input type="submit" value="Enviar">
                        </div>
                    </form>
          </div>
        </div>
      </div>


@include('footer')
