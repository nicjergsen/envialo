<br>
<!-- Mensajes -->
<div class="container">
    <div class="row">
        <div class="col-lg-10">
            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible col-lg-10 mx-auto">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif @if (session('mensaje'))
            <div class="alert alert-info alert-dismissible col-lg-10 mx-auto">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p>{{ session('mensaje')}}</p>
            </div>
            @endif @if (session('error'))
            <div class="alert alert-danger alert-dismissible col-lg-10 mx-auto">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p>{{ session('error')}}</p>
            </div>
            @endif
        </div>
    </div>
</div>
