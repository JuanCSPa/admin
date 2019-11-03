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
	<!--intro detalle producto-->
	<section id="productoDetalle">
    	<article class="container">
        	<div class="row">
            	<div class="col-sm-10">
                	<div class="introSeccion animated fadeInDown" style="animation-duration: 2s;">
										<?php foreach ($getProducto as $prod) { ?>
											<h2><?=$prod['pro_nombre']?></h2>
										<?php } ?>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <!--informacion producto-->
    <section id="detalleProducto" class="animated">
    	<article class="container">
    		<div class="row">
    			<div class="col-md-5 col-sm-6">
    				<div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                      <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                      <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="item active">
												<?php foreach ($getProducto as $prod) { ?>
													<img src="<?=$urlBase?>admin-gih/sc-productos/img/<?=$prod['pro_image']?>" alt="GIH" style="width:100%;">
												<?php } ?>
                      </div>

                      <div class="item">
												<?php foreach ($getProducto as $prod) { ?>
													<img src="<?=$urlBase?>admin-gih/sc-productos/img/<?=$prod['pro_image_2']?>" alt="GIH" style="width:100%;">
											<?php } ?>
                      </div>

                      <div class="item">
												<?php foreach ($getProducto as $prod) { ?>
													<img src="<?=$urlBase?>admin-gih/sc-productos/img/<?=$prod['pro_image_3']?>" alt="GIH" style="width:100%;">
											<?php } ?>
                      </div>
                    </div>

                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                      <span class="glyphicon glyphicon-chevron-left"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                      <span class="glyphicon glyphicon-chevron-right"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
    			</div>
    			<div class="col-md-7 col-sm-6">
    				<div class="detTxt" style="padding-top:60px;">
							<?php foreach ($getProducto as $prod) { ?>
								<h4><?=$prod['pro_desc_larga']?></h4>
							<?php } ?>

					</div>
					<?php
					$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
					echo "<a href='$url' class='btnBack'><i class='fa fa-chevron-left'></i>  Volver a productos</a>";
					?>
    			</div>
    		</div>
    	</article>
    </section>

    <!--Productos Relacionados-->
    <section id="productoRelacionados" class="animated">
    	<article class="container-fluid">
    		<div class="row">
    			<div class="col-sm-12 no-pd-lr">
    				<h2 class="text-center">Te podria interesar</h2>
    				<hr class="prodRel">
						<?php foreach ($random as $ran) { ?>
						<div style="background:url(<?=$urlBase?>admin-gih/sc-productos/img/<?=$ran['pro_image']?>) no-repeat center center;" class="col-sm-6 col-md-3 galProductos">
							<div class="content-gal">
								<h3><?=$ran['pro_nombre']?></h3>
								<p><?=$ran['pro_desc_corta']?><br>
							vdg4	<a href="<?=$urlBase?>detalle-producto/<?=$ran['pro_id']?>">Leer más</a></p>
							</div>
						</div>
						<?php } ?>
    			</div>
    		</div>
    	</article>
    </section>
</div>
