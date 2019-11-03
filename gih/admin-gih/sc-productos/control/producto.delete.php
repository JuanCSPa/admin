<?php
	session_start();
	error_reporting(0);
	require_once '../../functions/conexion.class.php';
	require_once '../model/producto.class.php';
	require_once '../model/imagen.class.php';
	require_once '../model/variedad.class.php';
	
	$producto = new producto();
	$imagen = new imagen();
	$variedad = new variedad();

	$id = $_POST['pro_id'];

	if($producto->delete($id)){
		if($variedad->deleteByProdId($id)){
			if($imagen->deleteByProdId($id)){
				echo '<script>location.href = "../view/";</script>';
			}
		}
	}
	
?>