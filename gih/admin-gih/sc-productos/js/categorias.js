/*
 * Programador JR
 * Noviembre 2016
 * Jorge Martínez Reséndiz HackThis!
 */

/*
    Alto ahí genio, si quieres verificar el código manda un mensaje a:
    hackmyroot@gmail.com
    SIDDEN
*/


var icoCat 		= ['fa-square', 'fa-plus-square'];	// Array de iconos en el frame de categorias
var opCatego 	= true;								// Opciones de edicion de lista de categorias
var fotoEdit 	= '';								// Controla la imagen correspondiente a la funcion cancelar de editar una categoria
var temp_cat_id = 0;								// cat_id temporal del nivel de las categorias
var pro_cat_id 	= 0;								// cat_id temporal de la categoria mostrada en relacion a los productos

$(document).ready(function(){
	setTimeout(
		function () {
			if(session.get('CAT_LEVEL') == false){
				showSubcategoria( 0 );
			}
			else{	
				showSubcategoria( session.get('CAT_LEVEL') );
			}

			if( session.get('CAT_TYPE') == 'SELECT' ){
				$(".li-item").removeClass( 'active' );
				$( "#li-item-" + session.get('CAT_LEVEL2') ).addClass( 'active' );
			}
		}
	, 0);

});

function plusCatego(cat_id) {

        $('#compose-modal').modal({
            show: 'true'
        });
        // Asignamos el id_depende al formulario
        $("#id_depende").val(cat_id);

}

function showSubcategoria( cat_id ){
	session.set('CAT_LEVEL', cat_id);
	session.set('CAT_TYPE', 'MORE');
	// Guardamos el id de la categoria en la que se encuentra
	temp_cat_id = cat_id;
	// Obtenemos los datos del usuario
	$.ajax({
		url: '../control/categoria.get.php',  
		type: 'POST',
		data: param({
				"clasificacion" : 'todos',
				"categoria" : cat_id
			}),
		beforeSend: function(){
			$("#li-categoria").append( '<li id="li-load">' + msgLoad( 'Cargando ...' ) + '</li>' );
		},
		success: function( data ){				
			$(".li-item").remove();
			$("#li-load").remove();

			var array = eval("(" + data + ")");

			var actual = '<li class="li-item" style="text-align:center;"><a class="three_cat" href="javascript:;">'+
                            '<i class="fa fa-star"></i>&nbsp;&nbsp;'+
                            '<span style="font-size:12px;" id="edit-txt">MI CATEGORIA ACTUAL</span>'+
                        '</a></li>';
			if ( array.length == 0 ){
				$("#li-categoria").append( '<li class="li-item" style="text-align:center;">-- Vacio --</li>' );
			}
			else{
				$.each( array, function( key, item ){
					var ico 	 = ( parseInt(item.subcategoria) == 0 )? icoCat[0] : icoCat[1];
					var onClk 	 = ( parseInt(item.subcategoria) == 0 )? '' : 'onclick="showSubcategoria(' + item.cat_id + ');"';
					var template = '<li class="li-item" id="li-item-' + item.cat_id + '">'+
	                                    '<a href="javascript:;">'+
	                                    // '<a href="javascript:getProductos(' + item.cat_id + ');">'+
											'<i class="fa '+ ico +'" ' + onClk + '></i>'+
	                                        '<span class="categoria-label" onclick="getProductos(' + item.cat_id + ');">' + item.cat_nombre + '</span>'+
	                                        '<span class="categ-none">'+
                       	'<i class="fa fa-pencil pre_edit-sm" onclick="ediCatego(' + item.cat_id + ',\'' + item.cat_nombre + '\')"></i>'+
	                                            '<i class="fa fa-times pre_erase-sm" onclick="delCatego(' + item.cat_id + ')"></i>'+
	                                            '<i class="fa fa-plus pre_plus-sm" onclick="plusCatego(' + item.cat_id + ')"></i>'+
	                                        '</span>'+
	                                    '</a>'+
	                                '</li>';
	                $("#li-categoria").append( template );
				});				
			}

			if( !opCatego ){
				$(".categ-none").css( 'display', 'inline' );				
			}
			else{
				$(".categ-none").css( 'display', 'none' );				
			}
		}
	});


	$.ajax({
		url: '../control/categoria.tree.php',  
		type: 'POST',
		data: param({
				"cat_id" : cat_id
			}),
		success: function( data ){
			var array = eval("(" + data + ")");

			$("#cat-tree").show();
			$("#cat-tree .nodos").html('');
			var todos = '<a class="three_cat" href="javascript:showSubcategoria(0);">'+
                            '<i class="fa fa-folder-open"></i>&nbsp;&nbsp;'+
                            '<span style="font-size:12px;" id="edit-txt">Todos</span>'+
                        '</a>';

            $("#cat-tree .nodos").append(todos);            

            if(array[0].id != null){
				$.each( array, function( key, item ){
					var template = '<a class="three_cat" href="javascript:showSubcategoria(' + item.id + ');">'+
	                                    '<i class="fa fa-angle-right"></i>&nbsp;&nbsp;'+
	                                    '<span style="font-size:12px;" id="edit-txt">' + item.nombre + '</span>'+
	                                '</a>';

	                $("#cat-tree .nodos").append(template);
				});
			}
		}
	});

	$("#id_depende").val( cat_id );

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
            console.log(claves);
        }
    });
}

