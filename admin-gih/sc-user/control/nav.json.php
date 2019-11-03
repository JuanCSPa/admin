<?php
	session_start();
	//Validamos el tipo de usuario
	if( $_SESSION['perfil'] == 1 )
	{
		$_nav[0]['ico'] 	= '<i class="fa fa-th-large"></i>';
		$_nav[0]['nombre'] 	= 'Productos';
		$_nav[0]['href'] 	= '../../sc-store/view';

		$_nav[1]['ico'] 	= '<i class="fa fa-file-text"></i>';
		$_nav[1]['nombre'] 	= 'Contenido';
		$_nav[1]['href'] 	= '../../sc-content/view/';
		
	}
	else
	{
		$_nav[0]['ico'] 	= '<i class="fa fa-dashboard"></i>';
		$_nav[0]['nombre'] 	= 'Productos SL';
		$_nav[0]['href'] 	= 'productos.html';
	}

	echo json_encode( $_nav );


?>