@include('header')
<div class="container">
    <div class="row">
        <br>
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Actualizar estado del seguimiento(2/2)</li>
            </ol>
            <h2>Actualizar estado del seguimiento(2/2)</h2>
        </div>
        <div class="col-lg-6">
            <form method="POST" action="/bodega/search2">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="idEncomienda">Encomienda</label>
                    <input type="text" class="form-control" id="idEncomienda" name="idEncomienda" value="{{$encomienda->idEncomienda}}" readonly>
                </div>
                <div class="form-group">
                    <label for="trackingSeg">Nro seguimiento</label>
                    <input type="text" class="form-control" id="trackingSeg" name="trackingSeg" value="{{$seguimiento->trackingSeg}}" readonly>
                </div>
                <div class="form-group">
                    <label for="actual">Estado actual</label>
                    <input type="text" class="form-control" id="actual" name="actual" value="{{$seguimiento->fasesseguimiento->nombre}}" readonly>
                </div>
                <div class="form-group">
                    <label for="idFaseg">Estado</label>
                    <select name="idFaseg" id="idFaseg" class="form-control">
                                @foreach ($fases as $fase)
                                <option value="{{$fase->idFaseg}}">{{$fase->nombre}}</option>
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