function ediCatego(cat_id, nombre) {
		//var imgfilename = "../../sc-categorias/img/"+cat_image;
        $('#edit-modal').modal({
            show: 'true'
        });
        $('#cat_id').val(cat_id);
        $('#cat_nombre').val(nombre);
        //$('#actual').val(cat_image);
        //$('#descripcion_edit').val(cat_descripcion);
        //$('#imgEditar').attr('src', imgfilename);
}

function delCatego(id) {

        var r = confirm('Estas a punto de elimiar esta categoría, esta acción eliminará todas las subcategorías y su contenido. Pulse aceptar para continuar.');
        if (r) {
            $.ajax({
                url: '../control/categoria.delete.php',
                type: 'POST',
                data:{
                	'categoria': id
                },
                cache: false,
                success: function (html) {
                	var result = eval("(" + html + ")");
                    if (result.success == true) {
                        location.reload();
                    }else{
                        location.reload();
                        $("#msgBox").html(msgError('Error al borrar la imagen'));
                    }
                }
            });
        }
    
}

function optionsCatego(){
	if( opCatego ){
		$(".categ-none").css( 'display', 'inline' );
		opCatego = false;
		$("#edit-txt").text( 'Finalizar' );
	}
	else{
		$(".categ-none").css( 'display', 'none' );
		opCatego = true;
		$("#edit-txt").text( 'Editar' );
	}
}

function saveCategoria(){
	var formData = new FormData($('#frm-categoria')[0]);
	//var id_depende = $("#id_depende").val();
	//var nombre = $("#nombre").val();
	    $.ajax({
	        url: '../control/categoria.insert.php',
	        type: 'POST',
	        data:formData,
	        cache: false,
	        contentType: false,
			processData: false,
	        success: function (html) {
	            if (html == "1") {
	                location.reload();   
	            }
	            if (html == "0") {
	                location.reload();
	                $("#msgBox").html(msgError('Error al insertar, vuelve a intentarlo'));
	            }
	            $("#id_depende").val(id_depende);
	            $("#nombre").val('');
	            $("#descripcion").val('');
	            showSubcategoria(id_depende);
	            setTimeout(function () {
	                $('#compose-modal').modal('hide');
	                $("#msgBox").html('');

	            }, 1000);
	        }
	    });
}


function updateCategoria(){
	var formData = new FormData($('#frm-edit-categoria')[0]);
	//var id = $("#cat_id").val();
	//var nombre = $("#cat_nombre").val();
	$.ajax({
	    url: '../control/categoria.update.php',
	    data:formData,
	    type: "POST",
	    cache: false,
	    contentType: false,
		processData: false,
	    success: function (html) {
	    	var array = eval("(" + html +")");
	        if (array.success == true) {
	            location.reload();
	        }else{
	            location.reload();
	            $("#msgBoxEdit").html(msgError('Error, verifica los datos, si es necesario vuelve a cargar la imagen.'));
	        }
	    }
	});
}


