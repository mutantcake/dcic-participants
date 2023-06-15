<?php
session_start();
function isConnected(){
  if (!empty($_SESSION["admin"])){
    return 1;
  }  
}

function dateInFrench ($dateRaw){
  $date = explode("-", $dateRaw);
  $mois = ["", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
    
  $resultat = $date[2] . ' ' . $mois[(int)$date[1]] . ' ' . $date[0] ;
  
  return $resultat;
}


?>