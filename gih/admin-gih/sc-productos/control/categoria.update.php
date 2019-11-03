<?php
	session_start();
	require_once '../../functions/conexion.class.php';
	require_once '../model/categoria.class.php';
	
	
	$mdb = new categoria();

	if( empty($_POST['nombre']) ){
		$_return['success'] = false;
		$_return['msg'] = msg( 400 );
		echo json_encode($_return);
		die();
	}
	else{
		// Recibo los datos de la imagen

		/*$imagen = $_FILES['imagenEditar']['name'];

		$tipo = $_FILES['imagenEditar']['type'];*/

		 

		//Si existe imagen y tiene un tamaño correcto

		/*if (($imagen == !NULL)) 

		{

		   //indicamos los formatos que permitimos subir a nuestro servidor

		   if (($_FILES["imagenEditar"]["type"] == "image/gif") || ($_FILES["imagenEditar"]["type"] == "image/jpeg") || ($_FILES["imagenEditar"]["type"] == "image/jpg") || ($_FILES["imagenEditar"]["type"] == "image/png"))

		   {

		      // Ruta donde se guardarán las imágenes que subamos

		      $directorio = '../../sc-categorias/img/';

		      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente

		      move_uploaded_file($_FILES['imagenEditar']['tmp_name'],$directorio.$imagen);

		    } 

		    else 

		    {

		       //si no cumple con el formato

		       echo "No se puede subir una imagen con ese formato ";

		    }

		}else{

			$imagen = $_POST['actual'];
		}*/

		$_update['cat_nombre']  	= $_POST['nombre'];
		/*$_update['cat_image'] = $imagen;
		$_update['cat_descripcion'] = $_POST['descripcion_edit'];*/

		$_update['cat_url_amigable'] = url_amigable($_POST['nombre']);

		if( $mdb->update($_update, 'cat_id = ' . sprintf('%d', $_POST['cat_id']))){
			$_return['success'] = true;			      
			$_return['msg'] = msg(408);		
			echo json_encode($_return);
		}
		else{
			$_return['success'] = false;
			$_return['msg'] = msg(407);
			echo json_encode($_return);
			die();
		}
	}
	function msg($c){
		switch ($c) {
			case 100: $msg = 'Mensaje de prueba.'; break;
			case 400: $msg = 'Debes proporcionar el nombre de la categoria.'; break;
			case 401: $msg = 'Debes proporcionar un email valido.'; break;
			case 402: $msg = 'Debes proporcionar la confirmación de tu contraseña.'; break;
			case 403: $msg = 'Las contraseñas no coinciden.'; break;
			case 404: $msg = 'La clave debe tener al menos 8 caracteres.'; break;
			case 405: $msg = 'Su password es seguro.'; break;
			case 406: $msg = 'Su password no es seguro.'; break;
			case 407: $msg = 'No se guardo en base de datos, revisar datos ingresados.'; break;
			case 408: $msg = 'Se ha guardado exitosamente.'; break;
			default: $msg  = 'Undefined'; break;
		}

		return $msg;
	}

	function url_amigable($url) {
		// Tranformamos todo a minusculas
		$url = strtolower($url);
		//Rememplazamos caracteres especiales latinos
		$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
		$repl = array('a', 'e', 'i', 'o', 'u', 'n');
		$url = str_replace ($find, $repl, $url);
		// Añaadimos los guiones
		$find = array(' ', '&', '\r\n', '\n', '+'); 
		$url = str_replace ($find, '-', $url);
		// Eliminamos y Reemplazamos demás caracteres especiales
		$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
		$repl = array('', '-', '');
		$url = preg_replace ($find, $repl, $url);
		return $url;

		}

?>