@include('header')
    @include('mensajes')
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/sucursales">Sucursales</a></li>
                <li class="breadcrumb-item active">{{ $sucursal->nombreSuc}}</li>
            </ol>
            <h1>Eliminar sucursal - {{ $sucursal->nombreSuc}}</h1>
            <p>ID: {{ $sucursal->idSuc}}</p>
            <p>Comuna: {{$sucursal->comuna->nombreComuna}}</p>
            <p>Fono: {{ $sucursal->telefonoSuc}}</p>
            <p>Email: {{ $sucursal->emailContactoSuc}}</p>
            <p>Horario apertura: {{$sucursal->aperturaSuc}}</p>
            <p>Horario cierre: {{$sucursal->cierreSuc}}</p>
            @if($sucursal->googleMapsSuc != null)
            <p>Google Maps:</p>
            <iframe src="{{$sucursal->googleMapsSuc}}" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>            @else Google Maps:
            <p class="text-info"> No hay enlace asociado a la sucursal.</p>
            @endif

            <form method="POST" action="{{ url("sucursales/{$sucursal->idSuc}")}}"> {{ method_field('PUT') }} {{ csrf_field() }}
                <input type="hidden" id="idSuc" name="idSuc" value="{{old('idSuc', $sucursal->idSuc)}}">
                <input type="hidden" id="nombreSuc" name="nombreSuc" value="{{ old('nombreSuc', $sucursal->nombreSuc)}}">
                <input type="hidden" id="idComuna" name="idComuna" value="{{ old('idComuna', $sucursal->idComuna)}}">
                <input type="hidden" id="direccionSuc" name="direccionSuc" value="{{old('direccionSuc', $sucursal->direccionSuc)}}">
                <input type="hidden" id="telefonoSuc" name="telefonoSuc" value="{{old('telefonoSuc', $sucursal->telefonoSuc)}}">
                <input type="hidden" class="form-control" id="aperturaSuc" name="aperturaSuc" value="{{old('aperturaSuc', $sucursal->aperturaSuc)}}">
                <input type="hidden" class="form-control" id="cierreSuc" name="cierreSuc" value="{{old('cierreSuc', $sucursal->cierreSuc)}}">
                <input type="hidden" class="form-control" id="emailContactoSuc" name="emailContactoSuc" value="{{old('emailContactoSuc', $sucursal->emailContactoSuc)}}">
                <input type="hidden" class="form-control" id="googleMapsSuc" name="googleMapsSuc" value="{{old('googleMapsSuc', $sucursal->googleMapsSuc)}}">
                <input type="hidden" id="idActive" name="isActive" value="0">
                <div><input type="submit" class="btn btn-warning" value="Eliminar sucursal">
                </div>
            </form>
            <a class="btn btn-lg btn-primary" href="{{url('sucursales')}}">Volver al menú Sucursales</a>
        </div>
    </div>
</div>
    @include('footer')
