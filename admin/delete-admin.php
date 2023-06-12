<?php
    require "../function.php";
    if (!isConnected()){
        header("location:login.php");
        die;
    
    }
    
    $admin_id=$_GET['id'];

    if($admin_id== $_SESSION['admin'] OR $_SESSION['admin_level']==1){
        include_once "../db-connect.php";
        $sql= "DELETE FROM admins where id=$admin_id";
        if (mysqli_query($dbcon, $sql)) {

            if($admin_id== $_SESSION['admin']){
                session_destroy();
            }
            header("location:liste-admins.php");
        }

        else
        {
            echo "Suppression impossible.";
        }
    }
    else{
        header("location:liste-admins.php?err=levelError");
    }
?>