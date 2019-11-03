<?php
session_start();
if(empty($_SESSION['user'])){
		echo '<script>location.href = "../../index.php";</script>';
	}

include "../../functions/header.php";
include "../../functions/conexion.class.php";
include '../model/empresa.class.php';

$empresa = new empresa();

$getData = $empresa->get();
?>

<div class="box box-info" id="from-view">
	<form role="form" action="#" name="frm_producto" id="frm_producto" method="post" enctype="multipart/form-data">
    <div class="box-body">
      <div class="form-group">
				<div class="col-xs-4 col-sm-3" style="float: right;">
				</div>
    		<div class="col-xs-6 col-md-6">
				<h2>Nuestra Empresa</h2>
				<label>Misión</label>
				<input type="text" name="titulo1" class="form-control" placeholder="Titulo principal" value="<?=$getData[0]['emp_mision']?>">
        <label >Contenido</label>
				<textarea name="corta" rows="5" class="form-control borderColor" placeholder="Contenido Misión de la Empresa"><?=$getData[0]['emp_contmi']?></textarea>
				<div id="msgBoxSubir"></div>
        </div>
				<div class="col-xs-6 col-md-6">
					<br><br><br>
					<label for="">Visión</label>
					<input type="text" name="titulo2" class="form-control" placeholder="Visión" value="<?=$getData[0]['emp_vision']?>">
					<label for="">Contenido</label>
					<textarea name="vision" rows="5" class="form-control borderColor" placeholder="Contenido Visión de la Empresa"><?=$getData[0]['emp_contvi']?></textarea>
				</div>
    			<div class="col-xs-12 col-sm-6">
    				<div class="box-body" id="cloFrom-view" style="float: right;">
	            <button type="reset" class="btn btn-danger" onclick="window.history.back();" title="Cancelar">
   		        <i class="fa fa-close"> Cancelar</i>
							</button>
	            <button type="button" onclick="subirInformacion()" class="btn btn-info" title="Guardar">
   		        <i class="fa fa-save"> Guardar</i>
							</button>
						</div>
      		</div>
    		</div>
			</div>
		</form>
  </div>
</script>
     	<script>
     		CKEDITOR.replace('corta');
				CKEDITOR.replace('vision');
     		//Inserta informacion producto
			function subirInformacion(){
				for (instance in CKEDITOR.instances){
			        CKEDITOR.instances[instance].updateElement();
			    }
				var formData = new FormData($('#frm_producto')[0]);
				$.ajax({
					url:'../control/empresa.update.php',
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
