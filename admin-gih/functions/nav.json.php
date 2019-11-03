<?php
	session_start();
	include 'languaje.php';
	//Validamos el tipo de usuario
	if( $_SESSION['perfil'] == 1 )
	{
		$_nav[0]['ico'] 	= '<i class="fa fa-th-large"></i>';
		$_nav[0]['nombre'] 	= 'Products';
		$_nav[0]['href'] 	= $GLOBALS['url_proyect'] . 'nw-admin/sc-store/view';

		$_nav[2]['ico'] 	= '<i class="fa fa-users"></i>';
		$_nav[2]['nombre'] 	= 'Customers';
		$_nav[2]['href'] 	= $GLOBALS['url_proyect'] . 'nw-admin/sc-customer/view/';

		$_nav[3]['ico'] 	= '<i class="fa fa-calendar"></i>';
		$_nav[3]['nombre'] 	= 'Orders';
		$_nav[3]['href'] 	= $GLOBALS['url_proyect'] . 'nw-admin/sc-order/view/';


		$_nav[4]['ico'] 	= '<i class="fa fa-barcode"></i>';
		$_nav[4]['nombre'] 	= 'New Scan Product';
		$_nav[4]['href'] 	= $GLOBALS['url_proyect'] . 'nw-admin/sc-scan/view/';
		
		$_nav[5]['ico']		= '<i class="fa fa-bars"></i>';
		$_nav[5]['nombre']  ='Others'; 
		$_nav[5]['href'] 	= $GLOBALS['url_proyect'] . 'nw-admin/sc-other/view/';		
		
		
		// $_nav[4]['ico'] 	= '<i class="fa fa-phone"></i>';
		// $_nav[4]['nombre'] 	= 'CallCenter';
		// $_nav[4]['href'] 	= $GLOBALS['url_proyect'] . 'nw-admin/sc-call/view/';
		
	/*	$_nav[4]['ico'] 	= '<i class="fa fa-usd"></i>';
		$_nav[4]['nombre'] 	= 'Tipo de Cambio';
		$_nav[4]['href'] 	= $GLOBALS['url_proyect'] . 'nw-admin/sc-cambio/view/';
		*/
		/*$_nav[5]['ico'] 	= '<i class="fa fa-line-chart"></i>';
		$_nav[5]['nombre'] 	= 'Ventas';
		$_nav[5]['href'] 	= $GLOBALS['url_proyect'] . 'nw-admin/sc-ventasAn/view/';*/
/*		
		$_nav[6]['ico'] 	= '<i class="fa fa-file-text"></i>';
		$_nav[6]['nombre'] 	= 'Inventario';
		$_nav[6]['href'] 	= $GLOBALS['url_proyect'] . 'nw-admin/sc-inventarioAn/view/';*/
/*
		$_nav[7]['ico'] 	= '<i class="fa fa-home"></i>';
		$_nav[7]['nombre'] 	= 'Contenido';
		$_nav[7]['href'] 	= $GLOBALS['url_proyect'] . 'nw-admin/sc-content/view/';
		*/
	}
	else
	{
		$_nav[0]['ico'] 	= '<i class="fa fa-dashboard"></i>';
		$_nav[0]['nombre'] 	= 'Productos SL';
		$_nav[0]['href'] 	= 'productos.html';
	}

	echo json_encode( $_nav );


?>