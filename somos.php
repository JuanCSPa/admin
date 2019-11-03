<?php
  require_once 'admin-gih/sc-somos/model/somos.class.php';
  require_once 'admin-gih/sc-socios/model/socios.class.php';

  $somos = new somos();
  $getAllSomos = $somos->get();

  $socios = new socios();
  $getAllSocios =  $socios->get();

	require_once 'admin-gih/sc-somos/model/caracteristicas.class.php';
	$caracteristicas = new caracteristicas();
	$getAllCar = $caracteristicas->get();

	require_once 'admin-gih/sc-industria/model/industria.class.php';
	$industria = new industria();
	$getAllInd = $industria->get();
?>


<div class="backContent">
    <!-- NOSOTROS -->
    <section id="nosotrosIntro">
    	<article class="container">
        	<div class="row">
            	<div class="col-sm-10">
                	<div class="introSeccion animated fadeInDown" style="animation-duration: 1s;">
                        <h2><small>Conoce más de</small><br>
                        Grupo Industrial Hegues, S.A. de C.V.</h2>

                    </div>
                </div>
            </div>
        </article>
    </section>

      <!--resumen texto-->
      <section id="somos">
      <section id="txtIntro">
          <article class="container">
              <div class="row">
                  <div class="col-sm-9">
                      <div><?=$getAllSomos[0]['somos_titulo']?></div>
                  </div>
              </div>
          </article>
      </section>

      <!--contenido historia-->
      <section id="historia" class="animated">
          <article class="container">
              <div class="row">
                  <div class="col-sm-4">
                      <figure>
                          <img src="admin-gih/sc-somos/img/<?=$getAllSomos[0]['somos_image']?>" class="img-responsive">
                      </figure>
                  </div>
                  <div class="col-sm-8">
                      <?=$getAllSomos[0]['somos_desc']?>
                  </div>
                  <div class="col-sm-12">
                    <div id="divhr"></div>
                  </div>
              </div>
          </article>
      </section>
    </section>

    <!--industrias-->
    <section id="industria">
        <article class="container">
            <div class="row destacadoContent">
                <div id="contLeft" class="col-sm-6 animated bounceInLeft" style="opacity: 1;">
                    <div class="txtDestacado">
                        <h2><?=$getAllSomos[1]['somos_titulo']?> </h2>
                        <div class="row">
                          <?php
								$media = count($getAllInd) / 2;
						  		$imp1 = '';
						  		$imp2 = '';
						  		for($i = 0; $i < count($getAllInd); $i++){
									if($i <= $media){
										$imp1 .='<p class="pd-l-20"><i class="fa fa-caret-right"></i> &nbsp;'.$getAllInd[$i]['ind_titulo'].'</p>';
									}else{
										$imp2 .='<p class="pd-l-20"><i class="fa fa-caret-right"></i> &nbsp;'.$getAllInd[$i]['ind_titulo'].'</p>';
									}
								}
							?>
                           
                            <div class="col-md-6">
                                <?=$imp1?>
                                <!--<p class="pd-l-20"><i class="fa fa-building"></i> &nbsp;Construcción</p>
                                <p class="pd-l-20"><i class="fa fa-flash"></i> &nbsp;Eléctrica</p>
                                <p class="pd-l-20"><i class="fa fa-stethoscope"></i> &nbsp;Farmaceutica</p>-->
                            </div>
                            <div class="col-md-6">
                               <?=$imp2?>
                                <!--<p class="pd-l-20"><i class="fa fa-diamond"></i> &nbsp;Minera</p>
                                <p class="pd-l-20"><i class="fa fa-cogs"></i> &nbsp;Petrolera</p>
                                <p class="pd-l-20"><i class="fa fa-file-o"></i> &nbsp;Pulpa y papel</p>
                                <p class="pd-l-20"><i class="fa fa-flask"></i> &nbsp;Química</p>-->
                            </div>
                        </div>
                    </div>
                </div>
            
                <div id="contRight" class="col-sm-6 imgDestacado animated bounceInRight" style="opacity: 1;">
                    <div class="txtDestacado">
                        <h2><?=$getAllSomos[1]['somos_desc']?> </h2>
                        <div class="row">
                            <div class="col-sm-6">
                               <?php
									foreach($getAllCar as $caract){
										echo '<p class="pd-l-20"><i class="fa fa-caret-right"></i> &nbsp;'.$caract['car_nombre'].'</p>';
									}
								?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>

