<?php
	session_start();
	error_reporting(0);
	require_once '../../functions/conexion.class.php';
	require_once '../model/socios.class.php';

	$socios = new socios();

	$id = $_GET['socios'];

	if($socios->delete($id)){
		$_return['success'] = true;
		$_return['msg'] = 'Contenido eliminado con exito.!';
		echo json_encode($_return);
	}else{
		$_return['success'] = false;
		$_return['msg'] = 'No se logro eliminar contenido.!';
		echo json_encode($_return);
	}

?>
