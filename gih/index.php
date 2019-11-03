<?php
session_start();
if(isset($_GET['url'])){
  $actual = $_GET['url'];
}else{
  $actual = 'home';
}
?>
<!doctype html>
<?php
    //$urlBase='http://127.0.0.1:82/gih2/';
    $urlBase='http://hegues.com.mx/gih/';
?>
<html>
<head>
	<title><?php echo ucfirst($actual)." | Grupo Industrial Hegues"; ?></title>
	<?php require_once "google_seo.php"; ?>
</head>
<body id="contenido">
<?php
      include "header.php";

      if(file_exists($actual.".php")){
        include $actual.".php";
      }else{
        include "home.php";
      }
      include "footer.php";
		if($actual == "home"){
      echo '<script type="text/javascript" src="js/owl.carousel.js"></script>
            <script type="text/javascript" src="js/jquery.mousewheel.min.js"></script>
            <script type="text/javascript" src="js/slide.js"></script>';
      }
?>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.4/waypoints.min.js"></script>
<script type="text/javascript" src="<?=$urlBase?>js/anima.js"></script>
<script>
  $(window).scroll(function () {
      var nav = $('.fijo');
      var logo = $('#logo');
      var scroll = $(window).scrollTop();
      if (scroll >= 80) {
          nav.addClass("fijo-color animated fadeInDown");
          logo.css('background-color', 'transparent');
      } else {
          nav.removeClass("fijo-color animated fadeInDown");
          logo.css('background-color', 'rgba(255, 255, 255, .5)');
      }
  });
</script>
</body>
</html>
