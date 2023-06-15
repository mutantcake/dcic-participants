<?php
require "../function.php";
if (!isConnected()){
    header("location:login.php");
    die;

}

require_once "../db-connect.php";

//Recuperation de la liste des participants

$sql="SELECT * FROM apprenants ORDER BY id DESC";
$recup= mysqli_query($dbcon, $sql);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
    <title>Liste des apprenants</title>
</head>
<body>
<main>
    <div><p class='message' style="font-size: 30px;">Liste des apprenants du programme D-CLIC</p></div>
<div class="adsearch">


        <div class="link-container">
        <a class="link" href="ajout-apprenant.php">Ajouter un apprenant</a>
        </div>

        <div class="link-container">
        <a class="link" href="liste-admins.php">Gérer les Administrateurs</a>
        </div>

        <div class="link-container">
        <a class="link" href="logout.php" style="color: #df3939; background-color:white;">Bonjour <?=$_SESSION['admin_prenom'];?>. Cliquez ici pour vous déconnecter !</a>
        </div>
    <?php
            
            if (mysqli_num_rows($recup)>0){

                //On verifie si la liste des participants n'est pas nulle
            
            ?>

        <form class="searchbox"action="recherche.php" method="$_POST">
        <input type="search" name="search" id="" required>
        <input type="submit" value="Rechercher">
        </form>
    
</div>
          

    <table>
        <thead>

       
        
        
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Ville d'origine</th>
                <th>Formation de base</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($rows=mysqli_fetch_assoc($recup)){
            ?>
            <tr>
                <td><?=$rows['nom']?></td>
                <td><?=$rows['prenom']?></td>
                <td><?= dateInFrench($rows['date_naissance'])?></td>
                <td><?=$rows['ville']?></td>
                <td><?=$rows['formation']?></td>
                
                <td class="image"><a href="edit-apprenant.php?id=<?=$rows['id']?>"><img src="../images/write.png" alt="Modifier"></a></td>
                <td class="image">
                    <a href="#" onclick="confirmerSuppressionAp(<?= $rows['id'] ?>)">
                        <img src="../images/remove.png" alt="Supprimer">
                    </a>
                 </td>
            </tr>

            <?php
                }
            }

            else {
                echo "<p class='messagesp'>Aucun apprenant n'est enregistré pour le moment.</p>";
            }

            ?>

        </tbody>
    </table>
</main>
</body>
</html>
