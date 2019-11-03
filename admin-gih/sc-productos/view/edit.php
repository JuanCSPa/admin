<?php

session_start();

if(empty($_SESSION['user'])){

		echo '<script>location.href = "../../index.php";</script>';

	}

include "../../functions/header.php";
include "../../functions/conexion.class.php";
include "../model/producto.class.php";
include "../model/categoria.class.php";
include "../../sc-socios/model/socios.class.php";
include '../../sc-marcas/model/marca.class.php';

$id = $_GET['p'];
$producto = new producto();

$categoria = new categoria();
$infoCategorias = $categoria->getAll();

$marca = new marca();

$datosProducto = $producto->getById($id);

$datosMarca = $marca->get();
$socios = new socios();
$datosSocios = $socios->get();

$pdf = '';

if($datosProducto[0]['pro_image'] != ""){
	$imagen = $datosProducto[0]['pro_image'];
}else{
	$imagen = 'sin_imagen.jpg';
}

($datosProducto[0]['pro_image_2'] != "") ? $imagen2 = $datosProducto[0]['pro_image_2'] : $imagen2 = 'sin_imagen.jpg';
($datosProducto[0]['pro_image_3'] != "") ? $imagen3 = $datosProducto[0]['pro_image_3'] : $imagen3 = 'sin_imagen.jpg';
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
 <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/purify.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/locales/es.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/css/bootstrap-colorpicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.1/js/bootstrap-colorpicker.js"></script>
  <style type="text/css">
  	.file-upload-indicator{
  		display: none;
  		visibility: hidden;
  	}
  </style>
<div class="box box-info" id="from-view">
	<form role="form" action="#" name="frm_producto" id="frm_producto" method="post" enctype="multipart/form-data">
    	<div class="box-body">
            <div class="form-group">
    			<div class="col-xs-12 col-sm-6">
					<h2>Nuevo Producto</h2>
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<label>Socios</label>
							<select class="form-control" name="marca" id="marca">
								<option selected="" disabled="">Seleccione...</option>
								<?php
									foreach ($datosSocios as $soc) {
										if($soc['soc_id'] == $datosProducto[0]['pro_id_marca']){ ?>
										<option value="<?=$soc['soc_id']?>" selected><?=$soc['soc_nombre']?></option>
										<?php }else{ ?>
										<option value="<?=$soc['soc_id']?>"><?=$soc['soc_nombre']?></option>
										?>
									<?php
										}
									}
								?>
							</select>
						</div>
						<div class="col-xs-12 col-sm-6">
							<label>Categoria</label>
							<select name="cat_id" id="" class="form-control">
								<option selected disabled>Seleccione...</option>
								<?php
									foreach($infoCategorias as $catego){
										if($catego['cat_id'] == $datosProducto[0]['pro_cat_id']){
											echo '<option value="'.$catego['cat_id'].'" selected>'.$catego['cat_nombre'].'</option>';	
										}else{
											echo '<option value="'.$catego['cat_id'].'">'.$catego['cat_nombre'].'</option>';
										}
									}
								?>
							</select>
							<input type="hidden" name="idproducto" value="<?=$id?>">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-9">
							<label>Nombre </label>
							<input type="text" class="form-control" name="nombre" placeholder="Nombre del Producto" value="<?=$datosProducto[0]['pro_nombre']?>" required>
						</div>
					</div>
            		<label >Descripcion Corta</label>
						<textarea name="corta" rows="5" class="form-control" placeholder="Descripcion corta del Producto" required><?=$datosProducto[0]['pro_desc_corta']?></textarea><br>
					<div id="msgBoxSubir"></div>
                </div>
    			<div class="col-xs-12 col-sm-6">
    				<div class="box-body" id="cloFrom-view" style="float: right;" >
	            		<button type="reset" class="btn btn-danger" onclick="window.history.back();" title="Cancelar"><i class="fa fa-close"> Cancelar</i></button>
	            		<button type="button" onclick="subirInformacion()" class="btn btn-info" title="Guardar"><i class="fa fa-save"> Guardar</i></button>
					</div>
    				<br><br><br>
    				<!--inicia  tabs complementos adicionales-->
    				<ul class="nav nav-tabs">
					    <li class="active"><a data-toggle="tab" href="#home">Descripcion</a></li>
					</ul>
					<div class="tab-content">
					    <div id="home" class="tab-pane in active">
					      <p><textarea name="larga" id="larga" placeholder="Descripcion del Producto"><?=$datosProducto[0]['pro_desc_larga']?></textarea></p>
					    </div>
					</div>
					<!--finaliza tabs complementos adicionales-->
                </div>
                <hr>
				<div class="col-xs-12">
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-4">
							<h4>Imagen de Presentacion</h4>
							<h5><span class="label label-warning">Imagen 1 (500 x 500)</span></h5>
							<input type="file" name="imagen" id="imagen" class="file">
							<input type="hidden" name="actual1" value="<?=$datosProducto[0]['pro_image']?>">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<h4>Imagen de Contenido</h4>
							<h5><span class="label label-warning">Imagen 2 (500 x 500)</span></h5>
							<input type="file" name="imagen2" id="imagen2" class="file">
							<input type="hidden" name="actual2" value="<?=$datosProducto[0]['pro_image_2']?>">
						</div>
						<div class="col-xs-12 col-sm-6 col-md-4">
							<h4>Imagen de Contenido</h4>
							<h5><span class="label label-warning">Imagen 3 (500 x 500)</span></h5>
							<input type="file" name="imagen3" id="imagen3" class="file">
							<input type="hidden" name="actual3" value="<?=$datosProducto[0]['pro_image_3']?>">
						</div>
					</div>
					<br>
				</div>
            </div>
        </div>
	</form>
