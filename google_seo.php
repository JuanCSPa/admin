<?php
        //$urlBase = 'http://netwebproyectos.com/angelica/flujotecnia/';
        switch ($actual) {
                case 'home':
                $titulo = "";
                $title = "Grupo Industrial Hegues";
                $metaDesc = "Contamos con el respaldo de 25 años en el suministro de equipo a las industrias: Alimenticia, Construcción, etc. Comercializamos y desarrollamos productos siempre basándonos en las necesidades específicas de nuestros clientes, esto resulta en ofrecer no solo productos y asesoría técnica, si no soluciones inteligentes.";
                $metakeys = "industria, industria alimenticia, industria construccion, industria electrica, industria farmaceutica, industria minera, industria petrolera, industria pulpa, industria quimica";
				$ogurl = "http://hegues.com.mx";
                $ogtitle = "Grupo Industrial Hegues";
				$ogimage = "http://hegues.com.mx/img/flujotecnia.jpg";
                break;

				case 'productos':
                $titulo = "Productos |";
                $title = "Productos | Grupo Industrial Hegues";
                $metaDesc = "Empresa dedicada a la comercialización de bandas transportadoras, cañones y vibradores, grapas, Poleas para transportadores y elevadores de banda, rodillos para transportadores de banda, transportadores de paquetería";
                $metakeys = "Productos,Bandas transportadoras,refuerzo textil,Cañones,vibradores,promoción de flujo,Grapas,herramientas,Limpiadores de bandas transportadoras,Poleas para transportadores,elevadores de banda,Rodillos para transportadores de banda,Transportadores de paquetería,Bandas transportadoras de hule industriales";
				$ogurl = "http://hegues.com.mx/productos";
                $ogtitle = "Productos | Grupo Industrial Hegues";
				$ogimage = "http://hegues.com.mx/img/productos-flujotecnia.jpg";
                break;

				case 'servicios':
                $titulo = "Servicios |";
                $title = "Servicios | Grupo Industrial Hegues";
                $metaDesc = "Empresa dedicada a la comercialización de bandas transportadoras, cañones y vibradores, grapas, Poleas para transportadores y elevadores de banda, rodillos para transportadores de banda, transportadores de paquetería";
                $metakeys = "Servicios,Bandas transportadoras,refuerzo textil,Cañones,vibradores,promoción de flujo,Grapas,herramientas,Limpiadores de bandas transportadoras,Poleas para transportadores,elevadores de banda,Rodillos para transportadores de banda,Transportadores de paquetería,Bandas transportadoras de hule industriales";
				$ogurl = "http://hegues.com.mx/servicios";
                $ogtitle = "Servicios | Grupo Industrial Hegues";
				$ogimage = "http://hegues.com.mx/img/servicios-flujotecnia.jpg";
                break;

				case 'nosotros':
                $titulo = "La Empresa |";
                $title = "La Empresa | Grupo Industrial Hegues";
                $metaDesc = "Empresa dedicada a la comercialización de bandas transportadoras, cañones y vibradores, grapas, Poleas para transportadores y elevadores de banda, rodillos para transportadores de banda, transportadores de paquetería";
                $metakeys = "La Empresa,Bandas transportadoras,refuerzo textil,Cañones,vibradores,promoción de flujo,Grapas,herramientas,Limpiadores de bandas transportadoras,Poleas para transportadores,elevadores de banda,Rodillos para transportadores de banda,Transportadores de paquetería,Bandas transportadoras de hule industriales";
				$ogurl = "http://hegues.com.mx/nosotros";
                $ogtitle = "La Empresa | Grupo Industrial Hegues";
				$ogimage = "http://hegues.com.mx/img/nosotros-flujotecnia.jpg";
                break;

				case 'contacto':
                $titulo = "Contáctanos |";
                $title = "Contáctanos | Grupo Industrial Hegues";
                $metaDesc = "Empresa dedicada a la comercialización de bandas transportadoras, cañones y vibradores, grapas, Poleas para transportadores y elevadores de banda, rodillos para transportadores de banda, transportadores de paquetería";
                $metakeys = "Contáctanos,Bandas transportadoras,refuerzo textil,Cañones,vibradores,promoción de flujo,Grapas,herramientas,Limpiadores de bandas transportadoras,Poleas para transportadores,elevadores de banda,Rodillos para transportadores de banda,Transportadores de paquetería,Bandas transportadoras de hule industriales";
				$ogurl = "http://hegues.com.mx/contacto";
                $ogtitle = "Contáctanos | Grupo Industrial Hegues";
				$ogimage = "http://hegues.com.mx/img/contacto-flujotecnia.jpg";
                break;

                case 'marcas':
                $titulo = "Marcas |";
                $title = "Marcas | Grupo Industrial Hegues";
                $metaDesc = "Empresa dedicada a la comercialización de bandas transportadoras, cañones y vibradores, grapas, Poleas para transportadores y elevadores de banda, rodillos para transportadores de banda, transportadores de paquetería";
                $metakeys = "Marcas,Bandas transportadoras,refuerzo textil,Cañones,vibradores,promoción de flujo,Grapas,herramientas,Limpiadores de bandas transportadoras,Poleas para transportadores,elevadores de banda,Rodillos para transportadores de banda,Transportadores de paquetería,Bandas transportadoras de hule industriales";
                $ogurl = "http://hegues.com.mx/marcas";
                $ogtitle = "Marcas | Grupo Industrial Hegues";
                $ogimage = "http://hegues.com.mx/img/marcas-flujotecnia.jpg";
                break;

        }
        ?>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href="<?=$urlBase?>img/favicon.ico"/>
<meta name="identifier-url" content="http://hegues.com.mx">
<meta name="language" content="es">
<meta name="author" content="Netweb">
<meta name="distribution" content="Global">
<meta name="revisit-after" content="5 day">
<meta name="robots" content="index,follow">
<meta property="og:type" content="website" />

<title><?php echo $titulo." Grupo Industrial Hegues"; ?></title>
<meta name='description' content='<?php echo $metaDesc; ?>'>
<meta name='keywords' content='<?php echo $metakeys; ?>'>
<meta property="og:title" content='<?php echo $ogtitle; ?>' />
<meta property="og:url" content='<?php echo $ogurl; ?>' />
<meta property="og:image" content='<?php echo $ogimage; ?>' />

<link rel="stylesheet" id="Lato-css" href="http://fonts.googleapis.com/css?family=Lato%3A1%2C300%2C400%2C400italic%2C700%2C700italic%2C900&amp;ver=4.9.5" type="text/css" media="all">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="<?=$urlBase?>css/styles.css">
<link rel="stylesheet" type="text/css" href="<?=$urlBase?>css/owl.carousel.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
