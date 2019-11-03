<?php 

session_start();

if(empty($_SESSION['user'])){

		echo '<script>location.href = "../../index.php";</script>';

	}

include "../../functions/header.php";

?>

<div class="box box-info" id="from-view">

									<form role="form" action="../control/categoria.insert.php" name="frm_promocion" id="frm_promocion" method="post" enctype="multipart/form-data">

							        	<div class="box-body">

							                <div class="form-group">

								    			<div class="col-xs-6">

													<h2>Nuevo Categoria</h2>
													<h3><span class="label label-success">Espa&ntilde;ol</span></h3>
								    				<label>Nombre </label>

														<input type="text" class="form-control" name="nombre" placeholder="Nombre del categoria" required>
													<h3><span class="label label-info">Ingles</span></h3>
													<input type="text" class="form-control" name="nombre1" placeholder="Nombre del categoria" required>
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

<?php include "../../functions/footer.php"; ?>