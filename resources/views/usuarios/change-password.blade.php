@include('header')
    @include('mensajes')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/profile">Perfil de usuario</a></li>
                <li class="breadcrumb-item active">Cambiar contraseña</li>
            </ol>
        </div>
        <div class="col-lg-4">
            <div class="list-group">
                <h4>Perfil</h4>
                <a href="/change/password" class="list-group-item">Cambiar contraseña
                </a>
                <a href="/personal" class="list-group-item">Editar datos personales
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <h3>Cambiar contraseña</h3>
            <form method="POST" action="/change/password"> {{ method_field('PUT') }} {{ csrf_field() }}

                <input type="hidden" id="rut" name="rut" value="{{session('rutUsuario')}}">
                <input type="hidden" id="username" name="username" value="{{session('username')}}">
                <div class="form-group">
                    <label for="old_pass">Contraseña actual</label>
                    <input type="password" class="form-control" id="old_pass" name="old_pass">
                </div>
                <div class="form-group">
                    <label for="pass">Contraseña nueva</label>
                    <input type="password" class="form-control" id="pass" name="pass">
                </div>
                <div class="form-group">
                    <label for="pass2">Repetir contraseña</label>
                    <input type="password" class="form-control" id="pass2" name="pass2">
                </div>

                <div><input type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</div>
<br>
    @include('footer')
