<?php
	require_once 'admin-gih/sc-marcas/model/marca.class.php';
	require_once 'admin-gih/sc-productos/model/producto.class.php';
	require_once 'admin-gih/sc-categorias/model/categoria.class.php';

	$id = $_GET['d'];

	$producto = new producto();
	$getAllProducto = $producto->get();

	$categoria = new categoria();
	$getAllCategoria = $categoria->get();

	$getCategoria = $categoria->getById($id);

	$marca = new marca();
	$getAllMarca = $marca->get();

	$getProducto = $producto->getByIdCat($id);

?>

<div class="backContent">
	<!--Intro Productos-->
	<section id="productosIntro">
    	<article class="container">
        	<div class="row">
            	<div class="col-sm-10">
                	<div class="introSeccion animated fadeInDown" style="animation-duration: 2s;">
										<?php foreach ($getCategoria as $category) { ?>
											<h2>Productos <?=$category['cat_nombre']?></h2>
										<?php }	?>
                    </div>
                </div>
            </div>
        </article>
    </section>

		<section id="listProductos">
			<article class="container">
				<div class="row">
			<?php foreach ($getProducto as $product) { ?>
				<!--list Productos-->
							<div class="col-md-4 col-sm-6 productos pd-t-15 pd-b-15">
								<figure>
									<img src="<?=$urlBase?>admin-gih/sc-productos/img/<?=$product['pro_image']?>" class="img-responsive">
								</figure>
								<div class="content-pro">
									<h4><?=$product['pro_nombre']?></h4>
									<p><?=$product['pro_desc_corta']?><br>
									<a href="<?=$urlBase?>detalle-producto/<?=$product['pro_id']?>">Ver detalle</a></p>
								</div>
							</div>
			<?php } ?>
		</div>
	</article>
</section>

    <!--list Productos-->
    <!--<section id="listProductos">
    	<article class="container">
    		<div class="row">
    			<div class="col-md-4 col-sm-6 productos pd-t-15 pd-b-15">
    				<figure>
    					<img src="img/producto2.jpg" class="img-responsive">
    				</figure>
    				<div class="content-pro">
                        <h4>Termómetros bimetálicos</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
                        <a href="<?=$urlBase?>detalle-producto">Ver detalle</a></p>
                    </div>
    			</div>
    			<div class="col-md-4 col-sm-6 productos pd-t-15 pd-b-15">
    				<figure>
    					<img src="img/producto3.jpg" class="img-responsive">
    				</figure>
    				<div class="content-pro">
                        <h4>Rotámetros de tubo de vidrio</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
                        <a href="<?=$urlBase?>detalle-producto">Ver detalle</a></p>
                    </div>
    			</div>
    			<div class="col-md-4 col-sm-6 productos pd-t-15 pd-b-15">
    				<figure>
    					<img src="img/producto4.jpg" class="img-responsive">
    				</figure>
    				<div class="content-pro">
                        <h4>Medidores magnéticos de nivel</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
                        <a href="<?=$urlBase?>detalle-producto">Ver detalle</a></p>
                    </div>
    			</div>
    			<div class="col-md-4 col-sm-6 productos pd-t-15 pd-b-15">
    				<figure>
    					<img src="img/producto5.jpg" class="img-responsive">
    				</figure>
    				<div class="content-pro">
                        <h4>Manómetros industriales</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
                        <a href="<?=$urlBase?>detalle-producto">Ver detalle</a></p>
                    </div>
    			</div>
    			<div class="col-md-4 col-sm-6 productos pd-t-15 pd-b-15">
    				<figure>
    					<img src="img/producto6.jpg" class="img-responsive">
    				</figure>
    				<div class="content-pro">
                        <h4>Válvulas de doble bloqueo</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
                        <a href="<?=$urlBase?>detalle-producto">Ver detalle</a></p>
                    </div>
    			</div>
    			<div class="col-md-4 col-sm-6 productos pd-t-15 pd-b-15">
    				<figure>
    					<img src="img/producto2.jpg" class="img-responsive">
    				</figure>
    				<div class="content-pro">
                        <h4>Termómetros bimetálicos</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
                        <a href="<?=$urlBase?>detalle-producto">Ver detalle</a></p>
                    </div>
    			</div>
    			<div class="col-md-4 col-sm-6 productos pd-t-15 pd-b-15">
    				<figure>
    					<img src="img/producto3.jpg" class="img-responsive">
    				</figure>
    				<div class="content-pro">
                        <h4>Rotámetros de tubo de vidrio</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
                        <a href="<?=$urlBase?>detalle-producto">Ver detalle</a></p>
                    </div>
    			</div>
    			<div class="col-md-4 col-sm-6 productos pd-t-15 pd-b-15">
    				<figure>
    					<img src="img/producto4.jpg" class="img-responsive">
    				</figure>
    				<div class="content-pro">
                        <h4>Medidores magnéticos de nivel</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
                        <a href="<?=$urlBase?>detalle-producto">Ver detalle</a></p>
                    </div>
    			</div>
    			<div class="col-md-4 col-sm-6 productos pd-t-15 pd-b-15">
    				<figure>
    					<img src="img/producto5.jpg" class="img-responsive">
    				</figure>
    				<div class="content-pro">
                        <h4>Manómetros industriales</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>
                        <a href="<?=$urlBase?>detalle-producto">Ver detalle</a></p>
                    </div>
    			</div>
    		</div>
    	</article>
    </section>-->
</div>
