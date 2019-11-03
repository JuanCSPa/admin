<?php
include '../../functions/languaje.php';
include '../../functions/autentic.php';
?>
<!DOCTYPE html>
<html>
<head>
    <?php include('../../functions/head.php'); ?>
    <title>Admin | <?=$GLOBALS['in']['user'][0]?></title>
</head>
<body class="skin-black fixed">
    <header class="header">
        <?php include ('../../functions/header.php'); ?>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side sidebar-offcanvas">
            <?php include('../../functions/navleft.php'); ?>
        </aside>
        <aside class="right-side">
            <section class="content-header">
                <h1>
                    <?=$GLOBALS['in']['user'][0]?>
                    <input type="hidden" id="calve_id" value="1">
                </h1>
                <ol class="breadcrumb">
                    <li><a href="index.html"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li><a href="#"><?=$GLOBALS['in']['user'][5]?></a></li>
                </ol>
            </section>
            <section class="content">
                <div class="col-sm-10">
                    <div class="box box-primary">
                        <div class="box-header">
                            <i class="fa fa-user"></i>
                            <h3 class="box-title"> <?=$GLOBALS['in']['user'][1]?> </h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-7">
                                    <form id="frm_perfil" name="frm_perfil">
                                        <label><?=$GLOBALS['in']['user'][22]?></label>
                                        <input type="text" class="form-control" id="usu_nombre" name="usu_nombre">

                                        <br>
                                        <input type="radio" id="rad_h" name="usr_sexo" value="m">
                                        <label for="rad_h"><?=$GLOBALS['in']['user'][2]?></label>&ensp;&ensp;&ensp;&ensp;

                                        <input type="radio" id="rad_m" name="usr_sexo" value="f">
                                        <label for="rad_m"><?=$GLOBALS['in']['user'][3]?></label><br><br>

                                        <label><?=$GLOBALS['in']['user'][4]?></label>
                                        <input type="email" class="form-control" id="usu_mail" name="usu_mail">

                                        <br><br>
                                        <label><b><?=$GLOBALS['in']['user'][6]?></b></label><br>
                                        <div class="row">
                                            <div class="col-md-7">

                                                <label><?=$GLOBALS['in']['user'][7]?></label>
                                                <input type="password" class="form-control" id="pass-1" name="pass-1" required>

                                                <label><?=$GLOBALS['in']['user'][8]?></label>
                                                <input type="password" class="form-control" id="pass-2" name="pass-2" required>

                                                <label><?=$GLOBALS['in']['user'][9]?></label>
                                                <select class="form-control" id="usu_caduca" name="usu_caduca">
                                                    <option value="0"><?=$GLOBALS['in']['user'][16]?></option>
                                                    <option value="15"><?=$GLOBALS['in']['user'][17]?></option>
                                                    <option value="30"><?=$GLOBALS['in']['user'][18]?></option>
                                                    <option value="45"><?=$GLOBALS['in']['user'][19]?></option>
                                                </select>
                                            </div>
                                            <div class="col-md-5" style="padding-top:24px;">
                                                <div class="callout callout-info">
                                                    <h4 style="font-size:14px"><?=$GLOBALS['in']['user'][11]?></h4>
                                                    <p style="font-size:11px">
                                                        <?=$GLOBALS['in']['user'][12]?><br>
                                                        <?=$GLOBALS['in']['user'][13]?><br>
                                                        <?=$GLOBALS['in']['user'][14]?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <span id="msgBox"></span>
                                        <br>
                                        <a class="btn btn-primary" id="save-perfil">
                                            &ensp;&ensp;<?=$GLOBALS['in']['user'][10]?> &ensp;&ensp;
                                        </a>
                                        <br><br><br>
                                    </form>
                                </div>

                                <div class="col-sm-5 no-padding" style="text-align:center;">
                                    <div style="background-color:#f4f4f4; margin-right:10px; height:600px" class="img-rounded">
                                        <br><br>
                                        <img  src="../../../images/logotipo.png" class="img-thumbnail img-circle" style="max-width:350px" />
                                        <div class="custom-input-file cat_lbl">
                                            <input type="hidden" name="img[his_imagen]" value="foto">
                                            <input type="file" size="1" id="img_croquis" name="foto" class="input-file" onchange="loadPerfil(this)" />
                                            <br />
                                            <h5 id="nombre_img_3"></h5>
                                            <p><strong id="peso_img_3"></strong></p>
                                            <br><br>
</div>
<p id="controles_img_3"></p>
</div>

</div>
</div>
</div>
</div>

</div>
<div class="col-sm-2">

</div>

</section><!-- /.content -->
</aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<!-- jQuery 1.11.2 -->
<script src="../../sources/js/jquery-1.11.2.js"></script>
<!-- Bootstrap -->
<script src="../../sources/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="../../sources/js/AdminLTE/app.js" type="text/javascript"></script>

<!-- Incluimos scripts de alimentacion -->
<script type="text/javascript" src="../../sc-user/js/user.js"></script>
<script type="text/javascript" src="../../sc-user/js/nav.js"></script>
<script type="text/javascript" src="../../sc-user/js/perfil.js"></script>
<script type="text/javascript" src="../../sources/js/functions.js"></script>

</body>
</html>
