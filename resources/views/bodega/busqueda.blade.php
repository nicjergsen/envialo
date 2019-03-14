@include('header')
    @include('mensajes')
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <h2>Búsqueda avanzada</h2>
            <br>
            <div class="col-12 ">
                <form class="navbar-form" role="search" method="GET">
                    <div class="form-group">
                        <div class="input-group mb-6">
                            <div class="input-group-append">
                                <label class="input-group-text" for="campo">Filtrar por</label>
                            </div>
                            <select class="custom-select" id="campo" name="campo">
                                                    <option selected value="trackingSeg">Tracking</option>
                                                    <option value="rut">Rut remitente</option>
                                                    <option value="destinatario">Rut destinatario</option>
                                                  </select>
                            <input type="text" class="form-control" placeholder="Buscar..." name="valor" id="valor" minlength="4" autocomplete="off">
                            <div class="input-group-append">
                                <span class="input-group-text icon-magnifier" id="basic-addon2"></span>

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <form id="busqueda">
            <div class="col-8 ">
                {{-- TABLA BUSQUEDA POR SEGUIMIENTO --}}
                <br> @if(isset($seguimiento))
                <h6>Búsqueda por tracking</h6>
                <table class="table table-hover">
                    <tr>
                        <th>Nro. Encomienda</th>
                        <th>Rut remitente</th>
                        <th>Rut destinatario</th>
                        <th><strong>Tracking</strong></th>
                        <th>Estado</th>
                        <th>Fecha Estado</th>
                        <th>Peso</th>
                        <th>Alto</th>
                        <th>Largo</th>
                        <th>Ancho</th>
                        <th>Descripcion</th>
                        <th>Fecha de ingreso</th>
                    </tr>
                    @foreach ($seguimiento as $seg)
                    <tr>
                        <td>{{$seg->idEncomienda}}</td>
                        <td>{{$seg->encomienda->detalles[0]->rut}}</td>
                        <td>{{$seg->encomienda->detalles[0]->destinatario}}</td>
                        <td class="bg-success"><strong>{{$seg->trackingSeg }}</strong></td>
                        <td>{{$seg->fasesseguimiento->nombre}}</td>
                        <td>{{$seg->fechaHora}}</td>
                        <td>{{$seg->encomienda->peso }} Kg</td>
                        <td>{{$seg->encomienda->alto}} cm</td>
                        <td>{{$seg->encomienda->largo}} cm</td>
                        <td>{{$seg->encomienda->ancho}} cm</td>
                        <td>{{$seg->encomienda->descripcion }}</td>
                        <td>{{$seg->encomienda->createdAt}}</td>
                        <td><a href="#" onClick="envia({{$seg->idEncomienda}})">Enviar</a></td>
                    </tr>
                    @endforeach
                </table>
                {{-- TABLA BUSQUEDA POR RUT REMITENTE --}} @endif @if(isset($detalle))
                <h6>Busqueda por Rut Remitente</h6>
                <table class="table table-hover">
                    <tr>
                        <th>Nro. Encomienda</th>
                        <th><strong>Rut remitente</strong></th>
                        <th>Rut destinatario</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Peso</th>
                        <th>Alto</th>
                        <th>Largo</th>
                        <th>Ancho</th>
                        <th>Descripcion</th>
                        <th>Fecha de ingreso</th>
                        
                    </tr>
                    @foreach ($detalle as $det)
                    <tr>
                        <td>{{$det->idEncomienda}}</td>
                        <td class="bg-success"><strong>{{$det->rut}}</strong></td>
                        <td>{{$det->destinatario}}</td>
                        <td>{{$det->origen}}</td>
                        <td>{{$det->destino}}</td>
                        <td>{{$det->encomienda->peso }} Kg</td>
                        <td>{{$det->encomienda->alto}} cm</td>
                        <td>{{$det->encomienda->largo}} cm</td>
                        <td>{{$det->encomienda->ancho}} cm</td>
                        <td>{{$det->encomienda->descripcion }}</td>
                        <td>{{$det->encomienda->createdAt}}</td>
                        <td><a href="#" onClick="envia({{$det->idEncomienda}})">Enviar</a></td>

                    </tr>
                    @endforeach
                </table>
                @endif {{-- TABLA BUSQUEDA POR RUT DESTINATARIO --}} @if(isset($destinatario))
                <h6>Busqueda por Rut Destinatario</h6>
                <table class="table table-hover">
                    <tr>
                        <th>Nro. Encomienda</th>
                        <th>Rut remitente</th>
                        <th><strong>Rut destinatario</strong></th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Peso</th>
                        <th>Alto</th>
                        <th>Largo</th>
                        <th>Ancho</th>
                        <th>Descripcion</th>
                        <th>Fecha de ingreso</th>
                    </tr>
                    @foreach ($destinatario as $des)
                    <tr>
                        <td>{{$des->idEncomienda}}</td>
                        <td>{{$des->rut}}</td>
                        <td class="bg-success"><strong>{{$des->destinatario}}</strong></td>
                        <td>{{$des->origen}}</td>
                        <td>{{$des->destino}}</td>
                        <td>{{$des->encomienda->peso }} Kg</td>
                        <td>{{$des->encomienda->alto}} cm</td>
                        <td>{{$des->encomienda->largo}} cm</td>
                        <td>{{$des->encomienda->ancho}} cm</td>
                        <td>{{$des->encomienda->descripcion }}</td>
                        <td>{{$des->encomienda->createdAt}}</td>
                        <td><a href="#" onClick="envia({{$des->idEncomienda}})">Enviar</a></td>
                    </tr>
                    @endforeach
                </table>
                 @endif
            </div>
            </form>
        </div>
    </div>
</div>
    @include('footer')
    <script>

function envia(num){
    window.opener.document.getElementById('idEncomienda').value = num ;
close();
}
</script>