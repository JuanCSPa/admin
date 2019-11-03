<?php
  require_once 'admin-gih/sc-noticias/model/noticias.class.php';

  $noticias = new noticias();
  $getAllNoticia = $noticias->get();

?>

<div class="backContent">
	<!-- NOSOTROS -->
    <section id="noticiasIntro">
    	<article class="container">
        	<div class="row">
            	<div class="col-sm-10">
                	<div class="introSeccion animated fadeInDown" style="animation-duration: 1s;">
                        <h2>Noticias</h2>
                    </div>
                </div>
            </div>
        </article>
    </section>

        <!--resumen texto-->
        <section id="txtIntro">
            <article class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div>Mantente informado de lo que sucede en GIH</div>
                    </div>
                </div>
            </article>
        </section>

<section id="listNoticias">
  <article class="container">
    <div class="row">

              <!--Inicia Noticias-->
  <?php foreach ($getAllNoticia as $noticia) { ?>
          <div class="col-sm-6 col-md-4 col-lg-3 animated fadeInLeft" style="animation-duration: 2s;">
            <figure>
              <img src="admin-gih/sc-noticias/img/<?=$noticia['not_image']?>" class="img-responsive">
            </figure>
            <h5><?=$noticia['not_des']?></h5>
            <div style="margin-bottom: 45px;">
              <a href="<?=$urlBase?>detalle-noticia/<?=$noticia['not_id']?>" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
            </div>
          </div>
  <?php } ?>
    </div>
  </article>
</section>

    <!--lista de noticias-->
    <!--<section id="listNoticias">
    	<article class="container">
    		<div class="row">

    			<div class="col-sm-6 col-md-4 col-lg-3 animated fadeInLeft" style="animation-duration: 2s;">
    				<figure>
    					<img src="img/noticia1.jpg" class="img-responsive">
    				</figure>
    				<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h5>
    				<div style="margin-bottom: 45px;">
    					<a href="<?=$urlBase?>detalle-noticia" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
    				</div>
    			</div>

    			<div class="col-sm-6 col-md-4 col-lg-3 animated fadeInLeft" style="animation-duration: 2s;">
    				<figure>
    					<img src="img/noticia2.jpg" class="img-responsive">
    				</figure>
    				<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h5>
    				<div style="margin-bottom: 45px;">
    					<a href="<?=$urlBase?>detalle-noticia" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
    				</div>
    			</div>

    			<div class="col-sm-6 col-md-4 col-lg-3 animated fadeInLeft" style="animation-duration: 2s;">
    				<figure>
    					<img src="img/noticia1.jpg" class="img-responsive">
    				</figure>
    				<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h5>
    				<div style="margin-bottom: 45px;">
    					<a href="<?=$urlBase?>detalle-noticia" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
    				</div>
    			</div>

    			<div class="col-sm-6 col-md-4 col-lg-3 animated fadeInLeft" style="animation-duration: 2s;">
    				<figure>
    					<img src="img/noticia2.jpg" class="img-responsive">
    				</figure>
    				<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h5>
    				<div style="margin-bottom: 45px;">
    					<a href="<?=$urlBase?>detalle-noticia" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
    				</div>
    			</div>

    			<div class="col-sm-6 col-md-4 col-lg-3 animated fadeInRight" style="animation-duration: 2s;">
    				<figure>
    					<img src="img/noticia1.jpg" class="img-responsive">
    				</figure>
    				<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h5>
    				<div style="margin-bottom: 45px;">
    					<a href="<?=$urlBase?>detalle-noticia" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
    				</div>
    			</div>

    			<div class="col-sm-6 col-md-4 col-lg-3 animated fadeInRight" style="animation-duration: 2s;">
    				<figure>
    					<img src="img/noticia2.jpg" class="img-responsive">
    				</figure>
    				<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h5>
    				<div style="margin-bottom: 45px;">
    					<a href="<?=$urlBase?>detalle-noticia" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
    				</div>
    			</div>

    			<div class="col-sm-6 col-md-4 col-lg-3 animated fadeInRight" style="animation-duration: 2s;">
    				<figure>
    					<img src="img/noticia1.jpg" class="img-responsive">
    				</figure>
    				<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h5>
    				<div style="margin-bottom: 45px;">
    					<a href="<?=$urlBase?>detalle-noticia" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
    				</div>
    			</div>

    			<div class="col-sm-6 col-md-4 col-lg-3 animated fadeInRight" style="animation-duration: 2s;">
    				<figure>
    					<img src="img/noticia2.jpg" class="img-responsive">
    				</figure>
    				<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h5>
    				<div style="margin-bottom: 45px;">
    					<a href="<?=$urlBase?>detalle-noticia" class="btnNoticia"><i class="fa fa-plus"></i> Leer mas...</a>
    				</div>
    			</div>

    		</div>
    	</article>
    </section>-->
</div>
