@include('header')
<br>
<!-- Mensajes -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible col-lg-4 mx-auto">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif @if (session('mensaje'))
            <div class="alert alert-info alert-dismissible col-lg-4 mx-auto">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p>{{ session('mensaje')}}</p>
            </div>
            @endif @if (session('error'))
            <div class="alert alert-alert alert-dismissible col-lg-4 mx-auto">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p>{{ session('error')}}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@if(session('costo'))
<div class="alert alert-info alert-dismissible col-lg-6 mx-auto">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p>El costo de tu envío seria de: ${{ session('costo')}}</p>
</div>
@endif
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h3>Simula tu envío</h3>
            <form method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="peso">Peso (Kg)</label>
                    <input type="text" class="form-control" id="peso" name="peso">
                </div>
                <div class="form-group">
                    <label for="alto">Alto (cm)</label>
                    <input type="text" class="form-control" id="alto" name="alto">
                </div>
                <div class="form-group">
                    <label for="largo">Largo (cm)</label>
                    <input type="text" class="form-control" id="largo" name="largo">
                </div>
                <div class="form-group">
                    <label for="ancho">Ancho (cm)</label>
                    <input type="text" class="form-control" id="ancho" name="ancho">
                </div>
                <div><input type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>
<br>
    @include('footer')
