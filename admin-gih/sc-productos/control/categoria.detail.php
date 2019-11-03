<?php
	require_once '../../functions/conexion.class.php';
	require_once '../model/categoria.class.php';
	$mdb = new categoria();
	$data = $mdb->get( sprintf('%d', $_POST['categoria']) );	
	echo json_encode( $data );
?>