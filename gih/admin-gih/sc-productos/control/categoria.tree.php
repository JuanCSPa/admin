<?php
	require_once '../../functions/conexion.class.php';
	require_once '../model/categoria.class.php';
	$mdb = new categoria();

	$id = sprintf('%d', $_POST['cat_id']);	//modifico cat_id => cat_type

	$aux = 0;
	do {
		$aux++;
		$valores 				 = $mdb->get($id);
		$id 					 = $valores[0]['id_depende']; //modifico id_depende=> cat_type
		$_arbol[$aux]['id'] 	 = $valores[0]['cat_id'];
		$_arbol[$aux]['nombre']  = $valores[0]['cat_nombre']; //cat_id => cat_type
		$_arbol[$aux]['depende'] = $valores[0]['id_depende'];
		
	} while ($valores[0]['id_depende'] != 0);	
	sort($_arbol);
	echo json_encode( $_arbol );
?>