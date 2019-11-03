<?php

	session_start();

	error_reporting(0);

	require_once '../../functions/conexion.class.php';

	require_once '../model/historia.class.php';



	$noticias = new $noticias();

	$_valores['esc_image'] = $_POST['imagen'];
	$_valores['not_titulo'] = $_POST['title'];
	$_valores['not_des'] = $_POST['descCor'];
  $_valores['not_content'] = $_POST['conteni']


	if( $noticias->update($_valores, 'not_id=' . sprintf('%d',$_POST['idnot']))){

		$_return['success'] = true;
		$_return['msg'] = 'Informacion guardada con exito!';
		echo json_encode($_return);
	}

?>
