@include('header')
    @include('mensajes')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12 mx-auto">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Nueva encomienda(1/4) - Datos Encomienda</li>
                </ol>
                <h3>Datos encomienda</h3>
            </div>
            <div class="col-lg-6">
                <form method="POST" action="{{ url('recepcionista/create2')}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="peso">Peso (kg)</label>
                        <input type="text" class="form-control" id="peso" name="peso">
                    </div>
                    <div class="form-group">
                        <label for="alto">Alto (cm)</label>
                        <input type="text" class="form-control" id="alto" name="alto">
                    </div>
                    <div class="form-group">
                        <label for="ancho">Ancho (cm)</label>
                        <input type="text" class="form-control" id="ancho" name="ancho">
                    </div>
                    <div class="form-group">
                        <label for="largo">Largo (cm)</label>
                        <input type="text" class="form-control" id="largo" name="largo">
                    </div>
                    <div class="form-group">
                        <label for="valorDeclarado">Valor declarado</label>
                        <input type="text" class="form-control" id="valorDeclarado" name="valorDeclarado">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion de lo que envia</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion">
                    </div>
                    <div class="form-group">
                        <label for="idTipoe">Tipo de envío</label>
                        <select name="idTipoe" id="idTipoe" class="form-control">
                        @foreach ($tiposenvio as $tipo)
                        <option value="{{$tipo->idTipoe}}">{{$tipo->nombre}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="idCat">Categoría</label>
                        <select name="idCat" id="idCat" class="form-control">
                        @foreach ($categorias as $categoria)
                        <option value="{{$categoria->idCat}}">{{$categoria->nombre}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div><input type="submit" value="Enviar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<br>
    @include('footer')
