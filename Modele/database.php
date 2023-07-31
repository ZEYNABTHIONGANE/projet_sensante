<?php
function getconnection () {
    //Fonctioon de connection a la base avec les parametres generaux
    $db = new PDO('mysql:host=localhost;dbname=sensante', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); // On affiche les erreurs avec la base de donnée
    return $db ;
}


function executesql ($sql) {
    //Fonction d'execution des requetes SQL
    $db = getconnection();
    return $db->query($sql);
}

function prepare_executesql ($sql , $parameters) {
    //Fonction d'execution des requetes SQL preparees
    $db = getconnection();
    $requete_preparee = $db->prepare($sql) ;
    $requete_preparee->execute($parameters);
    return $requete_preparee ;
}


?>

