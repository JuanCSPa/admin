<?php
	
	//$bdInteli = $_POST['bdInteli'];
	$cantidad = count($_FILES["imagen"]["tmp_name"]);
	$directorio = '../img/';
	for ($i=0; $i < $cantidad; $i++) {
		$nombre = $_FILES["imagen"]["name"][$i];
		if (move_uploaded_file($_FILES["imagen"]["tmp_name"][$i], $directorio.$nombre) ){
		    $output = array('uploaded' => 'OK' );
		} else {
		   $output = array('uploaded' => 'ERROR' );
		}
		echo json_encode($output);
	}
?>