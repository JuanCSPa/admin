<script src='https://www.google.com/recaptcha/api.js'></script>

<div class="backContent">
	<!--intro detalle producto-->
	<section id="contactanos">
    	<article class="container">
        	<div class="row">
            	<div class="col-sm-10">
                	<div class="introSeccion animated fadeInDown" style="animation-duration: 2s;">
                        <h2>Contactanos</h2>
                    </div>
                </div>
            </div>
        </article>
    </section>

    <!--google maps-->
    <section id="googlemaps" class="animated">
    	<article class="container-fluid">
    		<div class="row">
    			<div class="col-sm-12 no-pd-lr" id="map">
    			</div>
    		</div>
    	</article>
    </section>
	<script src="js/mapa.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTFhH-eZiooB9paBTFIPVvHi-UEG1NWbo&callback=initMap" async defer></script>
    <section id="formContacto" class="animated">
    	<article class="container-fluid">
    		<div class="row">
    			<div class="col-sm-5 col-sm-offset-1">
    				<h2>Dirección</h2>
    				<h5>Av. Nuevo Leon 254 - 304, Col. Hipódromo, C.P. 06100 <br>México D.F.</h5>
    				<div style="border-left: 5px solid #E6E6E6;" class="pd-l-30">
    					<h3 class="grupo">Grupo Industrial Hegues</h3>
    					<p class="direccion"><i class="fa fa-map-marker"></i>Av. Nuevo Leon 254 - 304, <br>Col. Hipódromo, C.P. 06100 <br>México D.F.</p>
    					<p><a href="mailto:gih@hegues.com.mx"><i class="fa fa-envelope"></i> gih@hegues.com.mx</a></p>
    					<div class="row">
    						<div class="col-xs-6">
    							<p><a href="tel:55152203"><i class="fa fa-phone"></i> 5515-2203</a></p>
    							<p><a href="tel:52717755"><i class="fa fa-phone"></i> 5271-7755</a></p>
    						</div>
    						<div class="col-xs-6">
    							<p><a href="tel:52735613"><i class="fa fa-phone"></i> 5273-5613</a></p>
    							<p><a href="tel:52730069"><i class="fa fa-phone"></i> 5273-0069</a></p>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm-6" style="background: #e4c67b; padding: 0% 9% 5% 3%;">
    				<h2>Contacto</h2>
    				<form autocomplete="off" action="#" enctype="multipart/form-data" id="contactoForm" name="contactoForm" method="post">
    					<div class="row">
    						<div class="col-sm-6">
    							<input type="text" name="nombre" id="nombre" class="form-control" required placeholder="Nombre...">
    						</div>
    						<div class="col-sm-6">
    							<input type="email" name="email" id="email" class="form-control" required placeholder="E-mail...">
    						</div>
    					</div>

    					<div class="row">
    						<div class="col-sm-6">
    							<input type="text" name="direccion" id="direccion" class="form-control" required placeholder="Direccion...">
    						</div>
    						<div class="col-sm-6">
    							<input type="text" name="cp" id="cp" class="form-control" required placeholder="C. P.">
    						</div>
    					</div>

    					<div class="row">
    						<div class="col-sm-6">
    							<input type="tel" name="telefono" id="telefono" class="form-control" required placeholder="Telefono...">
    						</div>
    						<div class="col-sm-6">
    							<input type="text" name="asunto" id="asunto" class="form-control" required placeholder="Asunto...">
    						</div>
    					</div>

    					<textarea class="form-control" id="mensaje" name="mensaje" required placeholder="Mensaje..." rows="8"></textarea>
    					<div class="g-recaptcha" data-sitekey="6Le-A1sUAAAAAJnM0adtO38PKuersrxvOsk1G_kd"></div>
    					<a class="btnNoticia" href="javascript:saveRegistro();"><i class="fa fa-send"></i> Enviar</a>
    					<div class="col-sm-10 col-sm-offset-2" id="msgBox"></div>
    				</form>
    			</div>
    		</div>
    	</article>
    </section>
</div>
<script src="js/contacto.js"></script>
