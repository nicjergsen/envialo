@include('header')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Asignar encomienda a un sector de la bodega(2/2)</li>
            </ol>
            <h2>Asignar encomienda a un sector de la bodega(2/2)</h2>
        </div>
        <div class="col-lg-6">
            <h3>Sucursal: {{$sucursal->nombreSuc}} </h3>
            <h5>Ciudad {{$sucursal->comuna->nombreComuna}}</h5>
            <form method="POST" action="/bodega/search">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="idEncomienda">Encomienda</label>
                    <input type="text" class="form-control" id="idEncomienda" name="idEncomienda" value="{{$encomienda->idEncomienda}}" readonly>
                </div>
                <div class="form-group">
                    <label for="id">Sector bodega</label>
                    <select name="id" id="id" class="form-control">
                            @foreach ($sectores as $sector)
                            <option value="{{$sector->id}}">{{$sector->nombreSec}}</option>
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
