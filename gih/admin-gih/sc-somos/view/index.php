<?php

session_start();

if(empty($_SESSION['user'])){
		echo '<script>location.href = "../../index.php";</script>';
}

include "../../functions/header.php";
include "../../functions/conexion.class.php";
include "../model/somos.class.php";

$somos = new somos();

$datos = $somos->get();

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
	<h1>Somos</h1>
		<ol class="breadcrumb">
		<li><a href="../../inicio.php"><i class="fa fa-dashboard"></i>Inicio</a></li>
		<li class="active">Somos</li>
		</ol>
</section>

<section class="content" style="padding-top: 0px;">
  <div class="row">
	<div class="col-md-12-center">
      <div class="box box-primary">
      	<div class="box-body">
			<div class=" col-sm-6 col-md-4 col-lg-4" style="border-bottom: 1px black dashed;">
				<img src="../img/<?=$datos[0]['somos_image']?>" class="img-responsive img-rounded">
				<br>
				<h5><span class="label label-warning">Imagen Somos (800 x 600)px</span></h5>
				<a href="#" data-toggle="modal" data-target="#modalForm<?=$datos[0]['somos_id']?>" class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Editar</a>
			<!--inicio modal formulario Edit-->
				<!-- Modal -->
				<div class="modal fade" id="modalForm<?=$datos[0]['somos_id']?>" role="dialog">
					<div class="modal-dialog">
						<form role="form" action="#" name="frm_edicion<?=$datos[0]['somos_id']?>" id="frm_edicion<?=$datos[0]['somos_id']?>" method="post" enctype="multipart/form-data">
							<div class="modal-content">
								<!-- Modal Header -->
								<div class="modal-header" style="background: #c8241b;">
									<button type="button" class="close" data-dismiss="modal">
										<span aria-hidden="true" style="color: #fff;">×</span>
										<span class="sr-only">Close</span>
									</button>
									<h4 class="modal-title" style="color: #fff; text-align: left" id="myModalLabel">Edición Somos</h4>
								</div>

								<!-- Modal Body -->
								<div class="modal-body">
									<p class="statusMsg"></p>
									<hr>
									<label>Descripcion Larga</label>
									<textarea name="desclar<?=$datos[0]['somos_id']?>" class="form-control" id="desclar<?=$datos[0]['somos_id']?>" rows="2" cols="80" placeholder="Descripcion Larga del Producto"><?=$datos[0]['somos_desc']?></textarea>
									<script>
										CKEDITOR.replace("desclar<?=$datos[0]['somos_id']?>");
									</script>
									<input type="file" name="imagen" id="imagen<?=$datos[0]['somos_id']?>" class="file">
									<input type="hidden" value="<?=$datos[0]['somos_image']?>" name="actual">
									<input type="hidden" value="<?=$datos[0]['somos_id']?>" name="idsomos">


									<div id="msgBox<?=$datos[0]['somos_id']?>"></div>
								</div>

								<!-- Modal Footer -->
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
								  <button type="button" class="btn btn-primary" style="background: #2d3e52; border-color: transparent;" onclick="enviarInformacion(<?=$datos[0]['somos_id']?>)">Guardar</button>
								</div>
							</div>
						</form>
					</div>
				</div>
		<!--fin modal formulario-->
			</div>
   			<div class="col-sm-6 col-md-4">
				<form action="#" id="editCont" name="editCont" method="post" autocomplete="off" enctype="multipart/form-data">
					<label>Texto 1</label><br>
					<input type="text" name="text1" placeholder="Texto 1" value="<?=$datos[1]['somos_titulo']?>" class="form-control"><br>
					<label>Texto 1</label><br>
					<input type="text" name="text2" placeholder="Texto 2" value="<?=$datos[1]['somos_desc']?>" class="form-control"><br>
					<button type="button" class="btn btn-primary" style="background: #2d3e52; border-color: transparent;" onclick="editarTexto();">Guardar</button><br>
					<div id="msgTextEdit"></div>
				</form>
   			</div>
   			<div class="col-sm-6 col-md-4">
   				<button type="button" class="btn btn-warning" data-toggle="collapse" data-target="#variedad">Características</button>
   				<div class="collapse" id="variedad">
   				<button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#modalFormSubirCaracteristica">Nueva <i class="fa fa-plus"></i></button>
   					<table class="table table-inverse" width="100%">
						<thead>
							<tr>
								<th width="80%">Nombre</th>
								<th width="20%">Opciones</th>
							</tr>
						</thead>
						<tbody id="contenidoLista">
							<tr>
								<td width="80%">Texto 1</td>
								<td width="20%"><a href="#"><i class="fa fa-edit"></i></a> &nbsp;&nbsp; <a href="#"><i class="fa fa-trash"></i></a></td>
							</tr>
						</tbody>
					</table>
  					<div id="msgTextEdit"></div>
   				</div>
   			</div>
    	</div>
	</div>
  </div>
