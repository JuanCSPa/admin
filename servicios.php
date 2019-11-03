<?php
    require_once 'admin-gih/sc-servicios/model/servicios.class.php';
    $servicios = new servicios();
    $getAllServ = $servicios->get();
?>
<div class="backContent">
	<section id="servicioIntro">
    	<article class="container">
        	<div class="row">
            	<div class="col-sm-10">
                	<div class="introSeccion animated fadeInDown" style="animation-duration: 1s;">
                        <h2>Servicios</h2>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <!--list Servicios-->

    <?php
        $a = 1;
        foreach ($getAllServ as $key => $value) {
            if(($a%2) == 1){ ?>
                <section id="listServicios" class="animated">
                    <article class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <figure>
                                            <img src="<?=$urlBase?>admin-gih/sc-servicios/img/<?=$value['ser_image']?>" class="img-responsive">
                                        </figure>
                                    </div>
                                    <div class="col-sm-6">
                                        <h2><?=$value['ser_titulo']?></h2>
                                        <hr class="hrListRg">
                                        <?=$value['ser_content']?>
                                        <!--<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                        <p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        <p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        <p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        <p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                        <p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>-->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </article>
                </section>
                <!--container division hr-->
                <section id="hrDivision">
                    <article class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12 no-pd-lr">
                                <div id="divhr" style="border-bottom-color: #0d1e4b;"></div>
                            </div>
                        </div>
                    </article>
                </section>
            <?php }else{ ?>
                <!--list servicios-->
                    <section id="listServicios" class="impar animated">
                        <article class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h2><?=$value['ser_titulo']?></h2>
                                            <hr class="hrListLt">
                                            <?=$value['ser_content']?>
                                            <!--<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                            <p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            <p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            <p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            <p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            <p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>-->
                                        </div>
                                        <div class="col-sm-6">
                                            <figure>
                                                <img src="<?=$urlBase?>admin-gih/sc-servicios/img/<?=$value['ser_image']?>" class="img-responsive">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </section>
                    <!--container division hr-->
                    <section id="hrDivision">
                        <article class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12 no-pd-lr">
                                    <div id="divhr" style="border-bottom-color: #0d1e4b;"></div>
                                </div>
                            </div>
                        </article>
                    </section>
            <?php }
            $a++;
        }
    ?>

    
    

    
    <!--list Servicios-->
    <!--<section id="listServicios" class="animated">
    	<article class="container">
    		<div class="row">
    			<div class="col-sm-12">
    				<div class="row">
    					<div class="col-sm-6">
    						<figure>
    							<img src="img/servicio-instalacion.jpg" class="img-responsive">
    						</figure>
    					</div>
    					<div class="col-sm-6">
    						<h2>Instalacion y puesta en marcha de instrumentos</h2>
    						<hr class="hrListRg">
    						<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    						<p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
    						<p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
    						<p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
    						<p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
    						<p class="mg-l-20 pBorder"><i class="fa fa-circle"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>

    					</div>
    				</div>
    			</div>
    		</div>
    	</article>
    </section>-->
</div>
