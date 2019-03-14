@include('header')

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <br><br>
            <div class="list-group">
                    <a class="list-group-item text-center active" data-remote="true" href="#" id="categoria_0">Menu
                    </a>

                    <a class="list-group-item" data-remote="true" href="#sub_categoria_1" id="categoria_1" data-toggle="collapse" data-parent="#sub_categoria_1" style="padding-left: 25px;">
                            <span style="margin-left: 25px;">Empleados</span>
                            <span class="menu-ico-collapse"><i class="fa fa-chevron-down"></i></span>
                    </a>

                        <div class="collapse list-group-submenu" id="sub_categoria_1">
                            <a href="/empleados/" class="list-group-item sub-item" data-parent="#sub_categoria_1" style="padding-left: 78px;">Menú empleados</a>
                        </div>

                    <a class="list-group-item" data-remote="true" href="#sub_categoria_2" id="categoria_2" data-toggle="collapse" data-parent="#sub_categoria_2" style="padding-left: 25px;">
                            <span style="margin-left: 25px;">Sucursales</span>
                            <span class="menu-ico-collapse"><i class="fa fa-chevron-down"></i></span>
                    </a>

                        <div class="collapse list-group-submenu" id="sub_categoria_2">
                            <a href="/sucursales" class="list-group-item sub-item" data-parent="#sub_categoria_2" style="padding-left: 78px;">Menu sucursales</a>
                        </div>

                    <a class="list-group-item" data-remote="true" href="#sub_categoria_4" id="categoria_4" data-toggle="collapse" data-parent="#sub_categoria_4" style="padding-left: 25px;">
                      <span style="margin-left: 25px;">Roles</span>
                      <span class="menu-ico-collapse"><i class="fa fa-chevron-down"></i></span>
                    </a>

                    <div class="collapse list-group-submenu" id="sub_categoria_4">
                      <a href="/roles" class="list-group-item sub-item" data-parent="#sub_categoria_4" style="padding-left: 78px;">Menu roles</a>
                    </div>


                </div>
            </div>
        </div>
</div>
<br><br>
@include('footer')
