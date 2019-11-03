<?php
	require_once 'admin-gih/sc-noticias/model/noticias.class.php';

	$id = $_GET['d'];
	$noticias = new noticias();
	$getAllNoticia = $noticias->get();

	$getNoticia = $noticias->getById($id);
	$random = $noticias->getRandom();
?>

<div class="backContent">
	<section id="noticiasDetalle">
    	<article class="container">
        	<div class="row">
						<?php foreach ($getNoticia as $noticia) { ?>
            	<div class="col-sm-10">
                	<div class="introSeccion animated fadeInDown" style="animation-duration: 1s;">
                        <h2><?=$noticia['not_titulo']?></h2>
                    </div>
                </div>
							<?php } ?>

            </div>
        </article>
    </section>
    <!--Subtitulo-->
    <section id="subNoticia" class="animated">
    	<article class="container">
    		<div class="row">
					<?php foreach ($getNoticia as $noticia) { ?>
						<div class="col-md-9 col-sm-7">
							<div class="row">
								<div class="col-sm-4">
									<figure>
										<img src="<?=$urlBase?>admin-gih/sc-noticias/img/<?=$noticia['not_image']?>" class="img-responsive">
									</figure>
								</div>
								<div class="col-sm-8">
									<h3><small>
										<span class="text-uppercase">"<?=$noticia['not_des']?>"</span>
									</small></h3>
								</div>
							</div>
							<div class="txtSuperficie">
							<div class="divisor"><?=$noticia['not_content']?></div>
							<div class="imgSuper">
								<img src="<?=$urlBase?>admin-gih/sc-noticias/img/<?=$noticia['not_image']?>" class="img-responsive">
							</div>
						</div>
						</div>
				<?php } ?>

    			<!--Recomendados-->
					<div class="col-md-3 col-sm-5">
						<h2>Recomendados...</h2>
						<?php foreach ($random as $ran) { ?>

						<div id="listNoticias">

							<figure>
								<img src="<?=$urlBase?>admin-gih/sc-noticias/img/<?=$ran['not_image']?>" class="img-responsive">
							</figure>
							<h5><?=$ran['not_des']?></h5>
							<a href="<?=$urlBase?>detalle-noticia/<?=$ran['not_id']?>" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
						</div>

					<?php } ?>
    			<!--<div class="col-md-3 col-sm-5">
    				<h2>Recomendados...</h2>
    				<div id="listNoticias">
    					<figure>
	    					<img src="img/noticia2.jpg" class="img-responsive">
	    				</figure>
	    				<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h5>
	    				<a href="<?=$urlBase?>detalle-noticia" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
    				</div>
    				<div id="listNoticias">
    					<figure>
	    					<img src="img/noticia1.jpg" class="img-responsive">
	    				</figure>
	    				<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h5>
	    				<a href="<?=$urlBase?>detalle-noticia" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
    				</div>
    			</div>-->
    		</div>
    	</article>
    </section>
</div>
