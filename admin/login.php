<?php
require "../function.php";
if (isConnected()){
    header("location:liste-apprenants.php");
    die;

}
foreach ($_POST as $key => $val) {
    ${$key}=$val;
}
if(isset($_POST['send'])){
    if(filter_var($email, FILTER_VALIDATE_EMAIL) &&
        $password !="" ){
        
        require_once "../db-connect.php";
        $sql = "SELECT * FROM admins WHERE email = '$email' AND mot_de_passe = '" . md5($password) . "'";

        $result = mysqli_query($dbcon, $sql);

        // Vérification du résultat de la requête
        if (mysqli_num_rows($result) == 1) {
            // L'utilisateur est authentifié avec succès
            $rows=mysqli_fetch_assoc($result);
            $_SESSION["admin"]= $rows["id"];
            $_SESSION["admin_level"]= $rows["level"];
            $_SESSION["admin_prenom"]= $rows["prenom"];
            header("location:liste-apprenants.php");

        } 
        
        else {
            // L'utilisateur n'est pas authentifié
            echo "Identifiants invalides";
        }

    }
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Connexion Administrateurs</title>
</head>
<body>
    
    <form action="" method="post">
        <h1>Connectez-vous !</h1>
        <input type="email" name="email" id="" placeholder="Adresse Email" required>
        <input type="password" name="password" id="" placeholder="Mot de passe" required>
        <input type="submit" value="Se connecter" name="send">
        <a class="link back" href="../index.php">Retour à la liste</a>
    </form>

</body>
</html>