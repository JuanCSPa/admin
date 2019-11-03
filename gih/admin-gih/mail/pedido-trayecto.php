<?php
	require_once '../functions/conexion.class.php';
	require_once '../sc-clientes/model/clientes.class.php';
	$cli = new clientes();
	
	$data = $cli->getById( $_GET['cliente'] );	

	$envia_mail = true;
	$data['para'] = $data[0]['cli_correo'];
	//$data['para'] = 'franciscodlx@outlook.es';
	$data['asunto'] = 'Orden en Trayecto';
	$data['template'] = 'seguimiento-pedido.php';
	// ===============================================================================//
	// $para = 'alejandrog@netweb.com.mx';
	$para = $data['para'];
	$titulo = $data['asunto'];

	$mensaje = load_page($data['template']);

	$_REPLACE['comentario'] = $_GET['comentario'];
	$_REPLACE['nombre'] 	= $data[0]['cli_nombre'];

	$mensaje = replace($mensaje,$_REPLACE);

	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$cabeceras .= 'From: Olkisa <franciscodlx@outlook.es> \r\n';
		 
	if($envia_mail){
		if(mail($para, $titulo, $mensaje, $cabeceras)){
			$_retur['success'] = true;
			$_retur['msg'] = 'Se ha enviado un correo electronico a .'.$para;				
		}else{		
			$_retur['success'] = false;
			$_retur['msg'] = 'Ha ocurrido un error y no hemos podido reestablecer tu contraseña, consulta con tu administrador';				
		}
	}

	echo json_encode($_retur);

	function replace($template,$_DICTIONARY){
		foreach ($_DICTIONARY as $clave=>$valor) {
			$template = str_replace(':'.$clave.':', $valor, $template);
		}		
		return $template;
	}

	function load_page($page)
	{
		return file_get_contents($page);
	}

?>