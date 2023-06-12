<?php
require "../function.php";
if (!isConnected()){
    header("location:login.php");
    die;

}

$ad_id= $_GET['id'];
foreach ($_POST as $key => $val) {
    require_once "../db-connect.php";
    ${$key}=$val;
}

if($ad_id== $_SESSION['admin'] OR $_SESSION['admin_level']==1){
    if(isset($_POST['send'])){
    if($nom !="" &&
        $prenom !="" &&
        $email !="" &&
        $password !="" &&
        $level !="" ){
        
        require_once "../db-connect.php";
        $nom=$dbcon->real_escape_string($nom);
        $prenom=$dbcon->real_escape_string($prenom);
        $email=$dbcon->real_escape_string($email);
        $level=$dbcon->real_escape_string($level);
        
        if($_SESSION['admin_level']!=1){ 
            $level=2;
        }

        $sql ="UPDATE admins SET nom='$nom', prenom='$prenom', email='$email', mot_de_passe='".MD5($password)."', level ='$level' WHERE id=$ad_id;";

        if (mysqli_query($dbcon, $sql)){
            header("location:liste-admins.php");
        }

        else{
            header("location:edit-admins.php?m=EchecEdit");
        }
        
    }
    else{
        header("location:edit-admins.php?m=ChampsVide");
    }
}
}
else {
    header("location:liste-admins.php?err=levelError");
}

?>



<!-- Ci-dessus update -->



<?php

require_once "../db-connect.php";

//recup des infos de l'utilisateur
$sql= 'SELECT * FROM admins where id='.$ad_id;
$recup= mysqli_query($dbcon, $sql);
while($row= mysqli_fetch_assoc($recup)){

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
    <title>Editer un administrateur</title>
</head>
<body>
    
    <form action="" method="post" onsubmit="return confirmerModifAd();">
        <h1>Editer un administrateur</h1>
        <input type="text" name="nom" value="<?=$row['nom'];?>" placeholder="Nom de l'administrateur" required>
        <input type="text" name="prenom" value="<?=$row['prenom'];?>" placeholder="Prénom de l'administrateur" required>
        <input type="email" name="email" value="<?=$row['email'];?>" placeholder="Adresse Email" required>
        <input type="number" name="level" value="<?=$row['level'];?>" placeholder="Niveau de Privilège" <?php if($_SESSION['admin_level']!=1){ echo 'readonly="readonly"';} ?> min="1" max="2"  required>
        <input type="password" name="password" value="" placeholder="Nouveau mot de passe" required>
        <input type="submit" value="Modifier" name="send">
        <a class="link back" href="liste-admins.php">Annuler</a>
     </form>
<?php
}
?>
</body>
</html>
