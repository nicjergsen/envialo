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
    <!-- Bootstrap core JavaScript -->
    <script src=" {{asset('js/jquery/jquery.min.js')}} "></script>
    <script src=" {{asset('css/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
    <script src="{{ asset('js\jspdf.min.js')}}"></script>
    <script>
        function genPDF() {

	        var doc = new jsPDF();

            var specialElementHandlers = {
            '#hidediv' : function(element,render) {return true;}
            };
            doc.fromHTML($('#boleta').get(0), 20,20,{
                 'width':500,
        		'elementHandlers': specialElementHandlers
            });
	        doc.save('voucher.pdf');
            }
    </script>


</head>

<body>


    <div class="container" >
        <div class="row" id="boleta">
                <div class="col-12">
                <h1 id="pdflogo">Envialo!</h1>
                </div>
                <div class="col-3">
                    <h4>Datos Remitente</h4>
                    <p><strong>Nombre:</strong> {{$remitente->nombreUsu }} </p>
                    <p><strong>Apellido:</strong> {{$remitente->apellidoUsu}}</p>
                    <p><strong>Rut:</strong> {{$remitente->rut }}</p>
                    <p><strong>Telefono:</strong> {{$remitente->telefonoUsu }}</p>
                </div>
                <div class="col-3">
                    <h4>Datos Destinatario</h4>
                    <p><strong>Nombre:</strong> {{$destinatario->nombreUsu }}</p>
                    <p><strong>Apellido:</strong> {{$destinatario->apellidoUsu}}</p>
                    <p><strong>Rut:</strong> {{$destinatario->rut }}</p>
                    <p><strong>Telefono:</strong> {{$destinatario->telefonoUsu }}</p>
                </div>
                <div class="col-10">
                    <h4>Datos Encomienda</h4>
                </div>
                <div class="col-3">
                    <p><strong>Nro:</strong> {{$encomienda->idEncomienda }}</p>
                    <p><strong>Seguimiento: {{$seguimiento->trackingSeg }}</strong></p>
                    <p><strong>Tipo de envio:</strong> {{$encomienda->tipoenvio->nombre }}</p>
                    <p><strong>Costo del envío:</strong>{{$encomienda->costoEnvio}}</p>
                    @foreach ($detalle as $d)
                    <p><strong>Origen:</strong> {{$d->origen }}</p>
                    <p><strong>Destino:</strong> {{$d->destino }}</p>
                    @endforeach
                </div>
                <div class="col-3">
                    <p><strong>Peso:</strong> {{$encomienda->peso }}</p>
                    <p><strong>Alto:</strong> {{$encomienda->alto }}</p>
                    <p><strong>Largo:</strong> {{$encomienda->largo}}</p>
                    <p><strong>Ancho:</strong> {{$encomienda->ancho}}</p>
                    <p><strong>Valor declarado: </strong> {{$encomienda->valorDeclarado}}</p>
                </div>
                <div class="col-12" id="hidediv">
                    <a href="javascript:genPDF()">Imprimir</a> | <a href="/">Volver al home</a>
                </div>
        </div>
    </div>






</body>

</html>
