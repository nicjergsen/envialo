@include('header')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
        <br><h1>Sucursales</h1><br>

        @foreach ($sucursales as $sucursal)
            <div class="row">
                <div class="col-lg-6">
                    <h3>{{ $sucursal->nombreSuc}}</h3>
                    <p>Comuna: {{$sucursal->comuna->nombreComuna}}</p>
                    <p>Fono: {{ $sucursal->telefonoSuc}}</p>
                    <p>Email: {{ $sucursal->emailContactoSuc}}</p>
                    <p>Horario apertura: {{$sucursal->aperturaSuc}}</p>
                    <p>Horario cierre: {{$sucursal->cierreSuc}}</p>

                </div>
                @if($sucursal->googleMapsSuc != "no")
                <div class="col-lg-4">
                    @if($sucursal->googleMapsSuc != null)
                    <iframe src="{{$sucursal->googleMapsSuc}}" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    @endif
                </div>
                @endif
            </div><br><br>
            @endforeach

        </div>
    </div>
  </div>

@include('footer')
