@include('header')
    @include('mensajes')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/sucursales">Sucursales</a></li>
                <li class="breadcrumb-item active">Nueva sucursal</li>
            </ol>
            <div class="col-lg-6">
                <h2>Nueva sucursal</h2>
                <form method="POST" action="{{ url('sucursales')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="nombreSuc">Nombre</label>
                        <input type="text" class="form-control" id="nombreSuc" name="nombreSuc">
                    </div>
                    <div class="form-group">
                        <label for="comuna">Comuna</label>
                        <select name="comuna" id="comuna" class="form-control">
                            @foreach ($comunas as $comuna)
                            <option value="{{$comuna->idComuna}}">{{$comuna->nombreComuna}}</option>
                            @endforeach
                            </select>
                    </div>
                    <div class="form-group">
                        <label for="direccionSuc">Direccion</label>
                        <input type="text" class="form-control" id="direccionSuc" name="direccionSuc">
                    </div>
                    <div class="form-group">
                        <label for="telefonoSuc">Fono</label>
                        <input type="number" class="form-control" id="telefonoSuc" name="telefonoSuc">
                    </div>
                    <div class="form-group">
                        <label for="aperturaSuc">Apertura</label>
                        <input type="time" class="form-control" id="aperturaSuc" name="aperturaSuc">
                    </div>
                    <div class="form-group">
                        <label for="cierreSuc">Cierre</label>
                        <input type="time" class="form-control" id="cierreSuc" name="cierreSuc">
                    </div>
                    <div class="form-group">
                        <label for="emailContactoSuc">Email</label>
                        <input type="email" class="form-control" id="emailContactoSuc" name="emailContactoSuc">
                    </div>
                    <div class="form-group">
                        <label for="googleMapsSuc">Link Google Maps</label>
                        <input type="text" class="form-control" id="googleMapsSuc" name="googleMapsSuc">
                    </div>
                    <div><input type="submit" value="Enviar">
                    </div>
                </form>
                <br>
                <a class="btn btn-lg btn-primary" href="{{url('sucursales')}}">Volver al menú Sucursales</a>
            </div>
        </div>
    </div>
</div>
<br>
    @include('footer')
