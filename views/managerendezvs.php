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
		<title>APPOINTEMENT MANAGER</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../assets/css/home.css" />
		<link rel="stylesheet" href="../assets/css/animate.css" />
		<link rel="stylesheet" href="../assets/css/foralert.css">
		<link rel="stylesheet" href="../assets/css/forrvmanage.css">
		<link rel="stylesheet" href="../assets/css/forrvmanagenav.css">
		<noscript><link rel="stylesheet" href="../assets/css/noscript.css" /></noscript>
		<script type="text/javascript" language="Javascript" src="../assets/js/jquery.js"> </script>
		<script type="text/javascript" language="Javascript" src="../assets/js/controlesaisie.js"> </script>		
	</head>
	<body class="is-preload">	
			<div id="topnav">
					<ul>
	  					<li><a href="home.php#add_patient">Ajouter un Patient</a></li>
	  					<li><a href="home.php#search_patient">Rechercher un Patient</a></li>
	  					<li><a href="home.php#show_rv">Lister les Rendez-Vs</a></li>
	  					<li><a href="home.php#profil">Profil</a></li>
	  					<li style="float:right;border-left:3px solid white;font-style:italic;text-decoration:underline;"><a href="logout.php">Déconnexion</a></li>
					</ul>
			</div>

			<!-- Wrapper-->
			<div id="wrapper">
					<!-- Nav -->
					<nav id="nav">
							<a href="#" class="icon solid fa-home"><span>Accueil</span></a>
							<a href="#add_rv" class="icon solid fa-plus-circle"><span>Ajout </span></a>
					</nav>

					<!-- Main -->
					<div id="main">
							

							<!-- rendez-vs deja enregistrés -->
							<?php require("rvsaved.php"); ?>

							<!-- ajout nouveau rendez-vs-->
							<?php require("addrv.php");?>

					</div>

					<!-- Footer -->
					<div id="footer">
							<ul class="copyright">
								<li>&copy; Appointment Manager</li>
								<li>Design : <a href="#">ISSA SECK KANE</a></li>
								<li>admin-contact : <a href="#">77 681 21 70</a></li>
							</ul>
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