@include('header')
    @include('mensajes')
    <div id="ocupado" style="display:none;" class="alert alert-info alert-dismissible col-lg-8 mx-auto">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>No hay registros asociados al rut, por favor rellene el formulario</p>
        </div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 mx-auto">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Nueva encomienda(2/4) - Datos Remitente</li>
            </ol>
            <h3>Datos Remitente</h3>
        </div>
        <div class="col-lg-12">
            <form method="POST" action="{{ url('/recepcionista/create4')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="rut">Rut</label>
                    <input type="text" class="form-control" id="rut" name="rut" onfocusout="verifyClient()">
                </div>

                <div class="form-group">
                    <label for="nombreUsu">Nombre</label>
                    <input type="text" class="form-control" id="nombreUsu" name="nombreUsu">
                </div>

                <div class="form-group">
                    <label for="apellidoUsu">Apellido</label>
                    <input type="text" class="form-control" id="apellidoUsu" name="apellidoUsu">
                </div>

                <div class="form-group">
                    <label for="telefonoUsu">Telefono</label>
                    <input type="text" class="form-control" id="telefonoUsu" name="telefonoUsu">
                </div>

                <div class="form-group">
                    <label for="emailUsu">Email</label>
                    <input type="email" class="form-control" id="emailUsu" name="emailUsu">
                </div>

                <div class="form-group">
                    <label for="direccionUsu">Direccion</label>
                    <input type="text" class="form-control" id="direccionUsu" name="direccionUsu">
                </div>
                <div><input type="submit" value="Enviar" center>
                </div>
            </form>
        </div>

    </div>
</div>
<br>
    @include('footer')
<script>
    function verifyClient(){
    var rutSearch = $("#rut").val();
        $.ajax({
            "type": "GET",
            "url": "http://courier.test/personas/buscar/" + rutSearch,
            "data": { funcion:rutSearch }
        }).fail(function() {
/*             if ($('#ocupado').is(':hidden'))
                $('#ocupado').show();
            else
                $('#ocupado').hide(); */
            $("#nombreUsu").val("");
            $("#apellidoUsu").val("");
            $("#telefonoUsu").val("");
            $("#emailUsu").val("");
            $("#direccionUsu").val("");
        }).done(function(data){
            if (data === ""){
                $("#rut").val("");
                $("#nombreUsu").val("");
                $("#telefonoUsu").val("");
                $("#emailUsu").val("");
                $("#direccionUsu").val("");
            }else{
            var persona = JSON.parse(data);
            console.log(persona);
            $("#rut").val(persona["rut"]);
            $("#nombreUsu").val(persona["nombreUsu"]);
            $("#apellidoUsu").val(persona["apellidoUsu"]);
            $("#telefonoUsu").val(persona["telefonoUsu"]);
            $("#direccionUsu").val(persona["direccionUsu"]);
            $("#emailUsu").val(persona["emailUsu"]);
            
            $('#telefonoUsu').attr("readonly", "");
            $('#apellidoUsu').attr("readonly", "");
            $('#nombreUsu').attr("readonly", "");
            $('#emailUsu').attr("readonly", "");
            $('#direccionUsu').attr("readonly", "");
            }
        });
}

</script>