</div>
					
						
<!--inicio modal formulario Insertar nueva Caracteristica-->
<div class="modal fade" id="modalFormSubirCaracteristica" role="dialog">
	<div class="modal-dialog">
		<form role="form" action="#" name="frmNuevo" id="frmNuevo" method="post" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header" style="background: #c8241b;">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true" style="color: #fff;">×</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" style="color: #fff; text-align: left" id="myModalLabel">Nueva Característica</h4>
				</div>
				<div class="modal-body">
					<label>Nombre</label>
					<input class="form-control" name="nombre" placeholder="Nombre característica" value="">
					<hr>
					<div id="msgBoxEliminar"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				  <button type="button" class="btn btn-primary" style="background: #2d3e52; border-color: transparent;" onclick="subirInformacion()">Guardar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!--fin modal formulario-->

<!--inicio modal formulario Insertar nueva Caracteristica-->
<div class="modal fade" id="modalFormEditarCaracteristica" role="dialog">
	<div class="modal-dialog">
		<form role="form" action="#" name="frmEditar" id="frmEditar" method="post" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header" style="background: #c8241b;">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true" style="color: #fff;">×</span>
						<span class="sr-only">Close</span>
					</button>
					<h4 class="modal-title" style="color: #fff; text-align: left" id="myModalLabel">Editar Característica</h4>
				</div>
				<div class="modal-body">
					<label>Nombre</label>
					<input class="form-control" name="nombre" placeholder="Nombre característica" id="editarCar">
					<input type="hidden" id="idCar" name="id"></input>
					<hr>
					<div id="msgBoxEditCar"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
				  <button type="button" class="btn btn-primary" style="background: #2d3e52; border-color: transparent;" onclick="editarInformacion()">Guardar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!--fin modal formulario-->

</section>
<script type="text/javascript">
$("#imagen<?=$datos[0]['somos_id']?>").fileinput(
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
		"<img class='kv-preview-data file-preview-image img-responsive img-rounded img-thumbnail' width='60%' src='../img/<?=$datos[0]['somos_image']?>'>"
	],
	layoutTemplates: {actionDelete: ''},
});
</script>
<script>
	
	$(document).ready(function(){
		getDatos();
	});
	
	CKEDITOR.replace('desclar');
	//Inserta
	function subirInformacion(){
		for(instance in CKEDITOR.instances){
			CKEDITOR.instances[instance].updateElement();
		}
		var formData = new FormData($('#frmNuevo')[0]);
		$.ajax({
			url:'../control/caracteristica.insert.php',
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
					$(divName).html(" ");
					getDatos();
					$('#frmNuevo')[0].reset();
					$('#modalFormSubirCaracteristica').modal('hide');
				}else{
					$("#msgBoxSubir").html(msgInfo(datos.msg));
				}
			},
			error: function(){
				$("#msgBoxSubir").html(msgError("Error inesperado en la base de datos.", "<i class='fa fa-code'></i> Ups!"));
			}
		});
	}
	
	function editInfo(nombre, id){
		$('#editarCar').val(nombre);
		$('#idCar').val(id);
		
		$('#modalFormEditarCaracteristica').modal({show:true});
	}
	
	//Actualiza informacion caracteristica
    function editarInformacion(){
	    var formName = "#frmEditar";
	    var divName = "#msgBoxEditCar";
	    var formData = new FormData($(formName)[0]);
	    $.ajax({
	        url: '../control/caracteristica.update.php',
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
					$(divName).html(" ");
					$('#frmEditar')[0].reset();
	                getDatos();
					$('#modalFormEditarCaracteristica').modal('hide');
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
	

	//Actualiza informacion SOMOS
    function enviarInformacion($id){
	    var formName = "#frm_edicion"+$id;
	    var divName = "#msgBox"+$id;
			for(instance in CKEDITOR.instances){
				CKEDITOR.instances[instance].updateElement();
			}
	    var formData = new FormData($(formName)[0]);
	    $.ajax({
	        url: '../control/somos.update.php',
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
	
	//Actualiza informacion Textos
    function editarTexto(){
	    var formName = "#editCont";
	    var divName = "#msgTextEdit";
	    var formData = new FormData($(formName)[0]);
	    $.ajax({
	        url: '../control/somos.editTexto.php',
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
	//elimina marca

	function eliminarArchivo($id){
		var divName = "#msgBoxEliminar";
		$.ajax({
			url:'../control/caracteristica.delete.php',
			type:'get',
			data:{'id':$id},
			beforeSend: function(){
		            $(divName).html( msgLoad( 'Eliminando ...' ) );
	        },
	        success: function( data ){
	            var array = eval("(" + data + ")");
	            if(array.success == true)
	            {
	                getDatos();
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
	
	function getDatos(){
		var divName = "#contenidoLista";
		$.ajax({
			url:'../control/caracteristica.get.php',
			type:'get',
			data:{'somos':'1'},
			beforeSend: function(){
		            $(divName).html( msgLoad( 'Eliminando ...' ) );
	        },
	        success: function( data ){
	            var array = eval("(" + data + ")");
	            if(array.success == true)
	            {
	                var datos = array.datos;
					var imprimir = '';
	                for(var i = 0; i < datos.length; i++){
						imprimir += '<tr><td width="80%">'+datos[i].car_nombre+'</td><td width="20%"><a href="javascript:editInfo(\''+datos[i].car_nombre+'\', '+datos[i].car_id+')"><i class="fa fa-edit"></i></a> &nbsp;&nbsp; <a href="javascript:eliminarArchivo('+datos[i].car_id+');"><i class="fa fa-trash"></i></a></td></tr>';
					}
					$(divName).html("");
					$(divName).append(imprimir);
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
