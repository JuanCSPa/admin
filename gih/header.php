<div class="fijo">
    <header class="container-fluid no-pd-lr">
            <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div id="logo" class="mg-l-15" onclick="location.href='<?=$urlBase?>'"></div>
                    </div>
                    <div class="collapse navbar-collapse menuEstilo" id="bs-example-navbar-collapse-1">
                      <?php
                          require_once 'admin-gih/functions/conexion.class.php';
                          require_once 'admin-gih/sc-socios/model/socios.class.php';
                          require_once 'admin-gih/sc-categorias/model/categoria.class.php';

                          $socios = new socios();
                          $getAllSocios =  $socios->get();

                          $categoria = new categoria();
                          $getAllCategoria = $categoria->get();
                      ?>
                        <ul class="nav navbar-nav pull-right">

                            <li><a href="<?=$urlBase?>">Inicio<div class="line1"></div></a></li>
                            <li><a href="<?=$urlBase?>somos">Somos<div class="line1"></div></a></li>
                            <li><a href="<?=$urlBase?>noticias">Noticias<div class="line1"></div></a></li>
                            <li class="dropdown">
                                <a href="#marcas">Socios C.<i class="fa fa-chevron-down"></i><div class="line1"></div></a>
                                <ul class="dropdown-content">
                                  <?php foreach ($getAllSocios as $socio) { ?>
                                    <li><a href="<?=$urlBase?>socio-detalle/<?=$socio['soc_id']?>"><?=$socio['soc_nombre']?><div class="line1"></div></a></li>
                                  <?php } ?>
                                    <!--<li><a href="<?=$urlBase?>socio-detalle">ASHCROFT<div class="line1"></div></a></li>
                                    <li><a href="<?=$urlBase?>socio-detalle">BROOKS<div class="line1"></div></a></li>
                                    <li><a href="<?=$urlBase?>socio-detalle">DANIEL<div class="line1"></div></a></li>
                                    <li><a href="<?=$urlBase?>socio-detalle">HOKE<div class="line1"></div></a></li>
                                    <li><a href="<?=$urlBase?>socio-detalle">OLIVER VALVES<div class="line1"></div></a></li>
                                    <li><a href="<?=$urlBase?>socio-detalle">PEPPER+FUCHS<div class="line1"></div></a></li>
                                    <li><a href="<?=$urlBase?>socio-detalle">SSI<div class="line1"></div></a></li>-->
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#marcas">Productos<i class="fa fa-chevron-down"></i><div class="line1"></div></a>
                                <ul class="dropdown-content">
                                  <?php foreach ($getAllCategoria as $categoria) { ?>
                                    <li><a href="<?=$urlBase?>productos/<?=$categoria['cat_id']?>" title="<?=$categoria['cat_nombre']?>"><?=$categoria['cat_nombre']?><div class="line1"></div></a></li>
                                  <?php } ?>
                                </ul>
                            </li>
                            <li><a href="<?=$urlBase?>servicios">Servicios<div class="line1"></div></a></li>
                            <li><a href="<?=$urlBase?>contactanos">Contáctanos<div class="line1"></div></a></li>
        </ul>
      </div>
    </nav>
  </header>
</div>
