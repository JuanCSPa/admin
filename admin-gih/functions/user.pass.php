<?php
	session_start();
	require_once 'conexion.class.php';
	require_once '../sc-user/model/usuario.class.php';
	$cli = new usuario();

	if( !v_email($_POST['email']) ){
		$_return['success'] = false;
		$_return['msg'] = 'Ingrese un emial válido';
		echo json_encode($_return);
		die();
	}
	else{

		$_update['user_password'] = generaPass();
		$data = $cli->verifica( $_POST['email'] );
		if(count($data) > 0){
			if($cli->update( $_update, "user_email='" . $_POST['email'] ."'" )){
			$_return['success'] = true;
			$_return['id'] 		= $data[0]['user_id'];
			$_return['msg'] 	= 'Su nueva contraseña ha sido enviada a su correo electrónico';
			$_return['token'] 	= base64_encode($_update['user_password']);
			echo json_encode($_return);
			die();
			}
			else{
				$_return['success'] = false;
				$_return['msg'] = 'Se ha producido un error inesperado al verificar tus datos';
				echo json_encode($_return);
				die();
			}
		}else{
				$_return['success'] = false;
				$_return['msg'] = 'Email no registrado.';
				echo json_encode($_return);
				die();

		}
		
	}

	function v_email( $email ){
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		    return true;
		}
		else{
			return false;
		}
	}

	function generaPass(){
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$cad = "";
		for($i = 0; $i < 12; $i++) {
			$cad .= substr($str,rand(0,62),1);
		}

		return $cad;
	}
?>