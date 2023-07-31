<?php


function listServices ( ) {	

	//Requete permettant d'obtenir l'ensemble des services disponibles
	$sql="SELECT * FROM Service ORDER BY designService ASC" ;
    return executesql($sql);
	mysql_close();
}

function getServicebyCod ( $codeService ) {

	//Requete permettant d'obtenir un service à partir de son code
	$sql="SELECT * FROM Service WHERE codeService = '$codeService' " ;
    return executesql($sql);
	mysql_close();
}

function addpatientNoIndex ($prenoms, $nom, $telephone, $codeService, $dateDisponible ) {	

	//Requete permettant d'ajouter un rendez-vs pour un nouveau patient sans indentifiant
	$sql_prepare="INSERT INTO patientnoindex VALUES ( :nauto , :prenoms, :nom , :telephone , :codeService, :dateDisponible )" ;
	$parameters = Array ( 'nauto' => NULL , 'prenoms' => $prenoms , 'nom' => $nom , 'telephone' => $telephone , 'codeService' => $codeService , 'dateDisponible' => $dateDisponible );
	return prepare_executesql($sql_prepare,$parameters);
	mysql_close();
}

function showdailyRvNoindex ( $service , $jour ) {
	//Requete permettant de lister un ensemble de rendez-Vs avec le couple [service-jour] Patient sans identifiant
	$sql="SELECT * FROM PatientNoindex WHERE codeService='$service' AND dateDisponible = '$jour' " ;
    return executesql($sql);
	mysql_close();
}

function countdailyRvNoIndex ( $service , $jour) {

	//Requete permettant de compter le nombre de rv service - jour (PatientNoIndex)
	$sql="SELECT count(*)
	FROM patientnoindex
	WHERE patientnoindex.dateDisponible = '$jour' AND patientnoindex.codeService = '$service' ";
    return executesql($sql);
	mysql_close();
}

/*
function showdailyRvNoindex ( $service , $jour ) {
	//Requete permettant de lister un ensemble de rendez-Vs avec le couple [service-jour] Patient sans identifiant
	$sql="SELECT * FROM PatientNoindex where codeService='$service' && dateDisponible = '$jour' " ;
    return executesql($sql);
	mysql_close();
}
*/


function showdailyRv ( $service , $jour) {

	//Requete permettant de lister un ensemble de rendez-Vs avec le couple [service-jour] Avec Jointure interne - Patient avec identifiant
	$sql="SELECT patient.numeroDossierPatient , prenomPatient , nomPatient , telephonePatient FROM Patient 
	INNER JOIN rendezvs 
		ON patient.numeroDossierPatient = rendezvs.numeroDossierPatient 
	WHERE rendezvs.dateRvServ	= '$jour' AND rendezvs.codeService = '$service'
	ORDER BY numeroDossierPatient ASC" ;
    return executesql($sql);
	mysql_close();
}

function countdailyRv ( $service , $jour) {

	//Requete permettant de compter le nombre de rv service - jour (patient avec id) pour Mis a jour
	//Ne pas compter rendez vs patient en cour
	$sql="SELECT count(*)
	FROM rendezvs 
	WHERE rendezvs.dateRvServ = '$jour' AND rendezvs.codeService = '$service' ";
    return executesql($sql);
	mysql_close();
}

function countdailyRvUpdate ( $np, $service , $jour) {

	//Requete permettant de compter le nombre de rv service - jour (patient avec id) pour Mis a jour
	//Ne pas compter rendez vs patient en cour
	$sql="SELECT count(*)
	FROM rendezvs 
	WHERE rendezvs.dateRvServ = '$jour' AND rendezvs.codeService = '$service' AND rendezvs.numeroDossierPatient <> $np  ";
    return executesql($sql);
	mysql_close();
}


/*
function showdailyRv ( $service , $jour) {	

	//Requete permettant de lister un ensemble de rendez-Vs avec le couple [service-jour] Patient avec Identifiant  
	$sql="SELECT patient.numeroDossierPatient , prenomPatient , nomPatient , telephonePatient FROM rendezvs , Patient where rendezvs.codeService = '$service' and rendezvs.dateRvServ= '$jour' and patient.numeroDossierPatient = rendezvs.numeroDossierPatient order by numeroDossierPatient ASC" ;
    return executesql($sql);
	mysql_close();
}
*/


function addRv ($codeService, $dateDisponible) {
	
	//Requete d'enregistrement d'un rendez vs Patient avec identifiant pour un service
	if (isset($_SESSION['np'])) {

		$ndp=$_SESSION['np'] ;
		$sql_prepare="INSERT INTO rendezvs VALUES ( :np , :codeService, :dateDisponible)" ;
		$parameters = Array ( 'np' => $ndp , 'codeService' => $codeService , 'dateDisponible' => $dateDisponible );
	    return prepare_executesql($sql_prepare,$parameters);
		mysql_close();
	}
}

/*
function addRv ( $sd , $drv) {
	
	//Requete denregistrement dun rendez vs pour un service
	if (isset($_SESSION['np'])) {

		$np=$_SESSION['np'] ;
		$sql="INSERT INTO rendezvs VALUES ($np , '$sd' , '$drv' ) " ;
    	return executesql($sql);
		mysql_close();
	}
}
*/

function showRv ( ) {	

	if (isset($_SESSION['np'])) {

		//Requete permettant de selectionner tous les rendez vs enregistrés pour un patient
		$ndp=$_SESSION['np'] ;
		$sql="SELECT * FROM rendezvs
		INNER JOIN Service
			ON rendezvs.codeService = Service.codeService
		WHERE rendezvs.numeroDossierPatient = $ndp 
		ORDER BY dateRvServ ASC";
	    return executesql($sql);
		mysql_close();
	}
}

/*

function showRv ( ) {	

	if (isset($_SESSION['np'])) {

		//Requete permettant de selectionner tous les rendez vs enregistrés pour un patient
		$ndp=$_SESSION['np'] ;
		$sql="SELECT * FROM rendezvs , Service where rendezvs.numeroDossierPatient = $np and rendezvs.codeService = Service.codeService order by dateRvServ ASC";
	    return executesql($sql);
		mysql_close();
	}
*/


function showRvProcess ( ) {
	
	//Requete permettant d'afficher les rendez vs enregistrés pour un patient
	if (isset($_SESSION['np'])) {
		
		$ndp=$_SESSION['np'] ;
		$sql="SELECT service.codeService , designService , dateRvServ  FROM rendezvs 
		INNER JOIN Service 
		ON rendezvs.codeService = Service.codeService
		WHERE rendezvs.numeroDossierPatient = $ndp order by dateRvServ ASC" ;
    	return executesql($sql);
		mysql_close();
	}
}

/*

function showRvProcess ( ) {
	
	//Requete permettant d'afficher les rendez vs enregistrés pour un patient
	if (isset($_SESSION['np'])) {
		
		$ndp=$_SESSION['np'] ;
		$sql="SELECT service.codeService , designService , dateRvServ  FROM rendezvs , Service where rendezvs.numeroDossierPatient = $ndp and rendezvs.codeService = Service.codeService order by dateRvServ ASC" ;
    	return executesql($sql);
		mysql_close();
	}
}
*/


function updateRv ( $service , $jour) {
	
	//Requete de mise a jour dun rv patient pour un service	
	if (isset($_SESSION['np'])) {	

		$ndp=$_SESSION['np'] ;
		$sql="UPDATE rendezvs set dateRvServ= '$jour' where rendezvs.numeroDossierPatient = $ndp and rendezvs.codeService = '$service' " ;
    	return executesql($sql);
		mysql_close();
	}
}

?>