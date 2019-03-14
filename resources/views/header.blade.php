<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Envíalo - Empresa de courier</title>

    <!-- Bootstrap core CSS -->
    <link href=" {{asset('css/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href=" {{asset('fontawesome-free/css/all.min.css') }} " rel="stylesheet">
    <link href=" {{asset('simple-line-icons/css/simple-line-icons.css') }} " rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href=" {{asset('landing-page/landing-page.css') }} " rel="stylesheet">
    <link rel="stylesheet" href=" {{asset('css/login.css')}}" type="text/css">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top">
        <div class="container">
            <a class="navbar-brand" href="/" id="logo">Envíalo!</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ url("/about/ ") }}">Conócenos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ url("/services/ ") }}">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ url("/branch/ ") }}">Sucursales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ url("/faq/ ") }}">Preguntas Frecuentes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ url("/simularenvio ") }}">Simula tu envío</a>
                    </li>

                </ul>

                <ul class="navbar-nav ml-auto">
                    @if (session()->has('username'))
                        @if (session()->has('idTipusu'))
                            @if(session('idTipusu')=='1')
                                <li class="nav-item dropdown ml-auto">
                                    <a class="nav-link dropdown-toggle " href="#" id="navbardrop" data-toggle="dropdown">{{session('username')}} </a>
                                    <ul class="dropdown-menu">
                                        <li><h5 class="dropdown-header"> Menú de admnistrador</h5></li>
                                        <li><a class="dropdown-item" href="{{ url("/sucursales/ ") }}">Sucursales</a></li>
                                        <li><a class="dropdown-item" href="/empleados">Empleados</a></li>
                                        <li><a class="dropdown-item" href="/roles">Roles</a></li>
                                        <li><h5 class="dropdown-header">Perfil de usuario</h5></li>
                                        <li><a class="dropdown-item" href="/profile">Editar perfil</a></li>
                                        <li><a class="dropdown-item" href="/history">Historial de encomiendas</a></li>
                                    </ul>
                                </li>
                            @elseif(session('idTipusu')=='2')
                                <li class="nav-item dropdown ml-auto">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">{{session('username')}}
                                            </a>
                                    <ul class="dropdown-menu">
                                        <h5 class="dropdown-header"> Menú de recepcionista</h5>
                                        <a class="dropdown-item" href="/recepcionista/create">Nueva Encomienda</a>
                                        <a class="dropdown-item" href="/recepcionista/search">Anular encomienda</a>
                                        <h5 class="dropdown-header">Perfil de usuario</h5>
                                        <a class="dropdown-item" href="/profile">Editar perfil</a>
                                        <a class="dropdown-item" href="/history">Historial de encomiendas</a>
                                    </ul>
                                </li>
                            @elseif(session('idTipusu')=='3')
                                <li class="nav-item dropdown ml-auto">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">{{session('username')}}
                                            </a>
                                    <ul class="dropdown-menu">
                                        <h5 class="dropdown-header"> Menú de bodeguero</h5>
                                        <a class="dropdown-item" href="/bodega/search">Asignar encomienda a un sector de Bodega</a>
                                        <a class="dropdown-item" href="/bodega/search4">Buscar encomienda en la bodega</a>
                                        <a class="dropdown-item" href="/bodega/search2">Actualizar estado del seguimiento</a>
                                        <a class="dropdown-item" href="/bodega/search3">Registrar entrega de encomienda</a>
                                        <h5 class="dropdown-header">Perfil de usuario</h5>
                                        <a class="dropdown-item" href="/profile">Editar perfil</a>
                                        <a class="dropdown-item" href="/history">Historial de encomiendas</a>
                                    </ul>
                                </li>
                        @endif
                    @else
                    <li class="nav-item dropdown ml-auto">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">{{session('username')}}
                            </a>
                        <ul class="dropdown-menu">
                            <h5 class="dropdown-header">Perfil</h5>
                            <a class="dropdown-item" href="/profile">Editar perfil</a>
                            <a class="dropdown-item" href="/history">Historial de encomiendas</a>
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link icon-logout" href=" {{ url("/logout/ ") }}"></a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link icon-login" href="{{ url("/login/ ") }}"></a>
                    </li>
                    @endif
                </ul>
                </div>
                </div>
    </nav>
