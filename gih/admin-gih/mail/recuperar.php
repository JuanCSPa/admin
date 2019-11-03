<?php
	require_once '../functions/conexion.class.php';
	require_once '../sc-clientes/model/clientes.class.php';
	$cliente = new clientes();
	
	$data = $cliente->getById( $_GET['cliente'] );	

	$envia_mail = true;
	$data['para'] = $data[0]['cli_correo'];
	$data['asunto'] = 'Nueva Contraseña!';
	$data['template'] = 'mail-cambio-contrasena.php';
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
	$cabeceras .= 'From: Olkisa <franciscodlx@outlook.es > \r\n';
		 
	if($envia_mail){
		if(mail($para, $titulo, $mensaje, $cabeceras)){
			$_retur['success'] = true;
			$_retur['msg'] = 'Se ha enviado un correo electrónico con su nueva contraseña.';				
		}else{		
			$_retur['success'] = false;
			$_retur['msg'] = 'Se produjo un error y no pudimos restablecer su contraseña, verifique con su administrador';				
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