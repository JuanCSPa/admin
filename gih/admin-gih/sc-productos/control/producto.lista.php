<?php
	session_start();
	require_once '../../functions/conexion.class.php';
	require_once '../model/categoria.class.php';
	require_once '../model/producto.class.php';
	$prod = new producto();
	$catego = new categoria();

	if(isset($_REQUEST['cat'])){
		$data = $prod->getWhere('pro_cat_id in (' . $_REQUEST['cat'] . ')');		
	}
	else{
	 	$data = $prod->getList(0);
	}
	
	$nodo = array();
	foreach ($data as $value) {
		$registro = $catego->get( $value['pro_cat_id'] );
		$options = '<span id=\"btn_esp_2\"> <i class=\"fa fa-pencil pre_edit-sm \" onclick=\"location.href = \'edit.php?p='.$value['pro_id'].	'\';\"></i> <i class=\"fa fa-trash-o pre_erase-sm pre_eraseFN\" data-pro=\"'.$value['pro_id'].'\"></i> </span>'; 
		
		$nodo[] = '["' . $value['pro_nombre'] . '", "' . $value['pro_codigo'] . '","' . $options . '"]';
	}
?>
{"data": [<?=implode(',', $nodo)?>] }