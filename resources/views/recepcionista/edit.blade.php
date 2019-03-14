@include('header')

<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Anular Encomienda</li>
            </ol>
            <h3>Anular encomienda</h3>
        </div>
        <div class="col-lg-6">
            <form method="POST" action="/recepcionista/search">
                {{ method_field('PUT') }} {{ csrf_field() }}
                <div class="form-group">
                    <label for="idEncomienda">Encomienda</label>
                    <input type="text" class="form-control" id="idEncomienda" name="idEncomienda" value="{{old('idEncomienda', $detalle->idEncomienda)}}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="peso">Peso</label>
                    <input type="text" class="form-control" id="peso" name="peso" value="{{old('peso', $detalle->encomienda->peso)}}" readonly>
                </div>
                <div class="form-group">
                    <label for="alto">Alto</label>
                    <input type="text" class="form-control" id="alto" name="alto" value="{{old('alto', $detalle->encomienda->alto)}}" readonly>
                </div>
                <div class="form-group">
                    <label for="ancho">Ancho</label>
                    <input type="text" class="form-control" id="ancho" name="ancho" value="{{old('ancho', $detalle->encomienda->ancho)}}" readonly>
                </div>
                <div class="form-group">
                    <label for="largo">Largo</label>
                    <input type="text" class="form-control" id="largo" name="largo" value="{{old('largo', $detalle->encomienda->largo)}}" readonly>
                </div>
                <div class="form-group">
                    <label for="valorDeclarado">Valor declarado</label>
                    <input type="text" class="form-control" id="valorDeclarado" name="valorDeclarado" value="{{old('valorDeclarado', $detalle->encomienda->valorDeclarado)}}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="costoEnvio">Costo</label>
                    <input type="text" class="form-control" id="costoEnvio" name="costoEnvio" value="{{old('costoEnvio', $detalle->encomienda->costoEnvio)}}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion de lo que envia</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion', $detalle->encomienda->descripcion)}}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="idTipoe">Tipo de envío</label>
                    <input type="text" class="form-control" id="idTipoe" name="idTipoe" value="{{old('idTipoe', $detalle->encomienda->tipoenvio->nombre)}}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="idCat">Categoría</label>
                    <input type="text" class="form-control" id="idCat" name="idCat" value="{{old('idCat', $detalle->encomienda->categorium->nombre)}}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="rut">Rut Remitente</label>
                    <input type="text" class="form-control" id="rut" name="rut" value="{{old('rut', $detalle->rut)}}" readonly>
                </div>

                <div class="form-group">
                    <label for="destinatario">Rut Destinatario</label>
                    <input type="text" class="form-control" id="destinatario" name="destinatario" value="{{old('destinatario', $detalle->destinatario)}}"
                        readonly>
                </div>

                <div class="form-group">
                    <label for="origen">Origen</label>
                    <input type="text" class="form-control" id="origen" name="origen" value="{{old('origen', $detalle->origen)}}" readonly>
                </div>

                <div class="form-group">
                    <label for="destino">Destino</label>
                    <input type="text" class="form-control" id="destino" name="destino" value="{{old('destino', $detalle->destino)}}" readonly>
                </div>
                <div><input type="submit" value="Anular">
                </div>
            </form>
        </div>
    </div>
</div>
    @include('footer')
