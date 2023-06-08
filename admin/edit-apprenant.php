<?php
$ap_id= $_GET['id'];
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
        $sql ="UPDATE apprenants SET nom='$nom', prenom='$prenom', date_naissance='$birthday', ville='$ville', formation='$formation' WHERE id=$ap_id;";

        if (mysqli_query($dbcon, $sql)){
            header("location:liste-apprenants.php");
        }

        else{
            header("location:edit-apprenant.php?m=EchecEdit");
        }
        
    }
    else{
        header("location:edit-apprenant.php?m=ChampsVide");
    }
}
?>

<!-- Ci-dessus update -->



<?php

require_once "../db-connect.php";

//recup des infos de l'utilisateur
$sql= 'SELECT * FROM apprenants where id='.$ap_id;
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
    <title>Editer un apprenant</title>
</head>
<body>
    
    <form action="" method="post" onsubmit="return confirmerModif();">
        <h1>Editer un apprenant</h1>
        <input type="text" name="nom" value="<?=$row['nom']?>" placeholder="Nom de l'apprenant" required>
        <input type="text" name="prenom" value="<?=$row['prenom']?>" placeholder="Prénom de l'apprenant" required>
        <input type="date" name="birthday" value="<?=$row['date_naissance']?>" placeholder="Date de naissance Format: AN/M/JOUR" min="1980-01-01" max="2005-01-01" required>
        <input type="text" name="ville" value="<?=$row['ville']?>" placeholder="Ville d'origine" required>
        <input type="text" name="formation" value="<?=$row['formation']?>" placeholder="Formation de base" required>
        <input type="submit" value="Modifier" name="send">
        <a class="link back" href="liste-apprenants.php">Annuler</a>
     </form>
<?php
}
?>
</body>
</html>
