<?php
session_start();
function isConnected(){
  if (!empty($_SESSION["admin"])){
    return 1;
  }  
}


?>