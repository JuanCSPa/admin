<?php

	session_start();

	error_reporting(0);

	require_once '../../functions/conexion.class.php';

	require_once '../model/categoria.class.php';

	

	$categoria = new categoria();

	$_valores['cat_nombre'] = $_POST['nombre'];

	$_valores['cat_nombre_1'] = $_POST['nombre1'];

	if( $categoria->update($_valores, 'cat_id=' . sprintf('%d',$_POST['idcategoria']))){

		echo '<script>location.href = "../view/";</script>';

	}

?>