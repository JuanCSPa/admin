<?php
	function post_captcha($user_response) {
        $fields_string = '';
        $fields = array(
            'secret' => '6Le-A1sUAAAAAIfSaa_1bQmpzFLk3Bjcxh9lcNM7',
            'response' => $user_response
        );
        foreach($fields as $key=>$value)
        $fields_string .= $key . '=' . $value . '&';
        $fields_string = rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);

        $result = curl_exec($ch);
        curl_close($ch);

        return json_decode($result, true);
    }

    // Call the function post_captcha
    $res = post_captcha($_POST['g-recaptcha-response']);

    if (!$res['success']) {
        // What happens when the CAPTCHA wasn't checked
        //echo '<p>Please go back and make sure you check the security CAPTCHA box.</p><br>';
		$_return['success'] = false;
		$_return['msg'] = 'Por favor asegurate de marcar la casilla Captcha de Seguridad';
	 	echo json_encode($_return);
    } else {
        include 'enviar.class.php';
		$nombre = $_POST['nombre'];
		$email = $_POST['email'];
		$telefono = $_POST['telefono'];
		$mensa = $_POST['mensaje'];
		$direccion = $_POST['direccion']." ".$_POST['cp'];
		$file = 'file-3';

		$de = 'no-reply@ghi.com';
		$data['para'] = 'franciscodlx@outlook.es';
		$data['asunto'] = 'Nuevo Mensaje!';
		$data['template'] = 'mail-contacto.php';
		// ===============================================================================//
		$para = $data['para'];
		$titulo = $data['asunto'];

		$_REPLACE['email'] 		= $email;
		$_REPLACE['nombre'] = $nombre;
		$_REPLACE['telefono'] = $telefono;
		$_REPLACE['mensaje'] = $mensa;
		$_REPLACE['direccion'] = $direccion;

		//llamamos a la clase

		$obj = new enviar();

		//ejecutamos el método enviar con los parámetros que recibimos del formulario

		$bool = $obj->enviar($de, $para, $titulo, $_FILES['file-3']['name'],$file, $data['template'], $_REPLACE);
		echo json_encode($bool);
    }

	
?>