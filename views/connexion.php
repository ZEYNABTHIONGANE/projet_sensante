<!DOCTYPE html>
<html>
<head>
	<title>AUTHENTIFICAtION</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../login/css/main.css">
	<link rel="stylesheet" type="text/css" href="../login/css/foralert.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="../Controller/ctrlerLogin.php" method="post">
					<span class="login100-form-title p-b-15">
						SEN SANTE
					</span>

					<span class="txt1 p-b-11">
						Non d'Utilisateur
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Nom d'Utilisateur requis">
						<input class="input100" type="text" name="username" minlength="5" autocomplete="off">
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Mot de pass
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Mot de pass requis">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pwd" minlength="6" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt3">
								Forgot Password?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input class="login100-form-btn" type="submit" name="login" value="Se Connecter" />
					</div>

				</form>


				<?php 

				    if (isset($_GET['status']) && $_GET['status'] == 'blocked') {
				        echo "<div class='alert_danger'>
				                <b>Compte Bloquè. </b> 
				                Veuiller contacter votre administrateur pour plus d'informations !
				              </div>";
				    }

				    else if (isset($_GET['exist']) && $_GET['exist'] == 'false') {
				        echo "<div class='alert_danger'>
				                <b>Utilisateur et/ou Mot de pass incorect(s) </b>
				                Veuillez verifier vos informations de connexion !
				             </div>";
				    }

				    else if (isset($_GET['pass']) && $_GET['pass'] == 'false') {
				        echo "<div class='alert_warning' style='animation: jackInTheBox  1 2s;'>
				                <b>Attention vous avez saisi un mot de pass Incorect.</b>"; 
				                    if (isset($_GET['rest']) && $_GET['rest'] > 0 )
				                        echo "Il vous reste <strong>".$_GET['rest']."</strong> tentative(s).";
				        echo "</div>";
				    }
				?>
			</div>
		</div>
	</div>

	 
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/bootstrap/js/popper.js"></script>
	<script src="../login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../login/js/main.js"></script>

</body>
</html>