@include('header')
@include('mensajes')

<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">Conoce el estado de tu envío</h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form method="POST" action="{{ url('tracking')}}">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input type="trackingSeg" id="trackingSeg" name="trackingSeg" class="form-control form-control-lg" placeholder="Ingresa el numero de seguimiento"
                                required>
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-block btn-lg btn-primary">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-check m-auto text-primary"></i>
                    </div>
                    <h3>Envíos con seguro</h3>
                    <p class="lead mb-0">Respondemos al 100% en caso de cualquier incidente que pueda ocurrir con su encomienda!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-heart m-auto text-primary"></i>
                    </div>
                    <h3>Bajo impacto ambiental en nuestros embalajes</h3>
                    <p class="lead mb-0">Nuestra empresa esta comprometida con el medio ambiente, nuestros materiales de embalaje son 100% biodegradables!</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-compass m-auto text-primary"></i>
                    </div>
                    <h3>Seguimiento a tus envíos</h3>
                    <p class="lead mb-0">Podras ver en donde se encuentra tu encomienda en todo momento!</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Image Showcases -->
<section class="showcase">
    <div class="container-fluid p-0">
        <div class="row no-gutters">

            <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('../img/packaging.jpg');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Envíos con seguro</h2>
                <p class="lead mb-0">Nos comprometemos a reembolzar el costo total.</p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 text-white showcase-img" style="background-image: url('../img/ecofriendly.jpg');"></div>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>Bajo impacto ambiental</h2>
                <p class="lead mb-0">Nuestas materiales son amigables con el medio ambiente.</p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('../img/tracking.jpg');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Seguimiento a tus envíos</h2>
                <p class="lead mb-0">Podras estar al tanto en todo momento de tu envio.</p>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h2 class="mb-4">Tu opinion es importante</h2>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form role="form" id="contactForm" data-toggle="validator" class="shake" action="sendemail">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="nombre" class="h4">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingrese su Nombre" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email" class="h4">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Ingrese su Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mensaje" class="h4 ">Mensaje</label>
                        <textarea id="mensaje" class="form-control" rows="5" placeholder="Ingrese su Mensaje" required></textarea>
                    </div>
                    <button type="submit" id="form-submit" class="btn btn-primary btn-lg pull-right ">Enviar</button>
                    <div id="msgSubmit" class="h3 text-center hidden"></div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</section>
    @include('footer')
