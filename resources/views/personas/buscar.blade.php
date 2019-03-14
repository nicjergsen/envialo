@include('header')
    @include('mensajes')
<div class="container">
    <div class="row">
        <div class="col-lg-12 ">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">{{ $persona->nombreUsu}} {{$persona->apellidoUsu}}</li>
            </ol>
            <h1>{{ $persona->nombreUsu}} {{$persona->apellidoUsu}}</h1>
            <p>Rut {{ $persona->rut }}</p>
            <p>Telefono: {{ $persona->telefonoUsu }} </p>
            <p>Email: {{ $persona->emailUsu}}</p>
            <p>Direccion: {{ $persona->direccionUsu}} </p>
            <a class="btn btn-lg btn-primary" href="{{url('/')}}">Volver al home</a>
        </div>
    </div>
</div>
    @include('footer')
