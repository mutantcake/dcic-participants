<?php
require_once "db-connect.php";

//Recuperation de la liste des participants
$terme=$dbcon->real_escape_string($_GET['search']);
$sql="SELECT * FROM apprenants WHERE nom LIKE '%$terme' OR prenom LIKE '%$terme%' OR ville LIKE '%$terme%' OR formation LIKE '%$terme%'";
$recup= mysqli_query($dbcon, $sql);

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Résultat de recherche</title>
</head>
<body>
<main>
    <div class="link_container">
        <a class="link" href="index.php">Retour à la liste complète</a>
    </div>

    <table>
        <thead>

        <?php
        
        if (mysqli_num_rows($recup)>0){

            //On verifie si la liste des participants n'est pas nulle
        
        ?>
            <tr>
            <p class='message'>Résultat sur le terme de recherche : <?=$terme?></p>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de naissance</th>
                <th>Ville d'origine</th>
                <th>Formation de base</th>
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
                
            </tr>

            <?php
                }
            }

            else {
                echo "<p class='message'>Aucun résultat pour le terme de recherche: $terme</p>";
            }

            ?>

        </tbody>
    </table>
</main>
</body>
</html>
