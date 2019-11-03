var clasificacion = 0;
$(document).ready(function(){
	setTimeout(
		function () {
			clasificacion = session.get('CLASIFICACION');
			if( clasificacion == false )
			{
				loadClasificacion(1);
			}
			else
			{
				loadClasificacion( clasificacion );
			}
		}, 0);
});

function delete_img( group, pro_id ){
	var r = confirm('¿You are sure to want to delete this image?');
	if( r ){
		var item_db = '';
		switch( group ){
			case 'file-id-1': item_db = 'pro_img_1'; break;
			case 'file-id-2': item_db = 'pro_img_2'; break;
			case 'file-id-3': item_db = 'pro_img_3'; break;			
			case 'file-id-4': item_db = 'pro_img_4'; break;
			case 'file-id-5': item_db = 'pro_img_5'; break;
			case 'file-id-6': item_db = 'pro_img_6'; break;
			case 'file-id-7': item_db = 'pro_img_7'; break;
			case 'file-id-8': item_db = 'pro_img_8'; break;
			case 'file-id-9': item_db = 'pro_img_9'; break;
			case 'file-id-10': item_db = 'pro_img_10'; break;

		}

		$.ajax({
	        url: '../control/imagen.delete.php',  
	        type: 'POST',
	        data: param({
	                "pro_id" : pro_id,
	                "delete" : item_db
	            }),
	        success: function( data ){            
	            var array = eval("(" + data + ")");

	            $("#" + group + ' img').attr( 'src','../../sources/img/click.png' );
				$("#" + group + " + span").html( '' );
	        }
	    });
		
	}
}

function loadClasificacion(clasi){
	resetClasificacion();
	switch( parseInt(clasi) ){
		case 1:
			$("#cla-todos").addClass( 'active' );	
			break;
		case 2:
			$("#cla-top").addClass( 'active' );
			break;
		case 3:
			$("#cla-pop").addClass( 'active' );
			break;
		case 4:
			$("#cla-stock").addClass( 'active' );
			break;
	}
	session.set('CLASIFICACION', clasi);
	// session.reset();
}

function resetClasificacion(){
	$("#cla-todos").removeClass( 'active' );
	$("#cla-top").removeClass( 'active' );
	$("#cla-pop").removeClass( 'active' );
	$("#cla-stock").removeClass( 'active' );
}

function getProductos( cat_id){
	pro_cat_id = cat_id;
	$(".li-item").removeClass( 'active' );
	$( "#li-item-" + cat_id ).addClass( 'active' );
	session.set('CAT_LEVEL2', cat_id);
	session.set('CAT_TYPE', 'SELECT');

	$.ajax({
        url: '../control/categoria.child.php',  
        type: 'POST',
        data: param({
                "cat_id" : cat_id
            }),
        success: function( data ){            
            var str = data;
            var array = str.split(',');
            var aux = new Array();

            for( i = 0; i < (array.length - 1); i++ ){
            	aux.push(array[i]);
            }
            var claves = aux.join(',')
            // console.log(claves);
            table.ajax.url( '../control/producto.lista.php?cat=' + claves ).load();
        }
    });
}

function nuevoProducto(){
	if( pro_cat_id == 0 ){
		alert( 'Debes de elegir una categoria para poder agregar un nuevo producto' );
	}
	else{
		location.href = 'nuevo.php?c=' + pro_cat_id;
	}
}

var desItems = 1;
var desCount = 1;
function description_add(){
	desCount++;
	desItems++;
	var template = '<tr id="des-tr-' + desCount + '">'+
						'<td><input type="text" name="des_li_carac[]" class="form-control input-sm"></td>'+
						'<td><input type="text" name="des_li_dscrip[]" class="form-control input-sm"></td>'+
						'<td><a href="javascript:description_remove(' + desCount + ');">- Remove</a></td>'+
					'</tr>';

	$("#caracteristicas").append( template );
	$('#des-tr-' + desCount + ' td:first-child input').focus();
	console.log(desItems);
}

function description_remove( id ){
	$("#des-tr-" + id).remove();
	desItems--;
	if( desItems == 0 ){
		description_add();
	}
}

function description_reset(){
	var r = confirm("Are you sure you want to reset the form, will delete the catacteristicas you added!");
	if (r == true) {
	    $("#caracteristicas").html( '' );
	    desItems = 0;
		desCount = 0;
	    description_add();
	}
}

