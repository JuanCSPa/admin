<?php 

session_start();

if(empty($_SESSION['user'])){

		echo '<script>location.href = "../../index.php";</script>';

	}

include "../../functions/header.php";

include "../../functions/conexion.class.php";

include "../model/categoria.class.php";



$categoria = new categoria();

$datos = $categoria->get();

?>

			<section class="content-header">

					<h1>

						Categorias 

						<small></small>

					</h1>

					<ol class="breadcrumb">

						<li><a href="../../inicio.php"><i class="fa fa-dashboard"></i>Inicio</a></li>

						<li class="active">Categorias</li>

					</ol>
				<div class="box-header with-border pull-right" style="">

									<a href="nuevo.php"><button type="button" class="btn btn-info btn-xs" id="newFrom-view"  title="Nuevo">

										<i class="fa fa-plus"> Nuevo</i>

									</button></a>

								</div>
				</section>

				<section class="content" style="padding-top: 50px;">

				    <div class="row">

						<div class="col-md-12-center">

					        <div class="box box-primary">

				            	

				            	<div class="box-body">
					              	<?php foreach ($datos as $value) { ?>
										<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3" style="border-bottom: 1px black dashed;">
						                    		<h4><i class="fa fa-desktop"></i>  <?=$value['cat_nombre']?></h4>
						                    		<br>
													<button type="button" class="btn btn-info btn-sm" onclick="location.href='edit.php?categoria=<?=$value['cat_id']?>'"><i class="fa fa-pencil"> Editar</i></button>
													
													<button type="button" class="btn btn-danger btn-sm" onclick="location.href='../control/categoria.delete.php?categoria=<?=$value['cat_id']?>'"><i class="fa fa-trash-o"></i> Eliminar</button>
										</div>
									<?php }  ?> 
				              	</div>

							</div>

				        </div>

					</div>

				</section>

<?php include "../../functions/footer.php"; ?>