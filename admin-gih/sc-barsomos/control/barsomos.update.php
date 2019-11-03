<?php
	session_start();
	error_reporting(0);

	require_once '../../functions/conexion.class.php';
	require_once '../model/barsomos.class.php';



	$barra = new barra();

	$_valores['bar_titulo_1'] = $_POST['titulo1'];
	$_valores['bar_titulo_2'] = $_POST['titulo2'];
	$_valores['bar_content_1'] = $_POST['content1'];
	$_valores['bar_content_2'] = $_POST['content2'];


	if( $barra->update($_valores, 'bar_id='. sprintf('%d',1))){

		$_return['success'] = true;
		$_return['msg'] = 'Informacion guardada con exito!';
		echo json_encode($_return);
	}

?>
