<?php

function dateEgToFr ( $EgDate ) {//Fonction de Conversion d'une date au format anglais vers le format francais

if (isset($EgDate)) {  
  if ($EgDate[4]== '-') $parts=explode('-',$EgDate);
  else 				  $parts=explode('/',$EgDate);
  
  return $parts[2].'-'.$parts[1].'-'.$parts[0] ;
	}
}

function dateFrToEg ( $FrDate ) {//Fonction de Conversion d'une date au format francais vers le format anglais
if (isset($FrDate)) {  
  
  if ($FrDate[2]== '-') $parts=explode('-',$FrDate);
  else 				  $parts=explode('/',$FrDate);

  return $parts[2].'-'.$parts[1].'-'.$parts[0] ;
	}
}

function linkWithoutParam(){
  $urlCourante=$_SERVER["REQUEST_URI"];
  $urlGet = explode("?",$urlCourante);
  return  $urlGet[0];
}
?>