var loadImagen = function(file){
	var imagen = file.files[0];
	var reader = new FileReader();
	
	reader.onload = (function(theFile) {
        return function(e) {
			var kb = escape(theFile.size) / 1024;
			
			if( kb <= 500 ){
				if(kb < 1024){
					var tamano = number_format(kb,2,'.',',') + ' Kb';
				}else{
					var mb = (kb / 1024);
					var tamano = number_format(mb,2,'.',',') + ' Mb';
				}
				
				var nombre = escape(theFile.name).split('.');
				var extencion = (nombre.length) - 1;
				var s = nombre[extencion];
				
				if (s == 'jpg' | s == 'jpeg' | s == 'gif' | s == 'png' | s == 'PNG' | s == 'psd'){
					document.getElementById("imgNewCatego").src = e.target.result;
					var botonera = '<a onclick="file_cancel();" class="btn btn-danger btn-xs">Cancelar</a>';
	                document.getElementById("file-controles").innerHTML = botonera;
	                $("#btnLoad").hide();
				}
				else{
					alert("El archivo seleccionado no es una imagen");
					document.getElementById("file-controles").innerHTML = '';
					$("#btnLoad").show();
					$("#eliminarCat").hide();
				}
			}
			else{
				alert("Se ha superado los 150Kb permitidos.");
				document.getElementById("file-controles").innerHTML = '';
				$("#btnLoad").show();
			}
        };
      })(imagen);
	reader.readAsDataURL(imagen);
}

var file_cancel = function(){
	document.getElementById("imgNewCatego").src = '../../sources/img/no_disponible.jpg';
	document.getElementById("file-controles").innerHTML = '';	
	$("#btnLoad").show();
}

var loadImagen_e = function(file){
	var imagen = file.files[0];
	var reader = new FileReader();
	
	reader.onload = (function(theFile) {
        return function(e) {
			var kb = escape(theFile.size) / 1024;
			
			if( kb <= 500 ){
				if(kb < 1024){
					var tamano = number_format(kb,2,'.',',') + ' Kb';
				}else{
					var mb = (kb / 1024);
					var tamano = number_format(mb,2,'.',',') + ' Mb';
				}
				
				var nombre = escape(theFile.name).split('.');
				var extencion = (nombre.length) - 1;
				var s = nombre[extencion];
				
				if (s == 'jpg' | s == 'jpeg' | s == 'gif' | s == 'png' | s == 'PNG' | s == 'psd'){
					document.getElementById("imgNewCatego-e").src = e.target.result;
					var botonera = '<a onclick="file_cancel_e();" class="btn btn-danger btn-xs">Cancelar</a>';
	                document.getElementById("file-controles-e").innerHTML = botonera;	                
				}
				else{
					alert("El archivo seleccionado no es una imagen");
					document.getElementById("file-controles-e").innerHTML = '';
				}
			}
			else{
				alert("Se ha superado los 150Kb permitidos.");
				document.getElementById("file-controles-e").innerHTML = '';
			}
        };
      })(imagen);
	reader.readAsDataURL(imagen);
}

var file_cancel_e = function(){
	if( fotoEdit == '' ){
		document.getElementById("imgNewCatego-e").src = '../../sources/img/no_disponible.jpg';
	}else{
		document.getElementById("imgNewCatego-e").src = fotoEdit;
	}
	document.getElementById("file-controles-e").innerHTML = '';	
	$("#btnLoad").show();
}

var eliminar_e = function(cat_id){
	var r = confirm('¿Estás seguro que quieres eliminar esta imagen?');
	if( r ){

		$.ajax({
	        url: '../control/imagenCat.delete.php',  
	        type: 'POST',
	        data: param({
	                "cat_id" : cat_id
	            }),
	        success: function( data ){            
	            var array = eval("(" + data + ")");
	            document.getElementById("imgNewCatego-e").src = '../../sources/img/no_disponible.jpg';
	            $("#eliminarCat").hide();
	        }
	    });
		
	}
	
}

function exeUpdate(e){
	if (e.keyCode == 13) {
        updateCategoria();
    	return false;
    }
}

function exeSave(e){
	if (e.keyCode == 13) {
		saveCategoria();
    	return false;
    }
}