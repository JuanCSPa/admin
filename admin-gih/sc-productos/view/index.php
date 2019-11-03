<?php

session_start();

if(empty($_SESSION['user'])){

		echo '<script>location.href = "../../index.php";</script>';

	}

include "../../functions/header.php";

include "../../functions/conexion.class.php";

include "../model/producto.class.php";



$producto = new producto();

$datos = $producto->get();

?>
<style type="text/css">
	#table1_filter, #table1_paginate{
		float: right;
	}
</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/fileinput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.5/js/locales/es.js"></script>
<style type="text/css">
		#kvFileinputModal{
			padding-top: 150px;
		}
		.fade{
			opacity: 100;
		}
  .kv-file-remove{
	  display: none !important;
  }
</style>
<section class="content-header">
					<h1>
						Productos
						<small></small>
					</h1>

					<ol class="breadcrumb">
						<li><a href="../../inicio.php"><i class="fa fa-dashboard"></i>Inicio</a></li>
						<li class="active">Productos</li>
					</ol>

				</section>

				<section class="content">
				    <div class="row">
						<div class="col-md-9-center">
					        <div class="box box-primary">
				            	<div class="box-header with-border pull-right">
									<a href="nuevo.php"><button type="button" class="btn btn-info btn-xs" id="newFrom-view"  title="Nuevo">
										<i class="fa fa-plus"> Nuevo</i>
									</button></a>
								</div>
				            	<div class="box-body">
						            <div class="col-xs-12 col-sm-3">

						            	<!-- Navigation - folders-->
                                            <div style="margin-top: 15px;">
                                                <ul class="nav nav-pills nav-stacked" id="li-categoria">
                                                    <li class="header">
                                                        <span>Categorias</span>
                                                        <span class="pull-right">
                                                            <a class="on-hover" href="javascript:optionsCatego();">
                                                                <i class="fa fa-pencil"></i>
                                                                <span style="font-size:10px;" id="edit-txt">Editar</span>
                                                            </a>
                                                            &nbsp;&nbsp; &nbsp;
                                                            <a class="on-hover" onclick="plusCategoNew();">
                                                            	<i class="fa fa-plus"></i>
                                                                <span style="font-size:10px;">Agregar</span>
                                                            </a>
                                                        </span>
                                                    </li>
                                                    <!-- arbol direcctorios -->
                                                    <li class="header" id="cat-tree" style="display:none;">
                                                        <span class="nodos"></span>
                                                    </li>
                                                </ul>
                                                <br><br>
                                            </div>
						            </div>
						            <div class="col-xs-12 col-sm-9 table-responsive">
						            	<table id="table1" class="table table-bordered table-striped">
							                <thead>
			    								<tr>
						                    		<th>Nombre</th>
						                    		<th></th>
						                    		<th>Opciones</th>
						                  		</tr>
						                    </thead>
							                <tbody>
							                </tbody>
							            </table>
						            </div>
				              	</div>
							</div>
				        </div>
					</div>
				</section>
				<!-- COMPOSE MESSAGE MODAL -->
    <div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-inbox"></i>Categoria</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form id="frm-categoria" name="frm-categoria">
                            <input type="hidden" name="id_depende" id="id_depende" value="0" />
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Nombre:</span>
                                        <input name="nombre" id="nombre" type="text" placeholder="Nombre Categoria" class="form-control" onkeypress="return exeSave(event)" />
                                    </div>
                                    <!--<div class="row">
                                        <div class="col-xs-12">
                                            <span>Descripcion corta</span>
                                            <p><textarea name="descripcion" class="form-control" placeholder="Descripcion corta de categoria" id="descripcion"></textarea></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <input type="file" name="imagen" id="imagen" class="file">
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                            <div class="col-sm-12" id="msgBox"></div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer clearfix">
                    <span class="btn btn-primary" data-dismiss="modal" onclick="saveCategoria();"><i class="fa fa-floppy-o"></i>Guardar Categoria</span>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i>Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- COMPOSE MESSAGE MODAL -->
    <div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-inbox"></i>Categoria</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form id="frm-edit-categoria" action="#" name="frm-edit-categoria" rol="form" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="cat_id" id="cat_id" />
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon">Nombre:</span>
                                        <input name="nombre" id="cat_nombre" type="text" class="form-control" />
                                    </div>
                                </div>
                                <!--<div class="row">
                                    <div class="col-xs-12">
                                        <span>Descripcion corta</span>
                                        <p><textarea name="descripcion_edit" class="form-control" placeholder="Descripcion corta de categoria" id="descripcion_edit"></textarea></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <input type="file" name="imagenEditar" id="imagenEditar" class="file">
                                        <input type="hidden" name="actual" id="actual" value="">
                                    </div>
                                </div>-->
                            </div>
                            <div class="col-sm-12" id="msgBoxEdit"></div>

                        </form>
                    </div>
                </div>
                <div class="modal-footer clearfix">
                    <span class="btn btn-primary" data-dismiss="modal" onclick="updateCategoria();"><i class="fa fa-floppy-o"></i>Guardar Actualización</span>
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times"></i>Cancelar</button>
                </div>
            </div>
        </div>
    </div>

	<script type="text/javascript">
			$("#imagen").fileinput(
		   {
			    language: "es",
			    showCaption: false,
			    showUpload: false,
			    browseLabel: "Agregar Logo...",
			    browseIcon: " <i class=\"fa fa-file-image-o\"></i>",
			    browseClass: "btn btn-primary",
			    removeClass: "btn btn-danger",
			    removeLabel: "Eliminar",
			    removeIcon: "<i class=\"fa fa-trash\"></i>",
			    uploadAsync: false,
			    overwriteInitial: false,
			    initialPreviewAsData: true,
			    initialPreviewFileType: 'pdf',
			    uploadExtraData: {
	        		img_key: "1000",
	        		img_keywords: "happy, places"
	    		}
			}).on('filesorted', function(e, params) {
		    console.log('File sorted params', params);
			}).on('fileuploaded', function(e, params) {
			    console.log('File uploaded params', params);
			});

			$("#imagenEditar").fileinput(
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
			    	"<img class='kv-preview-data file-preview-image img-responsive img-rounded img-thumbnail' id='imgEditar' width='100%' src='../../sc-categorias/img/slide-vianney2_cobertor-928.jpg'>"
			    ],
			    layoutTemplates: {actionDelete: ''},
			});
		</script>
