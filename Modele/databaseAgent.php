<?php
function checkAgent ($username ) {
	//Requete permettant de verifier l'existence d'un agent par son username
	$sql_prepare="SELECT * FROM agent WHERE username = :username " ;
	$parameters = Array('username' => $username ) ;
    return prepare_executesql($sql_prepare,$parameters);
	mysql_close();
}

function updateagent ($username , $prenom_agent , $nom_agent , $password , $telephone_agent) {
	//Requete permettant de mettre a jour les données du profil d'un agent
	$sql_prepare="UPDATE Agent SET prenom_agent = :prenom_agent , nom_agent = :nom_agent , telephone_agent = :telephone_agent , password = :password WHERE username = :username " ;
	$parameters = Array('prenom_agent' => $prenom_agent , 'nom_agent' => $nom_agent , 'password' => $password , 'telephone_agent' => $telephone_agent , 'username' => $username) ;
	return prepare_executesql($sql_prepare,$parameters);
	mysql_close();
}
    

function decrementStatus ($username , $status ) {
	//Requete permettant de limiter le nombre de tentatives de connexion
	$status--;
	$sql_prepare="UPDATE Agent SET status = :status WHERE username = :username " ;
	$parameters = Array('status' => $status , 'username' => $username);
    return prepare_executesql($sql_prepare,$parameters);
	mysql_close();
}

function incrementStatus ($username) {
	//Requete permettant de remettre le compteur de tentatives de connexion au max apres une connexion reussie
	$sql_prepare="UPDATE Agent SET status = 3 WHERE username = :username " ;
	$parameters = Array('username' => $username ) ;
    return prepare_executesql($sql_prepare,$parameters);
	mysql_close();
}

?>