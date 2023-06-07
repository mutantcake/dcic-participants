
<?php
foreach ($_POST as $key => $val) {
    require_once "../db-connect.php";
    ${$key}=$dbcon->real_escape_string($val);
}
if(isset($_POST['send'])){
    if($nom !="" &&
        $prenom !="" &&
        $birthday !="" &&
        $ville !="" &&
        $formation !="" ){
        
        require_once "../db-connect.php";
        $sql ="INSERT INTO `apprenants` (`nom`, `prenom`, `date_naissance`, `ville`, `formation`)
        VALUES ('$nom', '$prenom', '$birthday', '$ville', '$formation');";

        if (mysqli_query($dbcon, $sql)){
            header("location:liste-apprenants.php");
        }

        else{
            header("location:ajout-apprenant.php?m=EchecAjout");
        }
        
    }
    else{
        header("location:ajout-apprenant.php?m=ChampsVide");
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
    <title>Ajouter un apprenant</title>
</head>
<body>
    
    <form action="" method="post">
        <h1>Ajouter un apprenant</h1>
        <input type="text" name="nom" id="" placeholder="Nom de l'apprenant" required>
        <input type="text" name="prenom" id="" placeholder="Prénom de l'apprenant" required>
        <input type="date" name="birthday" id="" placeholder="Date de naissance Format: AN/M/JOUR" min="1980-01-01" max="2005-01-01" required>
        <input type="text" name="ville" id="" placeholder="Ville d'origine" required>
        <input type="text" name="formation" id="" placeholder="Formation de base" required>
        <input type="submit" value="Ajouter" name="send">
        <a class="link back" href="liste-apprenants.php">Annuler</a>
    </form>

</body>
</html>