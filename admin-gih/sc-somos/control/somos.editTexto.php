<?php
	session_start();
	error_reporting(0);
	require_once '../../functions/conexion.class.php';
	require_once '../model/somos.class.php';
	$somos = new somos();
	$_valores['somos_titulo'] = $_POST ['text1'];
  	$_valores['somos_desc'] = $_POST ['text2'];
	if( $somos->update($_valores, 'somos_id=' . sprintf('%d',15))){

		$_return['success'] = true;
		$_return['msg'] = 'Datos actualizados correctamente!';
		echo json_encode($_return);

	}else{
		$_return['success'] = false;
		$_return['msg'] = 'No se pudo subir informacion al servidor!';
		echo json_encode($_return);
	}


?>
