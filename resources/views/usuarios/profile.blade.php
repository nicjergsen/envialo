@include('header')
<br>
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Perfil de usuario</li>
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
    </div>
</div>
<br>
    @include('footer')
