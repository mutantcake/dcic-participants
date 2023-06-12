<?php
    require "../function.php";
    if (!isConnected()){
        header("location:login.php");
        die;
    
    }
    
    $appr_id=$_GET['id'];
    include_once "../db-connect.php";
    $sql= "DELETE FROM apprenants where id=$appr_id";
    if (mysqli_query($dbcon, $sql)) {
        header("location:liste-apprenants.php");
    }

    else
    {
        echo "Suppression impossible.";
    }

?>