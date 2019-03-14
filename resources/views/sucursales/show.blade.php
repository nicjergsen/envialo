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
            <h1>{{ $sucursal->nombreSuc}}</h1>
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

        </div>
        <a class="btn btn-lg btn-primary" href="{{url('sucursales')}}">Volver al menú Sucursales</a>
    </div>
</div>
@include('footer')
