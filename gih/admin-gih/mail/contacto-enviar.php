<?php
	$nombre = $_POST['name'];
	$email = $_POST['email'];
	$telefono = $_POST['telefono'];
	$mensa = $_POST['message'];

	$envia_mail = true;
	$data['para'] = 'enriquepena@pizarronesinteligentes.com';
	$data['asunto'] = 'Nuevo Mensaje!';
	$data['template'] = 'mail-contacto.php';
	// ===============================================================================//
	// $para = 'alejandrog@netweb.com.mx';
	$para = $data['para'];
	$titulo = $data['asunto'];

	$mensaje = load_page($data['template']);
	$_REPLACE['email'] 		= $email;
	$_REPLACE['nombre'] = $nombre;
	$_REPLACE['telefono'] = $telefono;
	$_REPLACE['mensaje'] = $mensa;

	$mensaje = replace($mensaje,$_REPLACE);

	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$cabeceras .= 'From: Olkisa <enriquepena@olkisa.com.mx> \r\n';

	if($envia_mail){
		if(mail($para, $titulo, $mensaje, $cabeceras)){
			$_retur['success'] = true;
			$_retur['msg'] = 'Tu solicitud se envio correctamente, a la brevedad nos comunicaremos.';				
		}else{		
			$_retur['success'] = false;
			$_retur['msg'] = 'Ha ocurrido un error, intenta de nuevo.';				
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