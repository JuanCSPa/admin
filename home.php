<?php
    require_once 'admin-gih/sc-escritorio/model/escritorio.class.php';
    require_once 'admin-gih/sc-industria/model/industria.class.php';
    require_once 'admin-gih/sc-mision/model/empresa.class.php';
    require_once 'admin-gih/sc-movil/model/movil.class.php';
    require_once 'admin-gih/sc-compania/model/compania.class.php';


    $industria = new industria();
    $getAllIndustria = $industria->get();

    $escritorio = new escritorio();
    $getAllSlideEscritorio = $escritorio->get();

    $empresa = new empresa();
    $getAllEmpresa = $empresa->get();

    $movil = new movil();
    $getMovil = $movil->get();

    $compania = new compania();
    $getAllCompania = $compania->get();

    $url1Esc = ($getAllSlideEscritorio[0]['esc_url'] != "") ? $getAllSlideEscritorio[0]['esc_url']: '#';
    $url1Mv = ($getMovil[0]['mv_url'] != "") ? $getMovil[0]['mv_url']: '#';
?>
<div class="backContent">
      <!--slide-->
    <section id="slideLg">
      <div id="myCarousel" class="carousel slide hidden-xs" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <!--<li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>-->
          <?php
            for ($i=1; $i < count($getAllSlideEscritorio); $i++) { ?>
              <li data-target="#myCarousel" data-slide-to="<?=$i?>"></li>
            <?php }?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">

          <div class="item active">
            <img src="admin-gih/sc-escritorio/img/<?=$getAllSlideEscritorio[0]['esc_image']?>" alt="Grupo Industrial Hegues" style="width:100%;">
            <div class="carousel-caption animated fadeInDown" style="animation-duration: 2s; max-width: 100%;">
              <div class="row">
                <div class="col-sm-7 col-lg-6">
                  <h2 class="color-dorado"><?=$getAllSlideEscritorio[0]['esc_titulo']?></h2>
                  <p><?=$getAllSlideEscritorio[0]['esc_des']?></p>
                  <a href="<?=$url1Esc?>" class="btnIr">Ver mas ...</a>
                </div>
              </div>
            </div>
          </div>

          <!--comienza slider dinamico-->
          <?php for($o = 1; $o< count($getAllSlideEscritorio); $o++) {
              $url = ($getAllSlideEscritorio[$o]['esc_url'] != "") ? $getAllSlideEscritorio[$o]['esc_url'] : '#';
            ?>
                <div class="item">
                  <img src="admin-gih/sc-escritorio/img/<?=$getAllSlideEscritorio[$o]['esc_image']?>" alt="Grupo Industrial Hegues" style="width:100%;">
                  <div class="carousel-caption animated fadeInDown" style="animation-duration: 2s; max-width: 100%;">
                    <div class="row">
                      <div class="col-sm-7 col-lg-6">
                        <h2 class="color-dorado"><?=$getAllSlideEscritorio[$o]['esc_titulo']?></h2>
                        <p><?=$getAllSlideEscritorio[$o]['esc_des']?></p>
                        <a href="<?=$url?>" class="btnIr">Ver mas ...</a>
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <div id="myCarousel2" class="carousel slide visible-xs" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel2" data-slide-to="0" class="active"></li>
          <?php
            $counSlide = count($getMovil);
            for($k = 1; $k < $counSlide; $k++){
              echo '<li data-target="#myCarousel2" data-slide-to="'.$k.'"></li>';
            }
          ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <!--inicio-->
          <div class="item active">
            <img src="admin-gih/sc-movil/img/<?=$getMovil[0]['mv_image']?>" alt="Grupo Industrial Hegues" style="width:100%;">
            <div class="carousel-caption animated fadeInDown" style="animation-duration: 2s;">
              <h3 class="color-dorado"><?=$getMovil[0]['mv_titulo']?></h3>
                <p><?=$getMovil[0]['mv_des']?></p>
                <a href="<?=$url1Mv?>" class="btnIr">Ir a ...</a>
            </div>
          </div>
        <!--fin-->
        <?php for($m = 1; $m < $counSlide; $m++){
            $url = ($getMovil[$m]['mv_url'] != "") ? $getMovil[$m]['mv_url'] : '#';
          ?>
          <div class="item">
            <img src="admin-gih/sc-movil/img/<?=$getMovil[$m]['mv_image']?>" alt="Grupo Industrial Hegues" style="width:100%;">
            <div class="carousel-caption animated fadeInDown" style="animation-duration: 2s;">
              <h3 class="color-dorado"><?=$getMovil[$m]['mv_titulo']?></h3>
                <p><?=$getMovil[$m]['mv_des']?></p>
                <a href="<?=$url?>" class="btnIr">Ir a ...</a>
            </div>
          </div>
          <?php } ?>

      </div>
    </section>
    <!--Mision y Visión-->
    <section id="visionMision" class="animated" style="animation-duration:2s;">
      <article class="container">
        <div class="row mg-b-30 mg-t-30">
          <div class="col-md-5">
            <h1>Grupo<br> Industrial<br> Hegues<br><div class="hr-aniversario col-sm-2 col-sm-pull-3 pd-t-10"></div></h1>
            </div>

    <!--Nosotros-->
    <?php foreach ($getAllEmpresa as $key => $value) { ?>

              <div class="col-md-7">
              <h3 class="txtMision"><?=$value['emp_mision']?></h3>
              <p><?=$value['emp_contmi']?></p>
              <h3 class="txtMision"><?=$value['emp_vision']?></h3>
              <p><?=$value['emp_contvi']?></p>
              <br>
              <!--<a href="#" class="btnGeneral">Ver mas ...</a>-->
              </div>
              <div class="col-sm-12">
              <div id="divhr"></div>
            </div>
        <?php } ?>
      </div>
    </article>
  </section>


<!----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!--industrias-->
    <section id="noticias" class="animated">
      <article class="container-fluid">
        <div class="row">
        <div class="col-sm-12 mg-t-15 mg-b-15 text-center owl-carousel owl-theme" id="slideMarcas">
        	<?php foreach ($getAllIndustria as $key => $value) { ?>
                  <div class="zoom_box item">
                     <a href="<?=$value['ind_url']?>">
                       <div class="photo">
                         <img class="scale-with-grid img-responsive" src="admin-gih/sc-industria/img/<?=$value['ind_image']?>">
                          </div>
                           <div class="desc" style="background-color:rgba(7, 19, 35, 0.8);">
                            <div class="desc_wrap" style="padding-top: 120px;"><div class="desc_img">
                              <?=$value['ind_icono']?>
                            </div>
                           <div class="desc_txt"><?=$value['ind_titulo']?></div>
                         </div>
                       </div>
                     </a>
                   </div>
        	<?php } ?>
        </div>
      </div>
    </article>
  </section>
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <!--contenido de relleno-->

    <section class="introNosotros">
      <article class="container">
        <div class="row">
          <div class="col-sm-12 mg-b-20">
            <?php foreach ($getAllCompania as $key => $value) { ?>
              <h2 class="text-center text-nuestra"><?=$value['com_titulopri']?></h2>
              <h5 class="text-center h5Nuesta"><?=$value['com_subtitulo']?></h5>
            <?php } ?>
          </div>
          <div class="col-sm-6" style="min-height: 250px;">
            <div class="row">
              <div class="col-sm-3 col-lg-2 cntr">
                <i class="fa fa-check color-dorado"></i>
              </div>
              <div class="col-sm-9 col-lg-10">
                  <?=$getAllCompania[0]['com_contentuno']?>
              </div>
            </div>
          </div>
          <div class="col-sm-6" style="min-height: 250px;">
            <div class="row">
              <div class="col-sm-3 col-lg-2 cntr">
                <i class="fa fa-shield color-dorado"></i>
              </div>
              <div class="col-sm-9 col-lg-10">
                <?=$getAllCompania[0]['com_contentres']?>
              </div>
            </div>
          </div>
          <div class="col-sm-6" style="min-height: 250px;">
            <div class="row">
              <div class="col-sm-3 col-lg-2 cntr">
                <i class="fa fa-cog color-dorado"></i>
              </div>
              <div class="col-sm-9 col-lg-10">
                <?=$getAllCompania[0]['com_contentdos']?>
              </div>
            </div>
          </div>
          
          <div class="col-sm-6" style="min-height: 250px;">
            <div class="row">
              <div class="col-sm-3 col-lg-2 cntr">
                <i class="fa fa-user color-dorado"></i>
              </div>
              <div class="col-sm-9 col-lg-10">
                <?=$getAllCompania[0]['com_contentcuatro']?>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div id="divhr"></div>
          </div>
        </div>
      </article>
    </section>

    <!--banda aniversaria-->
    <section id="bandaAniversario" class="animated">
      <article class="container">
        <div class="row bor-img">
          <div class="col-sm-2">
            <figure>
              <img src="img/aniversario-30.png" class="img-responsive mg-t-15">
            </figure>
          </div>
          <div class="col-sm-8 col-sm-offset-1">
            <h2 class="text-center txtSocios">
              "Celebramos nuestro 30 aniversario"
              <div class="hr-aniversario"></div>
            </h2>
          </div>
        </div>
      </article>
    </section>
</div>
