@include('header')

<div class="container">
        <div class="row">
                <div class="col-lg-12"></div>
          <div class="col-lg-6">
            <form method="POST" action="{{ url("roles/{$rol->idTipusu}")}}">
                {{ method_field('PUT') }}
                {{ csrf_field() }}

                        <input type="hidden" id="idTipusu" name="idTipusu" value="{{old('idTipusu', $rol->idTipusu)}}">
                        <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $rol->nombre)}}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $rol->descripcion)}}">
                        </div>
                        <div><input type="submit" value="Enviar">
                        </div>
            </form>
          </div>
        </div>
      </div>

@include('footer')
