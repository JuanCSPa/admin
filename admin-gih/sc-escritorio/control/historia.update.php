<?php

	session_start();

	error_reporting(0);

	require_once '../../functions/conexion.class.php';

	require_once '../model/historia.class.php';



	$historia = new historia();

	//$_valores['esc_image'] = $_POST['imagen'];
	$_valores['esc_titulo'] = $_POST['titulo'];
	$_valores['esc_des'] = $_POST['corta'];


	if( $historia->update($_valores, 'esc_id=' . sprintf('%d',1))){

		$_return['success'] = true;
		$_return['msg'] = 'Informacion guardada con exito!';
		echo json_encode($_return);

	}

?>
