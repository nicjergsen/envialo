@include('header')
    @include('mensajes')
<div class="container">
    <div class="row">
        <div class="col-lg-12"></div>
        <div class="col-lg-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/sucursales">Sucursales</a></li>
                <li class="breadcrumb-item active">Editar Sucursal</li>
            </ol>
            <h2>Editar Sucursal - {{$sucursal->nombreSuc}}</h2>
            <form method="POST" action="{{ url("sucursales/{$sucursal->idSuc}")}}"> {{ method_field('PUT') }} {{ csrf_field() }}
                <input type="hidden" id="idSuc" name="idSuc" value="{{old('idSuc', $sucursal->idSuc)}}">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombreSuc" name="nombreSuc" value="{{ old('nombreSuc', $sucursal->nombreSuc)}}">
                </div>
                <div class="form-group">
                    <label for="comuna">Comuna</label>
                    <select name="idComuna" id="idComuna" class="form-control">
                            @foreach ($comunas as $comuna)
                            <option value="{{$comuna->idComuna}}">{{$comuna->nombreComuna}}</option>
                            @endforeach
                            <option value="{{$sucursal->idComuna}}" selected>{{$sucursal->comuna->nombreComuna}}</option>
                            </select>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" class="form-control" id="direccionSuc" name="direccionSuc" value="{{old('direccionSuc', $sucursal->direccionSuc)}}">
                </div>
                <div class="form-group">
                    <label for="fono">Fono</label>
                    <input type="number" class="form-control" id="telefonoSuc" name="telefonoSuc" value="{{old('telefonoSuc', $sucursal->telefonoSuc)}}">
                </div>
                <div class="form-group">
                    <label for="apertura">Apertura</label>
                    <input type="time" class="form-control" id="aperturaSuc" name="aperturaSuc" value="{{old('aperturaSuc', $sucursal->aperturaSuc)}}">
                </div>
                <div class="form-group">
                    <label for="cierre">Cierre</label>
                    <input type="time" class="form-control" id="cierreSuc" name="cierreSuc" value="{{old('cierreSuc', $sucursal->cierreSuc)}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="emailContactoSuc" name="emailContactoSuc" value="{{old('emailContactoSuc', $sucursal->emailContactoSuc)}}">
                </div>
                <div class="form-group">
                    <label for="gmaps">Link Google Maps</label>
                    <input type="text" class="form-control" id="googleMapsSuc" name="googleMapsSuc" value="{{old('googleMapsSuc', $sucursal->googleMapsSuc)}}">
                </div>
                <input type="hidden" id="idActive" name="isActive" value="{{old('isActive', $sucursal->isActive)}}">
                <div><input type="submit" value="Enviar">
                </div>
            </form>
            <a class="btn btn-lg btn-primary" href="{{url('sucursales')}}">Volver al menú Sucursales</a>
        </div>
    </div>
</div>
    @include('footer')
