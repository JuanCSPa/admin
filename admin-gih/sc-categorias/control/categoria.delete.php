<?php
	session_start();
	error_reporting(0);
	require_once '../../functions/conexion.class.php';
	require_once '../model/categoria.class.php';

	$categoria = new categoria();

	$id = $_GET['categoria'];

	if($categoria->delete($id)){
		echo '<script>location.href = "../view/";</script>';
	}
?>
