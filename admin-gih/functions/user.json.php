<?php
	session_start();
	$data['info']['name'] 		= "gst-admin";
	$data['info']['version'] 	= "2.1.0";
	$data['info']['empresa'] 	= "GO&Live Outdoor Adventures";
	$data['info']['fecha'] 		= "Enero 2015";

	$data['success'] 	= $_SESSION['login'];
	/*$data['userName'] 	= $_SESSION['user_full'];
	$data['userMail'] 	= $_SESSION['mail'];
	$data['sexo'] 		= $_SESSION['sexo'];
	$data['caduca'] 	= $_SESSION['usu_caduca'];
	$data['foto'] 		= $_SESSION['foto'];
	$data['perfil'] 	= $_SESSION['perfil'];*/

	echo json_encode($data);
?>