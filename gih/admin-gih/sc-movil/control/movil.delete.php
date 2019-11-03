<?php
	session_start();
	error_reporting(0);
	require_once '../../functions/conexion.class.php';
	require_once '../model/movil.class.php';

	$movil = new movil();

	$id = $_GET['movil'];

	if($movil->delete($id)){
		$_return['success'] = true;
		$_return['msg'] = 'Elemento eliminado correctamente!';
		echo json_encode($_return);
	}else{
		$_return['success'] = false;
		$_return['msg'] = 'No se pudo eliminar elemento!';
		echo json_encode($_return);
	}

?>
