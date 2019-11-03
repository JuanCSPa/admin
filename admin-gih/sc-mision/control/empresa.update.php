<?php
	session_start();
	error_reporting(0);

	require_once '../../functions/conexion.class.php';
	require_once '../model/empresa.class.php';



	$empresa = new empresa();

	$_valores['emp_mision'] = $_POST['titulo1'];
	$_valores['emp_vision'] = $_POST['titulo2'];
	$_valores['emp_contmi'] = $_POST['corta'];
	$_valores['emp_contvi'] = $_POST['vision'];


	if( $empresa->update($_valores, 'emp_id='. sprintf('%d',1))){

		$_return['success'] = true;
		$_return['msg'] = 'Informacion guardada con exito!';
		echo json_encode($_return);
	}

?>
