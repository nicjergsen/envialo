@include('header')
    @include('mensajes')

<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Nueva encomienda(4/4) - Detalles</li>
            </ol>
            <h3>Detalles</h3>
        </div>
        <div class="col-lg-6">
            <form method="POST" action="/recepcionista/success">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="rut">Rut Remitente</label>
                    <input type="text" class="form-control" id="rut" name="rut" value="{{session('rutRemitente')}}" readonly>
                </div>

                <div class="form-group">
                    <label for="destinatario">Rut Destinatario</label>
                    <input type="text" class="form-control" id="destinatario" name="destinatario" value="{{session('rutDestinatario')}}" readonly>
                </div>

                <div class="form-group">
                    <label for="idEncomienda">Encomienda</label>
                    <input type="text" class="form-control" id="idEncomienda" name="idEncomienda" value="{{session('idEncomienda')}}" readonly>
                </div>

                <div class="form-group">
                    <label for="origen">Origen</label>
                    <input type="text" class="form-control" id="origen" name="origen" value="{{session('nombreComuna')}}" readonly>
                </div>

                <div class="form-group">
                    <label for="destino">Destino</label>
                    <select name="destino" id="destino" class="form-control">
                            @foreach ($sucursales as $sucursal)
                            <option value="{{$sucursal->comuna->nombreComuna}}">{{$sucursal->comuna->nombreComuna}}</option>
                            @endforeach
                            </select>
                </div>

                <div><input type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>
    @include('footer')
