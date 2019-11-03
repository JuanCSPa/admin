<?php
session_start();
if(empty($_SESSION['user'])){
		echo '<script>location.href = "../../index.php";</script>';
	}

include "../../functions/header.php";
include "../../functions/conexion.class.php";
include '../model/compania.class.php';

$compania = new compania();

$getData = $compania->get();
?>

<div class="box box-info" id="from-view">
	<form role="form" action="#" name="frm_producto" id="frm_producto" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
				<div class="col-xs-4 col-sm-3" style="float: right;">
				</div>
    		<div class="col-xs-6 col-md-6">
				<h2>Nuestra Compañia</h2>
				<label>Titulo Principal</label>
				<input type="text" name="titulo1" class="form-control" placeholder="Titulo principal" value="<?=$getData[0]['com_titulopri']?>">

        <label>Contenido Uno</label>
				<textarea name="title1" rows="5" class="form-control borderColor" placeholder="Contenido Apartado Uno"><?=$getData[0]['com_contentuno']?></textarea>
				<label>Contenido Dos</label>
				<textarea name="title2" rows="5" class="form-control borderColor" placeholder="Contenido Apartado Dos"><?=$getData[0]['com_contentdos']?></textarea>
				<div id="msgBoxSubir"></div>
        </div>
				<div class="col-xs-6 col-md-6">
					<br><br><br>
					<label>Subtitulo</label>
					<input type="text" name="subtitulo" class="form-control" placeholder="Subtitulo" value="<?=$getData[0]['com_subtitulo']?>"></input>
					<label for="">Contenido Tres</label>
					<textarea name="title3" rows="5" class="form-control borderColor" placeholder="Contenido Apartado Tres"><?=$getData[0]['com_contentres']?></textarea>
					<label for="">Contenido Cuatro</label>
					<textarea name="title4" rows="5" class="form-control borderColor" placeholder="Contenido Apartado Cuatro"><?=$getData[0]['com_contentcuatro']?></textarea>
				</div>
    			<div class="col-xs-12 col-sm-6">
    				<div class="box-body" id="cloFrom-view" style="float: right;">
	            <button type="reset" class="btn btn-danger" onclick="window.history.back();" title="Cancelar">
   		        <i class="fa fa-close"> Cancelar</i>
							</button>
	            <button type="button" onclick="subirInformacion()" class="btn btn-info" title="Guardar"><i class="fa fa-save"> Guardar</i></button>
						</div>
      		</div>
    		</div>
			</div>
		</form>
  </div>
</script>
     	<script>
     		CKEDITOR.replace('title1',{
										filebrowserBrowseUrl: '../../plugins/ckfinder/ckfinder.html',
										filebrowserUploadUrl: '../../plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
										language: 'es'

									});
				CKEDITOR.replace('title2',{
										filebrowserBrowseUrl: '../../plugins/ckfinder/ckfinder.html',
										filebrowserUploadUrl: '../../plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
										language: 'es'
									});
				CKEDITOR.replace('title3',{
										filebrowserBrowseUrl: '../../plugins/ckfinder/ckfinder.html',
										filebrowserUploadUrl: '../../plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
										language: 'es'
									});
				CKEDITOR.replace('title4',{
											filebrowserBrowseUrl: '../../plugins/ckfinder/ckfinder.html',
											filebrowserUploadUrl: '../../plugins/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
											language: 'es'
										});
     		//Inserta informacion producto
			function subirInformacion(){
				for (instance in CKEDITOR.instances){
			        CKEDITOR.instances[instance].updateElement();
			    }
				var formData = new FormData($('#frm_producto')[0]);
				$.ajax({
					url:'../control/compania.update.php',
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
