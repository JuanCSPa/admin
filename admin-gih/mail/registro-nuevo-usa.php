<?php
	require_once '../functions/conexion.class.php';
	require_once '../sc-clientes/model/clientes.class.php';
	$cliente = new clientes();
	
	$data = $cliente->getById( $_GET['cliente'] );	

	$envia_mail = true;
	$data['para'] = $data[0]['cli_correo'];
	$data['asunto'] = 'Welcome!';
	$data['template'] = 'mail-bienvenida-usa.php';
	// ===============================================================================//
	// $para = 'alejandrog@netweb.com.mx';
	$para = $data['para'];
	$titulo = $data['asunto'];

	$mensaje = load_page($data['template']);	
	$_REPLACE['nombre'] 		= $data[0]['cli_nombre'];
	$_REPLACE['email'] 		= $data[0]['cli_correo'];
	$_REPLACE['password'] = $data[0]['cli_password'];
	$mensaje = replace($mensaje,$_REPLACE);

	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$cabeceras .= 'From: Olkisa <enriquepena@olkisa.com.mx> \r\n';
		 
	if($envia_mail){
		if(mail($para, $titulo, $mensaje, $cabeceras)){
			$_retur['success'] = true;
			$_retur['msg'] = 'An email has been sent, check your account';
		}else{		
			$_retur['success'] = false;
			$_retur['msg'] = 'An error has occurred, try again';				
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