<?php
require "../function.php";
if(isConnected()){
    session_destroy();
    header("location:login.php");
}
else{
    
    header("location:../index.php");
}

?>