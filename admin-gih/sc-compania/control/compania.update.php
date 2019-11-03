<?php
	session_start();
	error_reporting(0);

	require_once '../../functions/conexion.class.php';
	require_once '../model/compania.class.php';

	$compania = new compania();

	$_valores['com_titulopri'] = $_POST['titulo1'];
	$_valores['com_subtitulo'] = $_POST['subtitulo'];
	$_valores['com_contentuno'] = $_POST['title1'];
	$_valores['com_contentdos'] = $_POST['title2'];
	$_valores['com_contentres'] = $_POST['title3'];
	$_valores['com_contentcuatro'] = $_POST['title4'];

	if($compania->update($_valores, 'com_id='. sprintf('%d',1))){

		$_return['success'] = true;
		$_return['msg'] = 'Informacion guardada con exito!';
		echo json_encode($_return);
	}

?>
