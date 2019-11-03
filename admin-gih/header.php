<?php include "functions/config.php";?>

<!DOCTYPE html>

<html lang="es">

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>GIH | www.gih.com</title>

    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.5 -->

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Font Awesome -->

    <link rel="stylesheet" href="css/font-awesome.css">

    <link rel="stylesheet" href="icon/flaticon.css">

    <!-- Theme style -->

    <link rel="stylesheet" href="css/AdminLTE.min.css">

    <link rel="stylesheet" href="css/styles.css">

    <!-- AdminLTE Skins. Choose a skin from the css/skins

         folder instead of downloading all of them to reduce the load. -->

    <link rel="stylesheet" href="css/_all-skins.min.css">

    <link rel="apple-touch-icon" href="../img/favicon.ico">

    <link rel="shortcut icon" href="../img/favicon.ico">

<style type="text/css">

  .skin-blue .main-header .navbar .sidebar-toggle:hover {

    background-color: transparent;
}
.treeview span{
  font-size: 1.1em;
}
</style>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">

        <!-- Logo -->

        <a href="inicio.php" style="background-color: #2980B9" class="logo">

          <!-- mini logo for sidebar mini 50x50 pixels -->

          <span class="logo-mini"><b>GIH</b></span>

          <!-- logo for regular state and mobile devices -->

          <span class="logo-lg"><b>GIH</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top" style="background-color: #2980B9" role="navigation">

          <!-- Sidebar toggle button-->

          <a href="#" class="sidebar-toggle" style=":hover{background-color: #2980B9;}" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>

          <!-- Navbar Right Menu -->

          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <!-- Messages: style can be found in dropdown.less-->


              <!-- User Account: style can be found in dropdown.less -->

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="">Online</small>
                  <span class="hidden-xs"><?=$_SESSION['user']?></span>
                </a>
                <ul class="dropdown-menu" >

                  <!-- User image -->

                  <li class="user-header" style="background: #2980B9">
                    <p>
                      GIH
                      <small>www.netweb.com.mx</small>
                      <img class="img-responsive" src="../img/logo.png" style="width: 50%; margin: 0 auto;">
                    </p>
                  </li>

                  <!-- Menu Footer-->

                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="functions/salir.php" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->

      <aside class="main-sidebar" style=" background-size: cover; background-position: center center; position: fixed; display: block; height: 100%; background-image: url(img/sidebar-42.jpg);">

        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar">

          <!-- Sidebar user panel -->

          <!-- sidebar menu: : style can be found in sidebar.less -->

          <ul class="sidebar-menu">
            <li class="treeview">
              <a href="#">
               <i class="fa fa-picture-o" aria-hidden="true"></i>
                <span> Slide</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="sc-movil/view/"><i class="fa fa-mobile"></i> Movil</a></li>
                <li><a href="sc-escritorio/view/"><i class="fa fa-desktop"></i> Escritorio</a></li>
              </ul>
            </li>

            <li class="treeview">

              <a href="#">
               <i class="fa fa-home" aria-hidden="true"></i>
                <span> Home</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="sc-mision/view/"><i class="fa fa-circle-o"></i> Mision, Vision</a></li>
                <li><a href="sc-industria/view/"><i class="fa fa-industry"></i> Industria</a></li>
                <li><a href="sc-compania/view/"><i class="fa fa-building"></i> Compañia</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="sc-socios/view/">
                <i class="fa fa-address-book" aria-hidden="true"></i>
                <span> Socios</span>
              </a>
            </li>
            <li class="treeview">
              <a href="sc-somos/view/">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span> Somos</span>
              </a>
            </li>
            <!--<li class="treeview">
              <a href="#">
               <i class="fa fa-users" aria-hidden="true"></i>
                <span> Somos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="sc-somos/view/"><i class="fa fa-users"></i> Somos</a></li>
                <li><a href="sc-barsomos/view/"><i class="fa fa-bars"></i> Barra Somos</a></li>
              </ul>
            </li>-->

            <li class="treeview">
              <a href="sc-noticias/view/">
               <i class="fa fa-list-alt" aria-hidden="true"></i>
                <span> Noticias</span>
              </a>
            </li>

            <!--<li class="treeview">
              <a href="sc-destacado/view/">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                <span> Destacado</span>
              </a>
            </li>-->

            <li class="treeview">
              <a href="sc-servicios/view/"><!--sc-servicios-->
               <i class="fa fa-cogs" aria-hidden="true"></i>
                <span> Servicios</span>
              </a>
            </li>


            <li class="treeview">
              <a href="sc-productos/view/">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span> Productos</span>
              </a>
            </li>
          </ul>
        </section>

        <!-- /.sidebar -->

      </aside>

       <!--Contenido-->

      <!-- Content Wrapper. Contains page content -->

      <div class="content-wrapper">

        <!-- Main content -->

        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Control</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>

                </div>

                <!-- /.box-header -->

                <div class="box-body">

                  	<div class="row">

	                  	<div class="col-md-12">
