<?php

	session_start();

	error_reporting(0);

	require_once '../../functions/conexion.class.php';

	require_once '../model/historia.class.php';

	

	$historia = new historia();

	$_valores['hst_contenido'] = $_POST['corta'];
	$_valores['hs_titulo'] = $_POST['titulo'];
	$_valores['hs_id_pro'] = $_POST['productos'];


	if( $historia->update($_valores, 'hst_id=' . sprintf('%d',1))){

		$_return['success'] = true;
		$_return['msg'] = 'Informacion guardada con exito!';
		echo json_encode($_return);

	}

?>