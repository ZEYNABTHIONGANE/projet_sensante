<!DOCTYPE html>

<?php
	
	session_start();
    if ( !isset($_SESSION['username']) || (isset($_SESSION['lastAction']) and (time() - $_SESSION['timeframe']) > $_SESSION['lastAction'])) {
		header('Location:../views/logout.php');   // Fermeture de Session Forcee
		exit;
	}
	else {
  		$_SESSION['lastAction'] = time(); // Mise à jour de la variable derniere action
	}
	
?>
<html>
<head>
    <title>AJOUT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" href="../assets/css/forcontroller.css" rel = "stylesheet">
</head>

<body>
<?php

	require_once '../modele/database.php';
	require_once '../modele/databasePatient.php';
	require_once '../modele/databaseRv.php';

	if ( isset($_POST['ajoutPatient']) ) { //Controle de traitement pour l'enregistrement d'un patient

		try {

			$traitement=checkPatient($_POST['numeroDossierPatient']) ; // Vérification de l'éxistence du patient dans la base
			if ( $traitement->rowCount() == 0 ) { // 

				$traitement=addPatient ($_POST['numeroDossierPatient'] , strtoupper($_POST['prenomsPatient']) , strtoupper($_POST['nomPatient']) , $_POST['telephonePatient']) ;	
			    if (!$traitement) { //Enregistrement patient non reussi (Probléme de connexion avec la base)
					header("Location:../views/home.php?addpatient=false#add_patient") ; //Le patient n'éxiste pas on le crée
				}

				else {//A ce niveau le patient a été crée avec succés et une redirection s'impose		     
					$_SESSION['np']=$_POST['numeroDossierPatient'] ;
					header("Location:../views/managerendezvs.php#rv_saved") ;	
				}
			}
							
			else {//Le patient éxiste deja
				$_SESSION['np']=$_POST['numeroDossierPatient'] ;
				header("Location:../views/managerendezvs.php?ajoutpatient=exist#rv_saved") ;
			}
					
		} catch (Exception $e) {
			die('Une erreur est survenue lors du traitement de votre demande.</br>Clickez <a href="../index.php">ici</a> pour retourner a la page de connexion.') ;
		}
	}


	if ( isset($_POST['updatePatient']) ) { // Controle de traitement pour la modification des donnees du patient

		try {

			$traitement=updatePatient($_POST['numeroDossierPatient'] , strtoupper($_POST['prenomsPatient']) , strtoupper($_POST['nomPatient']) , $_POST['telephonePatient']) ;
	    	if (!$traitement) { //Enregistrement patient non reussi (Probleme de connexion avec la base)
				header("Location:../views/home.php?updatepatient=false#add_patient") ;
			}

		    else {//A ce niveau le patient á ete mis a jour avec succés et une redirection simpose
		     	$_SESSION['np']=$_POST['numeroDossierPatient'] ;
				header("Location:../views/managerendezvs.php?updatepatient=success#rv_saved") ;	
			}


		} catch (Exception $e) {
			die('Une erreur est survenue lors du traitement de votre demande.</br>Clickez <a href="../index.php">ici</a> pour retourner a la page de connexion.') ;
		}
	}

	
	if ( isset($_POST['recherchePatient']) ) { // Controle de traitement pour la recherche dun patient

		try {

			$traitement=checkPatient($_POST['snumeroDossierPatient']) ; // Verification de l'existence du patient dans la base
			if ( $traitement->rowCount() == 0 ) { //Le numero index n'existe pas dans la base
				header("Location:../views/home.php?found=false#search_patient") ; 			
			}
							
			else { // Numero identifiant trouvé dans la base - traitement
				$_SESSION['np']= $_POST['snumeroDossierPatient'];
				header("Location:../views/managerendezvs.php#rv_saved") ; 	
			}

		} catch (Exception $e) {
			die('Une erreur est survenue lors du traitement de votre demande.</br>Clickez <a href="../index.php">ici</a> pour retourner a la page de connexion.') ;
		}
	}

	
	if ( isset($_POST['ajoutPatientNoIndex']) ) { //Controle de traitement pour l'enregistrement d'un rendez vs Patient NoIndex

		try {
			
			$nombrerv = countdailyRv($_POST['servDemande'],$_POST['dateDisponible']);
			$nbrv = 0; // nombre rv patient avec index et sans index
			if ($data=$nombrerv->fetch()) {
				$nbrv = $nbrv + $data[0]; // ajout nb avec index
			}

			$nombrervnoindex = countdailyRvNoIndex($_POST['servDemande'],$_POST['dateDisponible']);
			if ($data=$nombrervnoindex->fetch()){
				$nbrv = $nbrv + $data[0];
			}

			if ($nbrv >= limitByService($_POST['servDemande'])) {
				header("Location:../views/home.php?add=listfull&dd=".$_POST['dateDisponible']."&serv=".$_POST['servDemande']."#noIndex") ;
			}

			else {

				$traitement=addPatientNoIndex(strtoupper($_POST['prenomsPatientNoi']) , strtoupper($_POST['nomPatientNoi']) , ($_POST['telephonePatientNoi']) , $_POST['servDemande'] , $_POST['dateDisponible']) ; // Ajout des infos necessaires dans la base

				if (!$traitement) //Enregistrement patient non reussi Probleme de connexion avec la base peut etre
				header("Location:../views/home.php?add=false#noIndex") ; 

				else //A ce niveau le rendez-Vs patient á ete ajouté avec succés et une redirection s'impose
				header("Location:../views/home.php?add=true#noIndex") ;
			}

		} catch (Exception $e) {
			die('Une erreur est survenue lors du traitement de votre demande.</br>Clickez <a href="../index.php">ici</a> pour retourner a la page de connexion.') ;
		}
	}

	function limitByService ($service) { //Fonction permettant de renvoyer la limite du nombre de rv par service

	switch ($service) {

		case "orl":
		  return 30;
		  break;
		case "opht":
		case "chir":
		case "orth":
		case "uro":
		case "rhum":
		case "hem":
		case "neur":
		case "pneu":
		case "dern":
		  return 20;
		  break;
		case "onco":
		case "card":
		  return 17;
		  break;
		case "cur":
		case "diet":
		case "gas":
		case "endo":
		  return 15;
		  break;
		case "doul":
		case "neph":
		  return 10;
		  break;
		case "tens":
		  return 5;
		  break;
		default:
		  return 15;
	}
}

					
?>


</body>
</html>