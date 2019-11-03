<?php

	session_start();

	error_reporting(0);

	require_once '../../functions/conexion.class.php';

	require_once '../model/producto.class.php';

	$producto = new producto();

	$directorio = '../img/';

	$imagenNombre = $_FILES['imagen']['name'];

	$imagen1 = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	if (($imagen1 == !NULL))
	{
	   move_uploaded_file($_FILES['imagen1']['tmp_name'],$directorio.$imagen1);
	}

	$imagen2 = $_FILES['imagen2']['name'];
	$tipo = $_FILES['imagen2']['type'];
	if (($imagen2 == !NULL))
	{
	   move_uploaded_file($_FILES['imagen2']['tmp_name'],$directorio.$imagen2);
	}

	$imagen3 = $_FILES['imagen3']['name'];
	$tipo = $_FILES['imagen3']['type'];
	if (($imagen3 == !NULL))
	{
	    move_uploaded_file($_FILES['imagen3']['tmp_name'],$directorio.$imagen3);
	
	}

	$_valores['pro_cat_id'] = $_POST['cat_id'];
	$_valores['pro_nombre'] = $_POST['nombre'];
	$_valores['pro_desc_corta'] = $_POST['corta'];
	$_valores['pro_desc_larga'] = $_POST['larga'];
	$_valores['pro_id_marca'] = $_POST['marca'];
	$_valores['pro_url_amigable'] = url_amigable($_POST['nombre']);
	$_valores['pro_image'] = $imagen1; //
	$_valores['pro_image_2'] = $imagen2; //
	$_valores['pro_image_3'] = $imagen3; //

	if( $producto->insert($_valores) ){
			$_return['success'] = true;
			$_return['msg'] = 'Informacion guardada con exito!';
			echo json_encode($_return);

	}else{
		$_return['success'] = false;
		$_return['msg'] = 'No se pudo subir informacion al servidor!';
		echo json_encode($_return);
		die();
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
