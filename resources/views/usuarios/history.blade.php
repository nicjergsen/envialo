@include('header')
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <br>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Historial de envíos</li>
              </ol>
            <h2>Historial de envios</h2>
            <br> @if (count($detalles) != 0)

            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Tipo de Envío</th>
                    <th>Categoria</th>
                    <th>Origen</th>
                    <th>Destino</th>
                    <th>Estado</th>

                </tr>


                @foreach ($detalles as $detalle)
                <tr>
                        <td>{{$detalle->encomienda->idEncomienda}}</td>
                    {{-- <td>{{$detalle->encomienda->seguimientos->trackingSeg}}</td> --}}
                    <td>{{$detalle->encomienda->tipoenvio->nombre}}</td>
                    <td>{{$detalle->encomienda->categorium->nombre}}</td>
                    <td>{{$detalle->origen}}</td>
                    <td>{{$detalle->destino}}</td>
                    @if ($detalle->encomienda->isEntregada == 1)
                     <td><div class="alert alert-success">Entregado</div></td>
                     @else
                     <td> <div class="alert alert-info">No entregado</div></td>
                    {{-- <td>{{$detalle->encomienda->seguimientos->fasesseguimiento->nombre}}</td> --}}
                    @endif

                </tr>
                @endforeach
            </table>
            @else
            <div class="alert alert-info">
                <strong>Info!</strong> No hay envíos realizados, te invitamos a realizar uno en nuestra sucursales :)
            </div>
            @endif
        </div>
    </div>
</div>
<br>
    @include('footer')
