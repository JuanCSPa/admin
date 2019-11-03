<!DOCTYPE html>
<html lang="es" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			ADMIN | GIH
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<style type="text/css">
			#email::placeholder, #password::placeholder, #m_email::placeholder{
				color: #fff;
			}
		</style>
		<!--end::Web font -->
		<!--begin::Base Styles -->
		<link rel="stylesheet" href="css/font-awesome.css">
   <link rel="stylesheet" href="icon/flaticon.css">
		<link href="css/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="apple-touch-icon" href="../img/favicon.ico">
    	<link rel="shortcut icon" href="../img/favicon.ico">
	</head>
	<!-- end::Head -->
	<!-- end::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-3" id="m_login" style="background-image: url('img/fondo_super.jpg');">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
								<img src="../img/logo2.png" style="width: 40%;">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title" style="color: #000">
									Administrador
								</h3>
							</div>
							<!--Comienza form de inicio de sesion-->
							<form method="post" name="frm_login" id="frm_login" enctype="multipart/form-data">
								<div class="form-group m-form__group">
									<input class="form-control m-input"   type="text" placeholder="E-mail" id="email" name="email" autocomplete="off" style="background: rgba(0, 0, 0, 0.61); color: #fff; border-radius: 40px; border: none; padding: 1.5rem 1.5rem; margin-top: 1.5rem;" required>
								</div>
								<div class="form-group m-form__group">
									<input class="form-control m-input m-login__form-input--last" type="password" id="password" placeholder="Contraseña" name="password" style="background: rgba(0, 0, 0, 0.61); color: #fff; border-radius: 40px; border: none; padding: 1.5rem 1.5rem; margin-top: 1.5rem;" required>
									<input type="hidden" name="tipo" value="super">
									<input type="hidden" name="url" value="loginSuper">
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-right m-login__form-right">
										<a href="javascript:;" id="m_login_forget_password" class="m-link" style="color: #000">
											Recupera tu contraseña
										</a>
									</div>
								</div>
								<div class="m-login__form-action">
									<a id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn" onclick="usr_login()" style="background: rgba(0, 0, 0, 0.61); box-shadow: none; border: 0px; color: #fff">
										Iniciar Sesion
									</a>
								</div>
							</form>
							<div id="msgBoxLogin"></div>
							<!--Finaliza form de inicio de sesion-->
						</div>
						<div class="m-login__forget-password">
							<div class="m-login__head">
								<h3 class="m-login__title" style="color: #000">
									Recupera tu Contraseña
								</h3>
								<div class="m-login__desc" style="color: #000">
									Ingresa Email para recuperar contraseña:
								</div>
							</div>
							<form class="m-login__form m-form" action="" method="post" name="frm-pass" id="frm-pass" enctype="multipart/form-data">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="text" placeholder="Email" name="email" id="email" autocomplete="off" style="background: rgba(0, 0, 0, 0.61); color: #fff" required>
								</div>
								<div class="m-login__form-action">
									<a id="m_login_forget_password_submit" href="javascript:recovery_pass();" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary" style="background: rgba(0, 0, 0, 0.61); border: 0px; box-shadow: none; color: #fff">
										Enviar
									</a>
									&nbsp;&nbsp;
									<a id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom  m-login__btn" style="background: rgba(0, 0, 0, 0.61); color: #fff; border: 0px;">
										Cancelar
									</a>
								</div>
							</form>
							<div id="msgBox"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end:: Page -->
		<!--begin::Base Scripts -->
		<script src="js/vendors.bundle.js" type="text/javascript"></script>
		<script src="js/scripts.bundle.js" type="text/javascript"></script>
		<!--end::Base Scripts -->
		<!--begin::Page Snippets -->
		<script src="js/login.js" type="text/javascript"></script>
	<script src="js/session.js" type="text/javascript"></script>
		<!--end::Page Snippets -->
	</body>
	<!-- end::Body -->
</html>
