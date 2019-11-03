<?php
	session_start();
	error_reporting(0);
	require_once '../../functions/conexion.class.php';
	require_once '../model/industria.class.php';

	$industria = new industria();

	$id = $_GET['industria'];

	if($industria->delete($id)){
		echo '<script>location.href = "../view/";</script>';
	}
?>
