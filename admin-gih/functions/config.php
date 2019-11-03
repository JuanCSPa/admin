<?php
	// URL del proyecto
	$GLOBALS['url_proyect'] = '';

	// Cuenta de correo para reportes de eventos en la pagina web avisos de registros nuevos, avisos de nuevos pedidos, etc.
	$GLOBALS['mail_web'] 	= 'francisco.delacruz@netweb.com.mx';

	// Cuenta de correo que serira de from para envios de mail
	$GLOBALS['mail_from'] 	= 'Admin Ofertrip <francisco.delacruz@netweb.com.mx>';

	// Cuenta de correo para avisar sobre los newsletter
	$GLOBALS['mail_news'] 	= 'francisco.delacruz@netweb.com.mx';

	// Cuenta de correo para configuracion de PayPal
	$GLOBALS['paypal_account'] 	= 'roberto@netweb.com.mx';//ricardo@ntsclinic.com //ivansboutique@gmail.com //berkzanzi@gmail.com
	$GLOBALS['paypal_currency'] = 'USD';

	// Envio           
	// Poner 0 para no cobrar envio en general.
	// Poner la cantidad minima requerida para no cobrar envio.
	$GLOBALS['shipping'] 		= 180;
	$GLOBALS['shipping_price'] 	= 18; // Costo del envio //180

	// Configurar metodos de Pago
	$GLOBALS['payment_paypal']=false;
	$GLOBALS['payment_bancomer']=false;
	$GLOBALS['payment_deposito']= false;
	$GLOBALS['payment_practicajas']=false;
	$GLOBALS['payment_banorte']=true;





	// Textos dinamicos
	$GLOBALS['txt_shipping_free'] 	= '* Envío Gratis para todos los pedidos en el DF y Area Metropolitana. ';
	$GLOBALS['txt_shipping_price'] 	= '* Envío Gratis en la compra minima de $ #/PRICE/# pesos. ';
?>