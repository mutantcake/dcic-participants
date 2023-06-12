<?php
require "../function.php";
if (!isConnected()){
    header("location:login.php");
    die;

}

foreach ($_POST as $key => $val) {
    require_once "../db-connect.php";
    ${$key}=$val;
}
if($_SESSION['admin_level']==1){
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

        $sql ="INSERT INTO admins (nom, prenom, email, mot_de_passe, level) VALUES ('$nom', '$prenom', '$email', '".MD5($password)."', '$level');";

        if (mysqli_query($dbcon, $sql)){
            header("location:liste-admins.php");
        }

        else{
            header("location:ajout-admin.php?m=EchecAjout");
        }
        
    }
    else{
        header("location:ajout-admin.php?m=ChampsVide");
    }
}
}
else {
    header("location:liste-admins.php?err=levelError");
}

?>



<!-- Ci-dessus update -->


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
    <title>Ajouter un administrateur</title>
</head>
<body>
    
    <form action="" method="post" >
        <h1>Ajouter un administrateur</h1>
        <input type="text" name="nom" value="" placeholder="Nom de l'administrateur" required>
        <input type="text" name="prenom" value="" placeholder="Prénom de l'administrateur" required>
        <input type="email" name="email" value="" placeholder="Adresse Email" required>
        <input type="number" name="level" value="<?php if($_SESSION['admin_level']!=1){ echo '2';}?>" placeholder="Niveau de Privilège" <?php if($_SESSION['admin_level']!=1){ echo 'readonly="readonly"';} ?> min="1" max="2"  required>
        <input type="password" name="password" value="" placeholder="Mot de passe" required>
        <input type="submit" value="Ajouter" name="send">
        <a class="link back" href="liste-admins.php">Annuler</a>
     </form>
</body>
</html>
