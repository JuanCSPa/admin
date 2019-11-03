<?php
	require_once '../functions/conexion.class.php';
	require_once '../sc-clientes/model/pedido.class.php';
	require_once '../sc-clientes/model/clientes.class.php';
	$orden = $_GET['pedido'];
	$pedido = new pedido();
	$infoPedido = $pedido->get($orden);

	$cli = new clientes();
	
	$data = $cli->getById( $infoPedido[0]['ped_cli_id']);	

	$envia_mail = true;
	$data['para'] = $data[0]['cli_correo'];
	$data['asunto'] = 'Pedido Pagado';
	$data['template'] = 'confirmacion-pago.php';
	// ===============================================================================//
	// $para = 'alejandrog@netweb.com.mx';
	$para = $data['para'];
	$titulo = $data['asunto'];

	$mensaje = load_page($data['template']);

	$_REPLACE['nombre'] 	= $data[0]['cli_nombre']." ".$data[0]['cli_apellidos'];
	$_REPLACE['orden'] 		= $orden;
	$_REPLACE['total'] 		= $infoPedido[0]['ped_total'];
	$_REPLACE['fecha'] 		= $infoPedido[0]['ped_fecha_orden'];

	$mensaje = replace($mensaje,$_REPLACE);

	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
	$cabeceras .= 'From: Olkisa <enriquepena@olkisa.com.mx>\r\n';
		 
	if($envia_mail){
		if(mail($para, $titulo, $mensaje, $cabeceras)){
			$_retur['success'] = true;
			$_retur['msg'] = 'Se ha enviado un correo electronico con tu nueva contraseña.';				
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