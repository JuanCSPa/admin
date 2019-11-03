<?php
	require_once '../../functions/conexion.class.php';
	require_once '../model/categoria.class.php';
	$mdb = new categoria();
	$id = sprintf('%d', $_REQUEST['cat_id']);	
	echo  $id . ',';
	busca_id_anidados(sprintf('%d',$id));
	function busca_id_anidados($cat_id){
		$mdb = new categoria();
		$valores = $mdb->getById($cat_id);
		foreach($valores as $data){
			// echo $data['cat_nombre'] . ' - entro <br>';
			echo  '' . $data['cat_id'] . ',';
			$claves[$data['cat_id']] = $data['cat_id'];			

			busca_id_anidados($data['cat_id']);
		}		
		return true;
	}
?>