var variedad = 1;
function addVariedad(){
	variedad++;
	id = variedad;
	template = '<tr id="tr_id_' + id + '" >'+
				    '<td>'+
				        ' <div class="input-group my-colorpicker'+id+'"><input type="text" class="form-control input-sm" style="width:75px;" name="var_color[]" /><div class="input-group-addon"><i></i></div>'+
				    '</td>'+
				    '<td>'+
				    	'<input type="text" class="form-control input-sm type_float" placeholder="$00.00" name="var_precio[]" required>'+
					'</td>'+
					'<td>'+
				        '<div class="col-sm-2 col-md-1"><div id="img-id-' + id + '" class="custom-input-file">'+
				            '<input type="file" name="var_img_' + id+0 + '" class="file-img input-file" onchange="cambio(this,\'img-id-' + id + '\');"> '+
				            '<img src="../../sources/img/click.png" style="height:40px; " class="img-rounded img-thumbnail" border="0">'+
				        '</div></div>'+
				        '<div class="col-sm-2 col-md-1"><div id="img-id-' + id+1 + '" class="custom-input-file">'+
				            '<input type="file" name="var_img_' + id+1 + '" class="file-img input-file" onchange="cambio(this,\'img-id-' + id+1 + '\');"> '+
				            '<img src="../../sources/img/click.png" style="height:40px; " class="img-rounded img-thumbnail" border="0">'+
				        '</div></div>'+
				        '<div class="col-sm-2 col-md-1"><div id="img-id-' + id+2 + '" class="custom-input-file">'+
				            '<input type="file" name="var_img_' + id+2 + '" class="file-img input-file" onchange="cambio(this,\'img-id-' + id+2 + '\');"> '+
				            '<img src="../../sources/img/click.png" style="height:40px; " class="img-rounded img-thumbnail" border="0">'+
				        '</div></div>'+
				        '<div class="col-sm-2 col-md-1"><div id="img-id-' + id+3 + '" class="custom-input-file">'+
				            '<input type="file" name="var_img_' + id+3 + '" class="file-img input-file" onchange="cambio(this,\'img-id-' + id+3 + '\');"> '+
				            '<img src="../../sources/img/click.png" style="height:40px; " class="img-rounded img-thumbnail" border="0">'+
				        '</div></div>'+
				        '<div class="col-sm-2 col-md-1"><div id="img-id-' + id+4 + '" class="custom-input-file">'+
				            '<input type="file" name="var_img_' + id+4 + '" class="file-img input-file" onchange="cambio(this,\'img-id-' + id+4 + '\');"> '+
				            '<img src="../../sources/img/click.png" style="height:40px; " class="img-rounded img-thumbnail" border="0">'+
				        '</div></div>'+
				        '<div class="col-sm-2 col-md-1"><div id="img-id-' + id+5 + '" class="custom-input-file">'+
				            '<input type="file" name="var_img_' + id+5 + '" class="file-img input-file" onchange="cambio(this,\'img-id-' + id+5 + '\');"> '+
				            '<img src="../../sources/img/click.png" style="height:40px; " class="img-rounded img-thumbnail" border="0">'+
				        '</div></div>'+
				        '<div class="col-sm-2 col-md-1"><div id="img-id-' + id+6 + '" class="custom-input-file">'+
				            '<input type="file" name="var_img_' + id+6 + '" class="file-img input-file" onchange="cambio(this,\'img-id-' + id+6 + '\');"> '+
				            '<img src="../../sources/img/click.png" style="height:40px; " class="img-rounded img-thumbnail" border="0">'+
				        '</div></div>'+
				        '<div class="col-sm-2 col-md-1"><div id="img-id-' + id+7 + '" class="custom-input-file">'+
				            '<input type="file" name="var_img_' + id+7 + '" class="file-img input-file" onchange="cambio(this,\'img-id-' + id+7 + '\');"> '+
				            '<img src="../../sources/img/click.png" style="height:40px; " class="img-rounded img-thumbnail" border="0">'+
				        '</div></div>'+
				        '<div class="col-sm-2 col-md-1"><div id="img-id-' + id+8 + '" class="custom-input-file">'+
				            '<input type="file" name="var_img_' + id+8 + '" class="file-img input-file" onchange="cambio(this,\'img-id-' + id+8 + '\');"> '+
				            '<img src="../../sources/img/click.png" style="height:40px; " class="img-rounded img-thumbnail" border="0">'+
				        '</div></div>'+
				        '<div class="col-sm-2 col-md-1"><div id="img-id-' + id+9 + '" class="custom-input-file">'+
				            '<input type="file" name="var_img_' + id+9 + '" class="file-img input-file" onchange="cambio(this,\'img-id-' + id+9 + '\');"> '+
				            '<img src="../../sources/img/click.png" style="height:40px; " class="img-rounded img-thumbnail" border="0">'+
				        '</div></div>'+
				        '<span style="margin:0 !important; padding:0 !important;"></span>'+
				    '</td>'+
				    '<td>                                                            '+
				        '<button class="btn btn-danger btn-xs" type="button" onClick="removetr(' + id + ')">'+
				        	'<i class="fa fa-times"></i>'+
				        '</button>'+
				    '</td>'+
				'</tr><!-- /.tr-variedad -->';

	$("#tbl-variedad tbody").append( template );
	$(".my-colorpicker" + id).colorpicker();
	// Selector de color                
    $("#my-colorpicker" + id).spectrum({
    	preferredFormat: "hex3",
        showPaletteOnly: true,
        showPalette:true,
        hideAfterPaletteSelect:true,
        color: '#000',
        palette: [
            ["#000","#0028dd","#873f0e","#f2eee1","#36ba40"],
            ["#8c8c8c","#ffb5c1","#8b1a87","#fe0003","#ffffff"],
            ["#ffd233","#fe8300","#fe00c5"]
        ]
    });	

    $('#ms-talla-' + id).magicSuggest();
}

var primerclave = true;
function firstClave(){
	if( primerclave ){
		$("#var_clave").val( $("#pro_clave").val() );
	}
}

function primerclavefn(){
	primerclave = false;
}

function removetr(id){
	$("#tr_id_" + id).remove();
}

function removetrDB(id, var_id){
	var r = confirm('This record is already stored in the database, do you want to delete it permanently?');
	if( r ){
		$.ajax({
	        url: '../control/variedad.delete.php',  
	        type: 'POST',
	        data: param({
	                "var_id" : var_id
	            }),
	        success: function( data ){  
	        	var array = eval("(" + data + ")");
	        	if( array.success ){
	            	$("#tr_id_" + id).remove();	        		
	        	}
	        	else{
	        		alert('An unexpected error occurred, please try again later');
	        	}
	        }
	    });
	}
	
}

function deleteProducto( id ){
	// var r = confirm('Estas a punto de eliminar este registro, Aceptar para continuar?');
	// if( r ){
	// 	alert('Eliminando');
	// }
}