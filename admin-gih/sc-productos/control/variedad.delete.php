<?php
session_start();
include '../../functions/conexion.class.php';
include '../model/variedad.class.php';

$id = $_POST['var_id'];

$variedad = new variedad();

if($variedad->delete($id)){
	$_return['success'] = true;
	$_return['msg'] = 'Variedad Eliminada.';
	echo json_encode($_return);
}else{
	$_return['success'] = false;
	$_return['msg'] = 'Variedad no se logo eliminar, intentar de nuevo mas tarde.';
	echo json_encode($_return);
}

?>