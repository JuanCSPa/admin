<?php
	session_start();
	if(!v_email($_POST['email'])){
		$_return['success'] = false;
		$_return['msg'] = 'Ingresa un email valido.';
		echo json_encode($_return);
		//echo '<script>alert("ingresa un email valido");</script>';
		//echo '<script>location.href = "../index.php";</script>';
		die();
	}else if(empty($_POST['password'])){
		$_return['success'] = false;
		$_return['msg'] = 'Ingresa una contraseña.';
		echo json_encode($_return);
		//echo '<script>alert("Ingresa una contraseña");</script>';
		//echo '<script>location.href = "../index.php";</script>';
		die();
	}
	else{
		require_once 'conexion.class.php';
		require_once '../sc-user/model/usuario.class.php';
		$cli = new usuario();

		$login = $cli->login( $_POST['email'], $_POST['password'] );
		if( count($login) == 0 ){
			$_return['success'] = false;
			$_return['msg'] = 'La informacion es incorrecta.';
			echo json_encode($_return);
			//echo '<script>alert("La informacion es incorrecta");</script>';
			//echo '<script>location.href = "../index.php";</script>';
			die();
		}else{
				$_SESSION['user'] 		= $login[0]['user_nombre'];
				$_SESSION['login'] 		= true;
				$_SESSION['email'] 		= $login[0]['user_email'];
				//$_SESSION['cli_celular'] 	= $login[0]['cli_celular'];
				//$_SESSION['cli_telefono'] 	= $login[0]['cli_telefono'];

				$_return['success'] = true;
				$_return['msg'] = 'Bienvenido';
				
				echo json_encode($_return);
				//echo '<script>location.href = "../inicio.php";</script>';
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
?>