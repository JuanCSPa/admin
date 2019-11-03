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

			/*$imagen = $_FILES['imagen']['name'];

			$tipo = $_FILES['imagen']['type'];*/

			 

			//Si existe imagen y tiene un tamaño correcto

			/*if (($imagen == !NULL)) 

			{

			   //indicamos los formatos que permitimos subir a nuestro servidor

			   if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png"))

			   {

			      // Ruta donde se guardarán las imágenes que subamos

			     $directorio = '../../sc-categorias/img/';

			      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente

			      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$imagen);

			    } 

			    else 

			    {

			       //si no cumple con el formato

			       echo "No se puede subir una imagen con ese formato ";

			    }

			}*/

		$_insert['cat_nombre']  	= $_POST['nombre'];
		$_insert['id_depende'] 		= $_POST['id_depende'];  //modifico id_depende => select_categoria_padre
		/*$_insert['cat_image'] = $imagen;
		$_insert['cat_descripcion'] = $_POST['descripcion'];*/
		$_insert['cat_url_amigable'] = url_amigable($_POST['nombre']);


		if( $mdb->insert($_insert)){
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
			case 400: $msg = 'Debes proporcionar el nombre de la categoria.'; break;
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