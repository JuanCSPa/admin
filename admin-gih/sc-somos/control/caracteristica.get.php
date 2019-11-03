<?php
	session_start();
	error_reporting(0);
	require_once '../../functions/conexion.class.php';
	require_once '../model/caracteristicas.class.php';
	$carac = new caracteristicas();
	$getDatos = $carac->get();
	if( count($getDatos) > 0){

		$_return['success'] = true;
		$_return['msg'] = 'Tiene info';
		$_return['datos'] = $getDatos;
		echo json_encode($_return);

	}else{
		$_return['success'] = false;
		$_return['msg'] = 'No tiene nada';
		echo json_encode($_return);
	}


?>
