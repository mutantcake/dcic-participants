<?php
require_once "../db-connect.php";

//Recuperation de la liste des participants

$sql="SELECT * FROM apprenants";
$recup= mysqli_query($dbcon, $sql);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Liste des apprenants</title>
</head>
<body>
<main>
<div class="adsearch">
        <div class="link-container">
        <a class="link" href="ajout-apprenant.php">Ajouter un apprenant</a>
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
                <td><?=$rows['date_naissance']?></td>
                <td><?=$rows['ville']?></td>
                <td><?=$rows['formation']?></td>
                
                <td class="image"><a href="edit-apprenant.php?id=<?=$rows['id']?>"><img src="../images/write.png" alt="Modifier"></a></td>
                <td class="image"><a href="delete-apprenant.php?id=<?=$rows['id']?>"><img src="../images/remove.png" alt="Supprimer"></a></td>
            </tr>

            <?php
                }
            }

            else {
                echo "<p class='message'>Aucun apprenant n'est enregistré pour le moment.</p>";
            }

            ?>

        </tbody>
    </table>
</main>
</body>
</html>