<script src="../js/jquery-1.11.2.js"></script>
<!---datatables-->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../js/functions.js"></script>


    <script type="text/javascript">

            var table = $('#table1').DataTable( {
                ajax: "../control/producto.lista.php",
                responsive: true,
                  language:  {
                    sProcessing:     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                      "sFirst":    "Primero",
                      "sLast":     "Último",
                      "sNext":     "Siguiente",
                      "sPrevious": "Anterior"
                    },
                    "oAria": {
                      "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                  }
            } );


        $(document).on("click",".pre_eraseFN",function() {
                    var r = confirm('Estas seguro de eliminar este producto?');
                    if( r ){
                        table
                            .row( $(this).parents('tr') )
                            .remove()
                            .draw();

                        $.ajax({
                            url: '../control/producto.delete.php',
                            type: 'POST',
                            data: param({
                                    "pro_id" : $(this).data('pro')
                                }),
                            success: function( data ){

                            }
                        });
                    }
                });
    </script>
    <script>
        function plusCategoNew() {
                $('#compose-modal').modal({
                    show: 'true'
                });
        }
    </script>
    <script type="text/javascript" src="../js/productos.js"></script>
    <script type="text/javascript" src="../js/categorias.js"></script>
<?php include "../../functions/footer.php"; ?>
