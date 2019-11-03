<?php
session_start();
include '../../functions/conexion.class.php';
include '../model/imagen.class.php';

$id = $_POST['key'];

$imagen = new imagen();

if($imagen->delete($id)){
	$_return['success'] = true;
	$_return['msg'] = 'Imagen eliminada';
	echo json_encode($_return);
}else{
	$_return['success'] = false;
	$_return['msg'] = 'Imagen no se pudo eliminar';
	echo json_encode($_return);
}

?>