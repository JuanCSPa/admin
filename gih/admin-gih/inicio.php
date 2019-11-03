<?php
session_start();
if(empty($_SESSION['user'])){
		echo '<script>location.href = "index.php";</script>';
	}
  include "header.php";
  include "functions/conexion.class.php";
?>

  <h1>Bienvenido</h1>

  <?php include "footer.php"; ?>
