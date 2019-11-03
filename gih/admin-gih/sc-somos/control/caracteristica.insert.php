<?php
	session_start();
	error_reporting(0);
	require_once '../../functions/conexion.class.php';
	require_once '../model/caracteristicas.class.php';
	$carac = new caracteristicas();
	$_valores['car_nombre'] = $_POST['nombre'];

	if( $carac->insert($_valores) ){

		$_return['success'] = true;
		$_return['msg'] = 'Datos ingresados correctamente!';
		echo json_encode($_return);

	}else{
		$_return['success'] = false;
		$_return['msg'] = 'No se pudo subir informacion al servidor!';
		echo json_encode($_return);
	}

?>