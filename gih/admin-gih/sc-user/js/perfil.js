/*
 * Administrador de Contenidos
 * Diciembre 2015
 * Alejandro Grijalva Antonio @HiProgrammer
 * Derechos Reservados
 */

// Generamos la inclusion del menu
var perfil = [];
var defFoto = ['avatar2.png', 'avatar5.png'];

(function($){
	// Obtenemos los datos del usuario
	var url = '../../functions/user.json.php';
	$.getJSON(url, function(data){
		if(!data.success){
			location.href = '../../index.php';
		}
		else{
			perfil.push( data );
			var firstName = data.userName.split(' ');
			$(".dUserName").html(data.userName);
			$(".dEmpresa").html(data.info.empresa);
			$(".dSistema").html(data.info.name);
			$(".dVersion").html('v' + data.info.version);
			$(".dSaludo").html('Hola, ' + firstName[0]);
			if(data.sexo == 'm'){
				if(data.foto == ''){
					$(".img-usr").attr( 'src', '../../sources/img/' + defFoto[1] );
				}else{
					$(".img-usr").attr( 'src', '../../files/img/' + data.foto );
				}
			}
			else{
				if(data.foto == ''){
					$(".img-usr").attr( 'src', '../../sources/img/' + defFoto[0] );
				}else{
					$(".img-usr").attr( 'src', '../../files/img/' + data.foto );
				}
			}

			// Llenamos el formulario de edicion del perfil
			$("#usu_nombre").val( data.userName );
			$("#usu_mail").val( data.userMail );

			
			if(data.sexo == 'm'){
				document.getElementById('rad_h').checked = true;
				document.getElementById('rad_m').checked = false;
				if(data.foto == ''){
					$("#imgPerfil").attr( 'src', '../../sources/img/' + defFoto[1] );
				}else{
					$("#imgPerfil").attr( 'src', '../../files/img/' + data.foto );
				}				
			}
			else{
				document.getElementById('rad_h').checked = false;
				document.getElementById('rad_m').checked = true;
				if(data.foto == ''){
					$("#imgPerfil").attr( 'src', 'img/' + defFoto[0] );
				}else{
					$("#imgPerfil").attr( 'src', '../files/img/' + data.foto );
				}
			}

			$("#usu_caduca").val( data.caduca );

		}
	});	

	$("#save-perfil").click(function(){
		var formData = new FormData($("#frm_perfil")[0]);
		
		$.ajax({
			url: '../control/user.update.php',  
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){
				$("#msgBox").html( msgLoad( 'Guardando ...' ) );
			},
			success: function( data ){				
				var array = eval("(" + data + ")");
				if(array.success == true)
				{
					$("#msgBox").html( msgInfo( array.msg ) );
				}
				else
				{
					$("#msgBox").html( msgError( array.msg ) );
				}
			},
			error: function(){
				$("#msgBox").html( msgError( 'Error inesperado de base de datos', '<i class="fa fa-code"></i> Ups! ' ) );
			}
		});		
	});

	$("#btnSubirImagen").click(function(){
		alert('ya se empieza a subir');
	});


}( jQuery ));

