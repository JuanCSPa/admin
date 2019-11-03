<?php
	session_start();
	error_reporting(0);
	require_once '../../functions/conexion.class.php';
	require_once '../model/noticias.class.php';
	$noticias = new noticias();
	$imagen = $_FILES['imagen']['name'];
	$tipo = $_FILES['imagen']['type'];
	if (($imagen == !NULL))
	{
	   if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png"))
	   {
	      $directorio = '../img/';
	      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$imagen);
	    }
	    else
	    {
	       echo "No se puede subir una imagen con ese formato ";
	    }
	}

	$_valores['not_image'] = $imagen;
	$_valores['not_titulo'] = $_POST['nombre'];
	$_valores['not_des'] = $_POST['descorta'];
  $_valores['not_content'] = $_POST['desclar'];
	if( $noticias->insert($_valores) ){

		echo '<script>location.href = "../view/";</script>';

	}

?>
