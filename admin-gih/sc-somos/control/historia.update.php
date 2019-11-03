<?php

	session_start();

	error_reporting(0);

	require_once '../../functions/conexion.class.php';

	require_once '../model/historia.class.php';



	$somos = new somos();

	//$_valores['esc_image'] = $_POST['imagen'];
	$_valores['somos_titulo'] = $_POST['title'];
	$_valores['somos_desc'] = $_POST['descCor'];


	if( $somos->update($_valores, 'somos_id=' . sprintf('%d',1))){

		$_return['success'] = true;
		$_return['msg'] = 'Informacion guardada con exito!';
		echo json_encode($_return);
	}

?>
