<?php

	session_start();
	error_reporting(0);

	require_once '../../functions/conexion.class.php';
	require_once '../model/socios.class.php';

	$socios = new socios();



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

	$text = 'desclar'.$_POST['idsocios'];
	$text2 = 'desc'.$_POST['idsocios'];
	$_valores['soc_nombre'] = $_POST['nombre'];
	$_valores['soc_certitulo'] = $_POST['nombre2'];
	$_valores['soc_image'] = $imagen;
	$_valores['soc_cer_content'] = $_POST[$text2];
	$_valores['soc_contenido'] = $_POST[$text];
	//$_valores['marca_url'] = $_POST['url'];

	if( $socios->update($_valores, 'soc_id=' . sprintf('%d',$_POST['idsocios']))){

		$_return['success'] = true;
		$_return['msg'] = 'Datos actualizados correctamente!';
		echo json_encode($_return);

	}else{
		$_return['success'] = false;
		$_return['msg'] = 'No se pudo subir informacion al servidor!';
		echo json_encode($_return);
	}

?>