</div>
<script type="text/javascript">
$("#imagen").fileinput({
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
    	"<img class='kv-preview-data file-preview-image img-responsive img-rounded img-thumbnail' id='imgEditar' width='100%' src='../img/<?=$imagen?>'>"
    ],
    layoutTemplates: {actionDelete: ''},
});
$("#imagen2").fileinput({
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
    	"<img class='kv-preview-data file-preview-image img-responsive img-rounded img-thumbnail' id='imgEditar' width='100%' src='../img/<?=$imagen2?>'>"
    ],
    layoutTemplates: {actionDelete: ''},
});
$("#imagen3").fileinput({
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
    	"<img class='kv-preview-data file-preview-image img-responsive img-rounded img-thumbnail' id='imgEditar' width='100%' src='../img/<?=$imagen3?>'>"
    ],
    layoutTemplates: {actionDelete: ''},
});
CKEDITOR.replace('larga');
</script>
     	<script>
     		//Inserta informacion producto
			function subirInformacion(){
				for (instance in CKEDITOR.instances){
			        CKEDITOR.instances[instance].updateElement();
			    }
				var formData = new FormData($('#frm_producto')[0]);
				$.ajax({
					url:'../control/producto.update.php',
					type:'POST',
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					beforeSend: function(){
						$("#msgBoxSubir").html(msgLoad("Guardando informacion..."));
					},
					success: function( data ){
						var datos = eval("(" + data +  ")");
						if(datos.success == true){
							$("#msgBoxSubir").html(msgInfo(datos.msg));
							setTimeout( function(){ location.href='../view/'; }, 3000 );
						}else{
							$("#msgBoxSubir").html(msgError(datos.msg));
						}
					},
					error: function(){
						$("#msgBoxSubir").html(msgError("Error inesperado en la base de datos.", "<i class='fa fa-code'></i> Ups!"));
					}
				});
			}


			function msgError(msg, titulo) {
			  var tit = ( titulo == '' )? '' : ' ';
			    return '<div class="alert alert-danger alert-dismissable">'+
			          '<i class="fa fa-exclamation-triangle"></i>'+
			          '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
			          '<b>' + tit + '</b> '+
			          msg +
			        '</div>';
			}

			function msgInfo(msg, titulo) {
			  var tit = ( titulo == '' )? '' : ' ';
			    return '<div class="alert alert-info alert-dismissable">'+
			          '<i class="fa fa-info"></i>'+
			          '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
			          '<b>' + tit + '</b> '+
			          msg +
			        '</div>';
			}


			function msgLoad(leyenda) {
			  var text = '';
			  if(leyenda!=''){
			    text = '<p style="font-size:10px; color:#545454";>'+leyenda+'</p>';
			  }
			  else {
			    text = '';
			  }
				return '<center>'+text+'<img src="../../img/cargando.gif" id="msgLoad" /></center>';
			}
     	</script>
<?php include "../../functions/footer.php"; ?>
