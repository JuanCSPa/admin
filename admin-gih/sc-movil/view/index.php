<?php

session_start();

if(empty($_SESSION['user'])){

		echo '<script>location.href = "../../index.php";</script>';

	}

include "../../functions/header.php";
include "../../functions/conexion.class.php";
include "../model/movil.class.php";



$movil = new movil();

$datos = $movil->get();

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

<section class="content-header">
	<h1>Slider Movil</h1>
		<ol class="breadcrumb">
		<li><a href="../../inicio.php"><i class="fa fa-dashboard"></i>Inicio</a></li>
		<li class="active">Slider Movil</li>
		</ol>
		<div class="box-header with-border pull-right" style="">
			<a href="#" data-toggle="modal" data-target="#modalFormSubir" class="btn btn-info btn-xs">
				<i class="fa fa-plus"> Nuevo</i>
			</a>
		</div>
</section>

<section class="content" style="padding-top: 50px;">
  <div class="row">
		<div class="col-md-12-center">
      <div class="box box-primary">
      	<div class="box-body">
        	<?php foreach ($datos as $value) { ?>
						<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="border-bottom: 1px black dashed;">
          		<img src="../img/<?=$value['mv_image']?>" class="img-responsive img-rounded">
          		<br>
							<a href="#" data-toggle="modal" data-target="#modalForm<?=$value['mv_id']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Editar</a>
							<a class="btn btn-danger" href="#" onclick="javascript:eliminarArchivo(<?=$value['mv_id']?>)"><i class="fa fa-trash-o"></i> Eliminar</a>
							<div id="msgBoxEliminar<?=$value['mv_id']?>"></div>

											<!--inicio modal formulario Edit-->
															<!-- Modal -->
															<div class="modal fade" id="modalForm<?=$value['mv_id']?>" role="dialog">
															    <div class="modal-dialog">
															    	<form role="form" action="#" name="frm_edicion<?=$value['mv_id']?>" id="frm_edicion<?=$value['mv_id']?>" method="post" enctype="multipart/form-data">
																        <div class="modal-content">
																            <!-- Modal Header -->
																            <div class="modal-header" style="background: #c8241b;">
																                <button type="button" class="close" data-dismiss="modal">
																                    <span aria-hidden="true" style="color: #fff;">×</span>
																                    <span class="sr-only">Close</span>
																                </button>
																                <h4 class="modal-title" style="color: #fff; text-align: left" id="myModalLabel">Edición Slider Movil</h4>
																            </div>

																            <!-- Modal Body -->
																            <div class="modal-body">
																                <p class="statusMsg"></p>
																                <label>Titulo Principal</label>
																                <input class="form-control" name="nombre"  placeholder="Nombre del la Industria" value="<?=$value['mv_titulo']?>">
																											<hr>
																								<label>Descripcion Corta</label>
																								<textarea name="descCorta" class="form-control" id="descCorta" rows="2" cols="80" placeholder="Descripcion Corta"><?=$value['mv_des']?></textarea>
																				<h5><span class="label label-warning">Imagen Slider Movil (500 x 600)px</span></h5>
																                <input type="file" name="imagen" id="imagen<?=$value['mv_id']?>" class="file">
																                <input type="hidden" value="<?=$value['mv_image']?>" name="actual">
																                <input type="hidden" value="<?=$value['mv_id']?>" name="idmv">

																                <script type="text/javascript">
																							   $("#imagen<?=$value['mv_id']?>").fileinput(
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
																								    	"<img class='kv-preview-data file-preview-image img-responsive img-rounded img-thumbnail' width='40%' src='../img/<?=$value['mv_image']?>'>"
																								    ],
																								    layoutTemplates: {actionDelete: ''},
																								});
																							</script>
																							<label>URL</label>
																							<input type="text" name="url" id="url" placeholder="Ejemplo: http://www.google.com.mx" class="form-control" value="<?=$value['mv_url']?>">
																				<div id="msgBox<?=$value['mv_id']?>"></div>
																            </div>

																            <!-- Modal Footer -->
																            <div class="modal-footer">
																                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
																              <button type="button" class="btn btn-primary" style="background: #2d3e52; border-color: transparent;" onclick="enviarInformacion(<?=$value['mv_id']?>)">Guardar</button>
																            </div>
																        </div>
																    </form>
															    </div>
															</div>
								<!--fin modal formulario-->
					</div>
				<?php }  ?>
    	</div>
		</div>
  </div>
