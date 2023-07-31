<!DOCTYPE HTML>
<!--
	Application pour la gestion des rendezvs 
	Consultation Externe
-->
<?php
    session_start();
    if (!isset($_SESSION['username']) || (isset($_SESSION['lastAction']) and (time() - $_SESSION['timeframe']) > $_SESSION['lastAction'])  ) {
		echo "<script>location.href='logout.php'</script>";   // Fermeture de Session Forcee
		exit;
	}
	else {
  		$_SESSION['lastAction'] = time(); // Mise à jour de la variable derniere action
	}
?>
<html>
	<head>
		<title> SEN SANTE</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/home.css" />
		<link rel="stylesheet" href="../assets/css/animate.css" />
		<link rel="stylesheet" href="../assets/css/foralert.css">
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		<script type="text/javascript" language="Javascript" src="../assets/js/jquery.js"> </script>
		<script type="text/javascript" language="Javascript" src="../assets/js/controlesaisie.js"> </script>		
	</head>
	<body class="is-preload">	

			<!-- Wrapper-->
			<div id="wrapper">

					<!-- Nav -->
					<nav id="nav">
							<a href="#" class="icon solid fa-home"><span>Accueil</span></a>
							<a href="#add_patient" class="icon solid fa-plus-circle"><span>Ajout </span></a>
							<a href="#search_patient" class="icon solid fa-search"><span>Recherche</span></a>
							<a href="#show_rv" class="icon icon solid fa-th-list"><span>Rendez-vs</span></a>
							<a href="#profil" class="icon solid fa-user"><span>Profil</span></a>
							<?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin')
								echo '<a href="#admin" class="icon solid fa-users-cog"><span>admin</span></a>';
							?>
					</nav>

					<!-- Main -->
					<div id="main">

							<!-- A propos de nous -->
							<?php require("us.php"); ?>

							<!-- Add With Index-->
							<?php require("ajoutavecindex.php");?>

							<!-- Add No Index-->
							<?php require("ajoutnoindex.php");?>

							<!-- Search -->
							<?php require("recherchepatient.php");?>

							<!-- List Show -->
							<?php require("demandeliste.php");?>

							<!-- Profil -->
							<?php require("profil.php");?>

							<!-- admin -->
							<?php require("admin.php");?>

					</div>

					<!-- Footer -->
					<div id="footer">
							<ul class="copyright">
								<li>&copy; SEN SANTE</li>
		
					</div>

			</div>

			<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/browser.min.js"></script>
			<script src="../assets/js/breakpoints.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<script src="../assets/js/main.js"></script>

	</body>
</html>