@include('header')
    @include('mensajes')
<div class="container">
    <div class="row">
        <br>
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Actualizar estado del seguimiento(1/2)</li>
            </ol>
            <h2>Actualizar estado del seguimiento(1/2)</h2>
        </div>
        <div class="col-lg-6">
            <form id="formBuscadorEncomienda" method="POST" action="{{ url("bodega/tracking ")}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="idEncomienda">Nro. Encomienda</label>
                    <input type="text" class="form-control" id="idEncomienda" name="idEncomienda">
                </div>
                <div><input type="submit" value="Buscar">
                    <a href="#" onClick="abrirVentana('http://courier.test/bodega/busqueda')">¿Necesitas ayuda con el Nro. de la encomienda?</a>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
    @include('footer')
