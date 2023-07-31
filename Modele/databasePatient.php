<?php

	function checkPatient ( $ndp) {
		//Requete permettant de verifier l'existence d'un patient a travers son identifiant
		$sql_prepare="SELECT * FROM patient WHERE numeroDossierPatient = :ndp" ;
		$parameters = Array( 'ndp' => $ndp) ;
	    return prepare_executesql($sql_prepare,$parameters);
		mysql_close();
	}

	function addpatient ($ndp, $prenoms, $nom, $telephone ) {
		//Requete permettant d'ajouter un nouveau patient
		$sql_prepare="INSERT INTO patient  VALUES ( :ndp , :prenoms , :nom , :telephone )" ;
		$parameters = Array ( 'ndp' => $ndp , 'prenoms' => $prenoms , 'nom' => $nom , 'telephone' => $telephone ) ;
	    return prepare_executesql($sql_prepare,$parameters);
		mysql_close();
	}

	function updatepatient ($ndp, $prenoms, $nom, $telephone ) {
		//Requete permettant de mettre a jour les donnees d'un patient
		$sql_prepare="UPDATE Patient SET prenomPatient = :prenoms , nomPatient = :nom , telephonePatient = :telephone WHERE numeroDossierPatient = :ndp " ;
		$parameters = Array( 'prenoms' => $prenoms , 'nom' => $nom , 'telephone' => $telephone , 'ndp' => $ndp) ;
	    return prepare_executesql($sql_prepare,$parameters);
		mysql_close();
	}

	function addinscription ($id_inscription, $nom, $prenom, $email,$password,$confirmpassword,$telephone,$sexe ) {
		//Requete permettant de valider l'inscription d'un nouveau patient
		$sql_prepare="INSERT INTO inscription  VALUES ( :id_inscription , :nom , :prenom , :email, :password, :confirmpassword, :telephone, :sexe )" ;
		$parameters = Array ( 'id_inscription' => $id_inscription , 'nom' => $nom , 'prenom' => $prenom , 'email' => $email , 'password' => $password, 'confirmpassword' => $confirmpassword,'telephone' => $telephone, 'sexe' => $sexe) ;
	    return prepare_executesql($sql_prepare,$parameters);
		mysql_close();
	}







?>


 