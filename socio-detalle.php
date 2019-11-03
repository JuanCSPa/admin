<?php
		require_once 'admin-gih/sc-socios/model/socios.class.php';
		require_once 'admin-gih/sc-productos/model/producto.class.php';


		$id = $_GET['d'];
		$socios = new socios();
		$getAllSocios =  $socios->get();

		$producto = new producto();
		$getAllProducto = $producto->get();

		$getSocios = $socios->getById($id);
		$getProducto = $producto->getById($id);
		$random = $producto->getRandom($id);

?>

<div class="backContent">
	<section id="socioDetalle">
    	<article class="container">
        	<div class="row">
            	<div class="col-sm-10">
                	<div class="introSeccion animated fadeInDown" style="animation-duration: 1s;">
										<?php foreach ($getSocios as $socio) { ?>
											<h2><?=$socio['soc_nombre']?></h2>
										<?php } ?>
                  </div>
                </div>
            </div>
        </article>
  </section>

    <!--Detalle Socio-->
    <section id="detalleSocio" class="animated" style="animation-duration: 1.5s;">
    	<article class="container">
    		<div class="row">
					<?php foreach ($getSocios as $socio) { ?>
						<div class="col-sm-2 col-sm-offset-1">
							<figure>
								<img src="<?=$urlBase?>admin-gih/sc-socios/img/<?=$socio['soc_image']?>" class="img-responsive">
							</figure>
						</div>
						<div class="col-sm-7 col-sm-offset-1">
							<h3 class="txtSocios"><?=$socio['soc_nombre']?></h3>
							<h3><small><?=$socio['soc_contenido']?></small></h3>
						</div>
						<div class="col-sm-12">
							<div id="divhr"></div>
						</div>
					<?php } ?>

    			<div class="col-sm-12">
						<?php foreach ($getSocios as $socio) { ?>
    				<h3 class="txtSocios" style="text-transform: initial;"><?=$socio['soc_certitulo']?></h3>
    				<div class="row pd-t-25">
                        <div class="col-sm-12">
                            <?=$socio['soc_cer_content']?>
                        </div>
    					<!--<div class="col-sm-6">
    							<p class="pd-l-20"><i class="fa fa-shield"></i> Operaciones de Stratford, Stratford CT</p>
    							<p class="pd-l-20"><i class="fa fa-shield"></i> Operaciones de Stratford, ISO 17025</p>
    							<p class="pd-l-20"><i class="fa fa-shield"></i> Operaciones en Brasil, Sao Paulo 14001</p>
    							<p class="pd-l-20"><i class="fa fa-shield"></i> Operación Ciudad de México, México </p>
    					</div>
    					<div class="col-sm-6">
    							<p class="pd-l-20"><i class="fa fa-shield"></i> Operación Baesweiler, Alemania</p>
    							<p class="pd-l-20"><i class="fa fa-shield"></i> Operación Brasil, Sao Paulo 9001</p>
    							<p class="pd-l-20"><i class="fa fa-shield"></i> Operación de Singapur, Singapur</p>
    							<p class="pd-l-20"><i class="fa fa-shield"></i> Operación Suzhou, China</p>
    					</div>-->
						<?php } ?>
    				</div>
    			</div>
    		</div>
    	</article>
    </section>

    <!--Productos Relacionados-->
    <section id="productoRelacionados" class="animated" style="animation-duration: 1s;">
    	<article class="container-fluid">
    		<div class="row">
    			<div class="col-sm-12 no-pd-lr">
    				<h2 class="text-center">Productos Relacionados</h2>
    				<hr class="prodRel">
						<?php foreach ($random as $ran) { ?>
							<div style="background:url(<?=$urlBase?>admin-gih/sc-productos/img/<?=$ran['pro_image']?>) no-repeat center center;" class="col-sm-6 col-md-3 galProductos">
								<div class="content-gal">
										<h3><?=$ran['pro_nombre']?></h3>
										<p><?=$ran['pro_desc_corta']?><br>
										<a href="<?=$urlBase?>detalle-producto/<?=$ran['pro_id']?>">Leer más</a></p>
								</div>
							</div>
						<?php } ?>
    			</div>
    		</div>
    	</article>
    </section>
</div>

