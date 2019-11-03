<?php

session_start();

if(empty($_SESSION['user'])){

		echo '<script>location.href = "../../index.php";</script>';

	}

include "../../functions/header.php";

include "../../functions/conexion.class.php";

include "../model/video.class.php";


$id = $_GET['video'];

$video = new video();

$datos = $video->getById($id);

$regis = $datos[0];
$imagen1 = 'sin_imagen.jpg';
if($regis['vid_image'] != null){
	$imagen1 = $regis['vid_image'];
}
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

									<form role="form" action="../control/video.update.php" name="frm_promocion" id="frm_promocion" method="post" enctype="multipart/form-data">

							        	<div class="box-body">

							                <div class="form-group">

								    			<div class="col-xs-6">

													<h2>Editar Video</h2>

								    				<label>Nombre </label>
														<input type="text" class="form-control" name="nombre" placeholder="Nombre del Video" value="<?=$regis['vid_nombre']?>" required>

														<hr>
													<label>URL Video</label>
													<input type="text" name="url" placeholder="URL del Video" class="form-control" required value="<?=$regis['vid_url']?>"> <br>
													<label>Imagen</label>
														<input type="file" name="imagen" id="imagen" class="file">
														<small>Imagen de 600px por 400px</small>
										                <input type="hidden" name="idvideo" value="<?=$regis['vid_id']?>">
										                <input type="hidden" name="actual" value="<?=$regis['vid_image']?>">
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
<script>
	$(".file").fileinput(
	   {
	   		autoReplace: true,
    		overwriteInitial: true,
		    language: "es",
		    allowedFileExtensions: ["jpg", "png", "gif", "jpeg"],
		    showCaption: false,
		    showUpload: false,
		    browseLabel: "Imagen...",
		    browseIcon: " <i class=\"fa fa-picture-o\"></i>",
		    removeClass: "btn btn-danger",
		    removeLabel: "Eliminar",
		    removeIcon: "<i class=\"fa fa-trash\"></i>",
		    initialPreview:[
		    	"<img class='kv-preview-data file-preview-image img-responsive' width='200' src='../img/<?=$imagen1?>'>"
		    ],
		    layoutTemplates: {actionDelete: ''},
		});
</script>
<?php include "../../functions/footer.php"; ?>
