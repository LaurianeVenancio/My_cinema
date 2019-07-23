
<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=epitech_tp;charset=utf8', 'root', 'root');
}
catch (Exception $erreur){
    echo "Echec de la connection à la base de données : $erreur";
}

include "php/ultimetest.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>my_cinema_Lauriane</title>
    <link rel="stylesheet" href="css/my_cinema.css"/>
</head>
<body>
<nav class="menu">
    <ul>
        <li><a href="my_cinema_lauriane.php" class="onglet1">Recherche Films</a></li>
        <li><a href="my_cinema_page2.php">Recherche clients</a></li>
        <li><a href="my_cinema_page3.php">Recherche abonnements</a></li>
        <li><a href="my_cinema_page4.php">Historique clients et ajout d'un avis</a></li>
    </ul><br/>
</nav>

    <h1>My cinema Lauriane</h1>

    <h2>Rechercher un film</h2>

    <form method="post" action="">
        <input type="text" name="recherche" placeholder="Titre du film">
        <select name="genre">
            <option value="">Selectionner par Genre</option>
            <?php
                foreach ($genre as $value){?>
                    <option value="<?=$value["nom"]?>"><?=$value["nom"]?></option>
                <?php } ?>
        </select>
        <select name="distrib">
            <option value="">Selectionner par Distributeur</option>
            <?php
            foreach ($distrib as $value2){?>
                <option value="<?=$value2["nom"]?>"><?=$value2["nom"]?></option>
            <?php } ?>
        </select>
        <input type="submit" value="Valider" name="Envoi"><br/>
    </form>
    <?php
        if (isset($_POST["recherche"]) && isset($_POST["genre"]) && isset($_POST["distrib"])){
            if (!empty($film)){
            ?>

    <h2> Résultat :</h2>
        <table>
            <tr>
                <td>Titre</td>
                <td>Résumé</td>
                <td>Genre</td>
                <td>Date de début d'affiche</td>
                <td>Date de fin affiche</td>
                <td>Durée du film</td>
                <td>Année de production</td>
                <td>Distributeur</td>
            </tr>
            <?php
            foreach ($film as $value3){?>
            <tr>
                <td><?=$value3['titre']?></td>
                <td><?=$value3['resum']?></td>
                <td><?=$value3['nom_genre']?></td>
                <td><?=$value3['date_debut_affiche']?></td>
                <td><?=$value3['date_fin_affiche']?></td>
                <td><?=$value3['duree_min']?></td>
                <td><?=$value3['annee_prod']?></td>
                <td><?=$value3['distributeur']?></td>
            </tr><?php }?>

                </table><?php }
            else {?>
                <p>Aucun film ne correspond à votre recherche</p>
                <?php
            }}?>
    <footer>
        <div class="right">
            Site créer par Lauriane Venancio © COPYRIGHT
        </div>
    </footer>

</body>
</html>




