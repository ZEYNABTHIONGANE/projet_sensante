
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


	if (isset($_POST['ajoutrv'])){ // Controle de traitement pour l'ajout rv d'un patient

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
				header("Location:../views/managerendezvs.php?ajoutrv=listfull&dd=".$_POST['dateDisponible']."&serv=".$_POST['servDemande']."#rv_saved") ;
			}
			
			else {
				$traitement=addrv($_POST['servDemande'],$_POST['dateDisponible']) ;
				if ($traitement) // Ajout rv reussi 
					header("Location:../views/managerendezvs.php?ajoutrv=success#rv_saved") ;
				else 
					header("Location:../views/managerendezvs.php?ajoutrv=failed#rv_saved") ; 
			}


		} catch (Exception $e) {
			die('Une erreur est survenue lors du traitement de votre demande.</br>Clickez <a href="../index.php">ici</a> pour retourner a la page de connexion.') ;
		}
	}


	if (isset($_POST['misajourrv'])){ // Controle de traitement pour la mise a jour des rv d'un patient

		try {
			
			$days=$_POST['days'] ; // Récupération des jours Postés avec leur service
			if (isset($_SESSION['np'])) {
				$traitement = showRvProcess ($_SESSION['np']) ; // recuperation des rv existants en base
					$cpt=0 ;
					$full=false;
					while ( $data=$traitement->fetch()){ 

						$nombrerv = countdailyRvUpdate($_SESSION['np'], $data['codeService'], $days[$cpt]);
						$nbrv = 0; // nombre rv patient avec index et sans index
						if ($dataserv=$nombrerv->fetch()) {
							$nbrv = $nbrv + $dataserv[0]; // ajout nb avec index
						}

						$nombrervnoindex = countdailyRvNoIndex($data['codeService'],$days[$cpt]);
						if ($dataserv=$nombrervnoindex->fetch()){
							$nbrv = $nbrv + $dataserv[0];
						}
				
						if (intval($nbrv >= limitByService($data['codeService']))) {
							$full = true;
							$fullyday = $days[$cpt];
							$fullyserv = $data['codeService'];
							break;
						}

						else {
							$upd=updateRv($data['codeService'] ,$days[$cpt] );
					    }

					$cpt++;
					} 

					if($full == true)
						header("Location:../views/managerendezvs.php?ajoutrv=listfull&dd=".$fullyday."&serv=".$fullyserv."#rv_saved") ;
					else if ($upd) // Mis a jour rv reussi 
						header("Location:../views/managerendezvs.php?updaterv=success#rv_saved") ;
					else 
						header("Location:../views/managerendezvs.php?updaterv=failed#rv_saved") ; 
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
