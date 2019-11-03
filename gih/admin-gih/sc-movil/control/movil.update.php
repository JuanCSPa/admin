<?php

	session_start();

	error_reporting(0);

	require_once '../../functions/conexion.class.php';

	require_once '../model/movil.class.php';



	$movil = new movil();



	// Recibo los datos de la imagen

	$imagen = $_FILES['imagen']['name'];

	$tipo = $_FILES['imagen']['type'];


	//Si existe imagen y tiene un tamaño correcto

	if (($imagen == !NULL))

	{

	   //indicamos los formatos que permitimos subir a nuestro servidor

	   if (($_FILES["imagen"]["type"] == "image/gif") || ($_FILES["imagen"]["type"] == "image/jpeg") || ($_FILES["imagen"]["type"] == "image/jpg") || ($_FILES["imagen"]["type"] == "image/png"))

	   {

	      // Ruta donde se guardarán las imágenes que subamos

	      $directorio = '../img/';

	      // Muevo la imagen desde el directorio temporal a nuestra ruta indicada anteriormente

	      move_uploaded_file($_FILES['imagen']['tmp_name'],$directorio.$imagen);

	    }

	    else
	    {
	       //si no cumple con el formato
	       echo "No se puede subir una imagen con ese formato ";
	    }
	}else{
		$imagen = $_POST['actual'];
	}



	$_valores['mv_titulo'] = $_POST ['nombre'];
  $_valores['mv_des'] = $_POST ['descCorta'];
	$_valores['mv_image'] = $imagen;
	$_valores['mv_url'] = $_POST['url'];
	if( $movil->update($_valores, 'mv_id=' . sprintf('%d',$_POST['idmv']))){
		$_return['success'] = true;
		$_return['msg'] = 'Datos actualizados correctamente!';
		echo json_encode($_return);

	}else{
		$_return['success'] = false;
		$_return['msg'] = 'No se pudo actualizar informacion al servidor!';
		echo json_encode($_return);
	}

?>
