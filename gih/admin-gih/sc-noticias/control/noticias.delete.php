<?php
	session_start();
	error_reporting(0);
	require_once '../../functions/conexion.class.php';
	require_once '../model/noticias.class.php';

	$noticias = new noticias();

	$id = $_GET['noticias'];

	if($noticias->delete($id)){
		echo '<script>location.href = "../view/";</script>';
	}

?>
