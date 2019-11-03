<?php
	session_start();
	error_reporting(0);
	require_once '../../functions/conexion.class.php';
	require_once '../model/somos.class.php';

	$somos = new somos();

	$id = $_GET['somos'];

	if($somos->delete($id)){
		echo '<script>location.href = "../view/";</script>';
	}

?>
