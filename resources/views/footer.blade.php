<!-- Footer -->
<footer class="footer bg-light bottom ">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
{{--                 <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                        <a href="#">
                                <i class="fab fa-facebook fa-2x fa-fw"></i>
                              </a>
                    </li>
                    <li class="list-inline-item mr-3">
                        <a href="#">
                                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                              </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                                <i class="fab fa-instagram fa-2x fa-fw"></i>
                              </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                                  <i class="fab fa-youtube fa-2x fa-fw"></i>
                                </a>
                    </li>
                </ul>
                <br> --}}
                <p class="text-muted small mb-4 mb-lg-0">&copy; Envíalo 2018. All Rights Reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src=" {{asset('js/jquery/jquery.js')}} "></script>
<script src=" {{asset('css/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<script>
    function abrirVentana(url) {
    ventana = window.open(url, "buscar", "width=1200, height=1200");
    ventana.document.getElementById('busqueda').value = "num" ;
}
</script>
</body>

</html>