<!--Socios-->
 <!--Nuestro socios-->

    <section id="marcas" class="animated">
      <article class="container">
        <div class="row">
          <div class="col-sm-12">
            <h2 class="text-center txtSocios" style="margin: 0px;"> Nuestros  Socios</h2>
          </div>
        </div>
           <div class="row" style="margin:auto; padding:0; border:none">
            <div class="col-sm-12 text-center mg-t-30 mg-b-30">
                <script type="text/javascript" src="<?=$urlBase?>js/jssor.slider.min.js"></script>
                <!-- use jssor.slider.debug.js instead for debug -->
                <script>
                    jQuery(document).ready(function ($) {

                        var jssor_1_options = {
                          $AutoPlay: true,
                          $AutoPlaySteps: 5,
                          $SlideDuration: 200,
                          $SlideWidth: 220,
                          $SlideSpacing: 50,
                          $Cols: 5,
                          $ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$,
                            $Steps: 5
                          },
                          $BulletNavigatorOptions: {
                            $Class: $JssorBulletNavigator$,
                            $SpacingX: 1,
                            $SpacingY: 1
                          }
                        };

                        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
                        function ScaleSlider() {
                            var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                            if (refSize) {
                                refSize = Math.min(refSize, 1000);
                                jssor_1_slider.$ScaleWidth(refSize);
                            }
                            else {
                                window.setTimeout(ScaleSlider, 30);
                            }
                        }
                        ScaleSlider();
                        $(window).bind("load", ScaleSlider);
                        $(window).bind("resize", ScaleSlider);
                        $(window).bind("orientationchange", ScaleSlider);
                        //responsive code end
                    });
                </script>

                <style>
                    .jssorb03 {
                        position: absolute;
                    }
                    .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
                        position: absolute;
                        width: 25px;
                        height: 25px;
                        text-align: center;
                        line-height: 21px;
                        color: white;
                        font-size: 12px;
                        background: url('img/b03.png') no-repeat;
                        overflow: hidden;
                        cursor: pointer;
                    }
                    .jssorb03 div { background-position: -5px -4px; }
                    .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
                    .jssorb03 .av { background-position: -65px -4px; }
                    .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }

                    .jssora03l, .jssora03r {
                        display: block;
                        position: absolute;
                        /* size of arrow element */
                        width: 100px;
                        height: 100px;
                        cursor: pointer;
                        background: url('img/a03.png') no-repeat;
                        overflow: hidden;
                    }
                    .jssora03l { background-position: -3px -33px; }
                    .jssora03r { background-position: -63px -33px; }
                    .jssora03l:hover { background-position: -123px -33px; }
                    .jssora03r:hover { background-position: -183px -33px; }
                    .jssora03l.jssora03ldn { background-position: -243px -33px; }
                    .jssora03r.jssora03rdn { background-position: -303px -33px; }


                    #jssor_1{
                        position: relative; margin: 0 auto; top: 0px; left: 0px; width: 1000px; height: 220px; overflow: hidden; visibility: hidden;
                        }
                    #jssor_1inter{
                        cursor: default; position: relative; top: 0px; left: 0px; width: 1000px; height: 220px; overflow: hidden;
                        }
                    @media screen and (min-width:1300px){
              #jssor_1inter{
                        left:5%;
              }
            }

            .slideMarcas{
              padding: 15px;
              background: #efefef;
            }
                </style>


                <div id="jssor_1" style="margin:auto">
                    <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                        <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                        <div style="position:absolute;display:block;top:0px;left:0px;width:100%;height:100%;"></div>
                    </div>
                    <div id="jssor_1inter" data-u="slides">
                      <?php foreach ($getAllSocios as $key => $value) { ?>
                        <div class="slideMarcas" style="display: none;">
                            <img data-u="image" src="admin-gih/sc-socios/img/<?=$value['soc_image']?>" />
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        </article>
    </section>
</div>
