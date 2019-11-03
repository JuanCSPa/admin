<?php
	session_start();
	require_once '../../functions/conexion.class.php';	
	require_once '../model/usuario.class.php';	
	
	$mdb = new usuario();

	if(empty($_POST['usu_nombre'])){
		$_return['success'] = false;
		$_return['msg'] = msg(400);
		echo json_encode($_return);
		die();
	}
	else{
		$_update['usu_nombre'] = $_POST['usu_nombre'];
	}

	if (!filter_var($_POST['usu_mail'], FILTER_VALIDATE_EMAIL)) {
	    $_return['success'] = false;
		$_return['msg'] = msg(401);
		echo json_encode($_return);
		die();
	}
	else{
		$_update['usu_mail'] = $_POST['usu_mail'];
	}

	if( !empty($_POST['pass-1']) ){
		if( empty($_POST['pass-2']) ){
			$_return['success'] = false;
			$_return['msg'] = msg(402);
			echo json_encode($_return);
			die();
		}
		else{
			if( $_POST['pass-1'] == $_POST['pass-2'] ){
				if(strlen($_POST['pass-2']) < 8){
					$_return['success'] = false;			      
					$_return['msg'] = msg(404);
					echo json_encode($_return);
					die();
			   	}
			   	else{
			   		if (preg_match("/^.*(?=.{8,})(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).*$/", $_POST['pass-2'])){
			   			$_update['usu_password'] = md5($_POST['pass-2']);
			   		}
			   		else {
			   			$_return['success'] = false;			      
						$_return['msg'] = msg(406);
						echo json_encode($_return);
						die();
			   		}
			   	}
			}
			else{
				$_return['success'] = false;
				$_return['msg'] = msg(403);
				echo json_encode($_return);
				die();
			}
		}
	}

	$_update['usu_caduca']  = $_POST['usu_caduca'];
	$_update['usu_sexo'] 	= $_POST['usr_sexo'];

	if( $mdb->update($_update, 'usu_id = ' . $_SESSION['usu_id']) ){
		$_return['success'] = true;			      
		$_return['msg'] = msg(408);

		$_SESSION['user_full'] 	= $_update['usu_nombre'];
		$_SESSION['mail'] 		= $_update['usu_mail'];
		$_SESSION['sexo'] 		= $_update['usu_sexo'];
		$_SESSION['usu_caduca'] = $_update['usu_caduca'];

		echo json_encode($_return);
	}
	else{
		$_return['success'] = false;
		$_return['msg'] = msg(407);
		echo json_encode($_return);
		die();
	}

	function msg($c){
		include '../../functions/languaje.php';
		switch ($c) {
			case 400: $msg = $GLOBALS['in']['user'][400]; break;
			case 401: $msg = $GLOBALS['in']['user'][401]; break;
			case 402: $msg = $GLOBALS['in']['user'][402]; break;
			case 403: $msg = $GLOBALS['in']['user'][403]; break;
			case 404: $msg = $GLOBALS['in']['user'][404]; break;
			case 405: $msg = $GLOBALS['in']['user'][405]; break;
			case 406: $msg = $GLOBALS['in']['user'][406]; break;
			case 407: $msg = $GLOBALS['in']['user'][407]; break;
			case 408: $msg = $GLOBALS['in']['user'][408]; break;
			default: $msg  = 'Undefined'; break;
		}

		return $msg;
	}
?>