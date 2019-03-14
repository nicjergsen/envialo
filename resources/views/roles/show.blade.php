@include('header')
<br>
<div class="container">
        <div class="row">
          <div class="col-lg-12 ">
            <h1>{{ $rol->nombre}}</h1>
            <p>Descripcion: {{$rol->descripcion}}</p>

        </div>
    </div>
</div>
@include('footer')