</div>
					<div class="row">
						<div class="col-xs-12">
							<!--inicio modal formulario Insertar nueva Marca-->
															<!-- Modal -->
															<div class="modal fade" id="modalFormSubir" role="dialog">
															    <div class="modal-dialog">
															    	<form role="form" action="#" name="frm_subir" id="frm_subir" method="post" enctype="multipart/form-data">
																        <div class="modal-content">
																            <!-- Modal Header -->
																            <div class="modal-header" style="background: #c8241b;">
																                <button type="button" class="close" data-dismiss="modal">
																                    <span aria-hidden="true" style="color: #fff;">×</span>
																                    <span class="sr-only">Close</span>
																                </button>
																                <h4 class="modal-title" style="color: #fff; text-align: left" id="myModalLabel">Nuevo Slider</h4>
																            </div>

																            <!-- Modal Body -->
																            <div class="modal-body">
																                <label>Titulo Principal</label>
																                <input class="form-control" name="titulo" placeholder="Titulo Principal" value="">
																								<br>
																								<label>Descripcion Corta</label>
																                <textarea name="descCorta" class="form-control" id="descCorta" rows="2" cols="80" placeholder="Descripcion Corta" required></textarea>
																				<h5><span class="label label-warning">Imagen Slider Movil (500 x 600)px</span></h5>
																                <input type="file" name="imagen" id="input-1" class="file">
																								<label>URL</label>
																								<input type="text" name="url" id="url" placeholder="Ejemplo: http://www.google.com.mx" class="form-control">
																								<div id="msgBoxSubir"></div>
																            </div>

																            <!-- Modal Footer -->
																            <div class="modal-footer">
																                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
																              <button type="button" class="btn btn-primary" style="background: #2d3e52; border-color: transparent;" onclick="subirInformacion()">Guardar</button>
																            </div>
																        </div>
																    </form>
															    </div>
															</div>
											<!--fin modal formulario-->
						</div>
					</div>


				</section>
<script type="text/javascript">
	   $("#input-1").fileinput(
	   {
		    language: "es",
		    allowedFileExtensions: ["jpg", "png", "gif", "jpeg"],
		    showCaption: false,
		    showUpload: false,
		    browseLabel: " Agregar Slider...",
		    browseIcon: " <i class=\"fa fa-picture-o\"></i>",
		    removeClass: "btn btn-danger",
		    removeLabel: "Eliminar",
		    removeIcon: "<i class=\"fa fa-trash\"></i>",
		    /*uploadClass: "btn btn-success",
		    uploadLabel: "Enviar",
		    uploadIcon: "<i class=\"fa fa-send\"></i>"*/
		});
</script>


<script>
	//Inserta Datos
	function subirInformacion(){
		var formData = new FormData($('#frm_subir')[0]);
		$.ajax({
			url:'../control/movil.insert.php',
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
					setTimeout( function(){ location.reload(); }, 3000 );
				}else{
					$("#msgBoxSubir").html(msgError(datos.msg));
				}
			},
			error: function(){
				$("#msgBoxSubir").html(msgError("Error inesperado en la base de datos.", "<i class='fa fa-code'></i> Ups!"));
			}
		});
	}

	//Actualiza informacion Marca
    function enviarInformacion($id){
	    var formName = "#frm_edicion"+$id;
	    var divName = "#msgBox"+$id;
	    var formData = new FormData($(formName)[0]);
	    $.ajax({
	        url: '../control/movil.update.php',
	        type: 'POST',
	        data: formData,
	        cache: false,
	        contentType: false,
	        processData: false,
	        beforeSend: function(){
	            $(divName).html( msgLoad( 'Guardando informacion ...' ) );
	        },
	        success: function( data ){
	            var array = eval("(" + data + ")");
	            if(array.success == true)
	            {
	                $(divName).html( msgInfo( array.msg ) );
	                setTimeout( function(){ location.reload(); }, 3000 );
	            }
	            else
	            {
	                $(divName).html( msgError( array.msg ) );
	            }
	        },
	        error: function(){
	            $(divName).html( msgError( 'Error inesperado en la base de datos', '<i class="fa fa-code"></i> Ups! ' ) );
	        }
	    });
	}
	//elimina Servicio

	function eliminarArchivo($id){
		var divName = "#msgBoxEliminar"+$id;
		$.ajax({
			url:'../control/movil.delete.php',
			type:'get',
			data:{'movil':$id},
			beforeSend: function(){
		            $(divName).html( msgLoad( 'Eliminando ...' ) );
	        },
	        success: function( data ){
	            var array = eval("(" + data + ")");
	            if(array.success == true)
	            {
	                $(divName).html( msgInfo( array.msg ) );
	                setTimeout( function(){ location.reload(); }, 3000 );
	            }
	            else
	            {
	                $(divName).html( msgError( array.msg ) );
	            }
	        },
	        error: function(){
	            $(divName).html( msgError( 'Error inesperado en la base de datos', '<i class="fa fa-code"></i> Ups! ' ) );
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
