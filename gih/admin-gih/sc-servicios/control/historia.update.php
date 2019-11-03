<?php

	session_start();

	error_reporting(0);

	require_once '../../functions/conexion.class.php';

	require_once '../model/historia.class.php';



	$servicios = new servicios();

	//$_valores['esc_image'] = $_POST['imagen'];
	$_valores['ser_titulo'] = $_POST['title'];
	$_valores['ser_content'] = $_POST['descCor'];


	if( $servicios->update($_valores, 'ser_id=' . sprintf('%d',1))){

		$_return['success'] = true;
		$_return['msg'] = 'Informacion guardada con exito!';
		echo json_encode($_return);
	}

?>
