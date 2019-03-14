@include('header')
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <h1>Seguimiento</h1>
            <table class="table table-hover">
                <h6>Numero de seguimiento: {{$datos_encomienda->trackingSeg}}</h6>
                <h6>Nro de encomienda: {{$datos_encomienda->idEncomienda}}</h6>
                <h6>Tipo de envío: {{$datos_encomienda->encomienda->tipoenvio->nombre}}</h6>
                <h6>Categoría: {{$datos_encomienda->encomienda->categorium->nombre}}</h6>
                <h6>Origen: {{$datos_encomienda->encomienda->detalle->origen}}</h6>
                <h6>Destino: {{$datos_encomienda->encomienda->detalle->destino}}</h6>
                <br>
                <h3>Estado de envío</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Fecha y Hora</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tracking as $seg)
                        <tr>
                            <td>{{ $seg->fechaHora}}</td>
                            <td>{{ $seg->fasesseguimiento->nombre }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
        </div>
    </div>
</div>
    @include('footer')
