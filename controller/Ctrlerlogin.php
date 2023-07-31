<!DOCTYPE html>

<?php
	
	session_start();
    if (isset($_SESSION['username']) && isset($_SESSION['lastAction']) and  ((time() - $_SESSION['timeframe']) > $_SESSION['lastAction'])) {
		header('location:../views/logout.php');  // Fermeture de Session Forcee
		exit;
	}
	else {
  		$_SESSION['lastAction'] = time(); // Mise à jour de la variable derniere action
	}
	
?>
<html>
<head>
    <title>LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" href="../assets/css/forcontroller.css" rel = "stylesheet">
</head>

<body>

<?php 

	require_once '../modele/database.php';
	require_once '../modele/databaseAgent.php';

			
	if (isset($_POST['login'])) { // Controle de traitement pour l'authentification d'un utilisateur		
							    
		try {

			$traitement=checkAgent($_POST['username']) ; // Verification de l'existence de l'utilisateur
			if ($traitement->rowCount() == 0 ) {  // le Nom d'utulisateur est incorect
				header("Location:../index.php?exist=false") ;
			}
			else {  // le Nom d'utulisateur est correct on verifie le mot de pass
				$data = $traitement->fetch();

					if ( $data['status'] == 0 ) { // L'utulisateur est bloque trop de tentatives de connexion echouees
						header("Location:../index.php?status=blocked") ; 
					}
					else if ( !password_verify($_POST['pwd'] , $data['password'])) { // L'utulisateur existe mais il a tapè un mauvais mot de pass

						$secure=decrementStatus($_POST['username'], $data['status']) ; // Limitation nombre de tentatives
						if ($data['status'] == 1 ) {// 03 tentatives de connexion deja echoue on bloque le compte
							header("Location:../index.php?status=blocked") ; 
						}
						else{ // Possibilite de retaper le mot de pass
							$rest=$data['status']-1;
							header("Location:../index.php?pass=false&rest=".$rest) ;
						}
					}

					else { // L'utulisateur a ete identifie avec succes - Demarrage de la session de travail
						$_SESSION['username'] = $data['username'];
						$_SESSION['lastAction'] = time();
						$_SESSION['timeframe'] = 600 ; //Temps d'inactivite maximum en secondes (10minutes)
						incrementStatus($_POST['username']) ; //Remise á niveau nombre de tentatives de connexion
						header("Location:../views/home.php") ;
					}
			}		
							  	
		} catch (Exception $e) {
			die('Une erreur est survenue lors du traitement de votre demande.</br>Clickez <a href="../index.php">ici</a> pour retourner a la page de connexion.'.$e->getMessage()) ;
		}
	}


	if (isset($_POST['updateagent'])) { // Controle de traitement pour la mise a jour des donnees d'un utilisateur	
		
		try {	
									
			$traitement=updateAgent($_POST['username'] , strtoupper($_POST['prenom_agent']), strtoupper($_POST['nom_agent']) , crypt($_POST['password'] , 'rl') , $_POST['telephone_agent']) ;
			if ($traitement) {  // Mis a jour effectuè avec succes
				header("Location:../views/home.php?update=true#profil") ;
			}

			else {  // Mis a jour non reussi
				header("Location:../views/home.php?update=false#profil") ;		
													}
		} catch (Exception $e) {
			die('Une erreur est survenue lors du traitement de votre demande.</br>Clickez <a href="../index.php">ici</a> pour retourner a la page de connexion.') ;
		}		
	}		

?>

</body>
</html>