<?php

session_start();

if(empty($_SESSION['user'])){

		echo '<script>location.href = "../../index.php";</script>';}

include "../../functions/header.php";

?>
<style>
	.kv-file-zoom {
		display: none;
		visibility: hidden;
	}
</style>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.3/css/fileinput.min.css" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.3/js/fileinput.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.3/js/locales/es.js"></script>
<div class="box box-info" id="from-view">
									<form role="form" action="../control/video.insert.php" name="frm_promocion" id="frm_promocion" method="post" enctype="multipart/form-data">
							        	<div class="box-body">
							                <div class="form-group">
								    			<div class="col-xs-6">
													<h2>Nuevo Video</h2>
								    				<label>Nombre </label>
														<input type="text" class="form-control" name="nombre" placeholder="Nombre del Video" required>
														<hr>
													<label>URL Video</label>
													<input type="text" name="url" placeholder="URL del Video" class="form-control" required><br>
													<label>Imagen</label>
										                <input type="file" name="imagen" id="imagen" class="file">
										                <small>Imagen de 600px por 400px</small>
										            <div class="box-body" id="cloFrom-view" style="float: right;" >
							   	            			<button type="reset" class="btn btn-danger" onclick="window.history.back();" title="Cancelar">
							       		        			<i class="fa fa-close"> Cancelar</i>
														</button>
							   	            			<button type="submit" class="btn btn-info" title="Guardar">
							       		        			<i class="fa fa-save"> Guardar</i>
														</button>
													</div>
								                </div>
								    			<div class="col-xs-6">
								                </div>
							                </div>
							            </div>
									</form>
								</div>
<script type="text/javascript">
	   $(".file").fileinput(
	   {
		    language: "es",
		    allowedFileExtensions: ["jpg", "png", "gif", "jpeg"],
		    showCaption: false,
		    showUpload: false,
		    browseLabel: "Imagen...",
		    browseIcon: " <i class=\"fa fa-picture-o\"></i>",
		    removeClass: "btn btn-danger",
		    removeLabel: "Eliminar",
		    removeIcon: "<i class=\"fa fa-trash\"></i>"
		});
	</script>
<?php include "../../functions/footer.php"; ?>
