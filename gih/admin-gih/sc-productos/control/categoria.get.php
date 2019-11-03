<?php
	require_once '../../functions/conexion.class.php';
	require_once '../model/categoria.class.php';
	$mdb = new categoria();
	
	switch ( $_POST['clasificacion'] ) {
		case 'todos':
			$data = $mdb->getById( sprintf('%d', $_POST['categoria']) );
			break;
		
		default:
			
			break;
	}
	
	$cont = 0;
	foreach ($data as $items) {
		$subcat = $mdb->getById( $items['cat_id'] );  //modifico cat_id => cat_type
		if(count($subcat) == 0){
			$data[ $cont ]['subcategoria'] = 0;
		}
		else{
			$data[ $cont ]['subcategoria'] = 1;
		}
		$cont++;
	}
	echo json_encode( $data );
?>