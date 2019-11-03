<?php
	require_once '../../functions/conexion.class.php';
	require_once '../model/categoria.class.php';
	$mdb = new categoria();
	$data = $mdb->delete( sprintf('%d', $_POST['categoria']) );

	$_result['success'] = $data;
	
	echo json_encode( $_result );
?>