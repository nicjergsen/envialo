@include('header')
<br>
    @include('mensajes')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/profile">Perfil de usuario</a></li>
                <li class="breadcrumb-item active">Editar datos personales</li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="list-group">
                <h4>Perfil</h4>
                <a href="/change/password" class="list-group-item">Cambiar contraseña
                </a>
                <a href="personal" class="list-group-item">Editar datos personales
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <h3>Editar datos personales</h3>
            <form method="POST" action="/personal"> {{ method_field('PUT') }} {{ csrf_field() }}

                <input type="hidden" id="rut" name="rut" value="{{session('rutUsuario')}}">
                <div class="form-group">
                    <label for="telefonoUsu">Telefono</label>
                    <input type="text" class="form-control" id="telefonoUsu" name="telefonoUsu" value="{{ old('telefonoUsu', $persona->telefonoUsu)}}">
                </div>

                <div class="form-group">
                    <label for="emailUsu">Email</label>
                    <input type="email" class="form-control" id="emailUsu" name="emailUsu" value="{{ old('emailUsu', $persona->emailUsu)}}">
                </div>

                <div class="form-group">
                    <label for="direccionUsu">Direccion</label>
                    <input type="text" class="form-control" id="direccionUsu" name="direccionUsu" value="{{ old('nombreSuc', $persona->direccionUsu)}}">
                </div>
                <div><input type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>
<br>
    @include('footer')
