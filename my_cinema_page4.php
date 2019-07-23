<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=epitech_tp;charset=utf8', 'root', 'root');
}
catch (Exception $erreur){
    echo "Echec de la connection à la base de données : $erreur";
}

include "php/test4.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>my_cinema_Client</title>
    <link rel="stylesheet" href="css/my_cinema_page4.css"/>
</head>
<body>
<nav class="menu">
    <ul>
        <li><a href="my_cinema_lauriane.php" class="onglet1">Recherche Films</a></li>
        <li><a href="my_cinema_page2.php">Recherche clients</a></li>
        <li><a href="my_cinema_page3.php">Recherche abonnements</a></li>
        <li><a href="my_cinema_page4.php">Historique clients et ajout d'un avis</a></li>
    </ul>
</nav>
<h2>Historique client</h2>

<form method="post" action="">
    <input type="number" name="num_client" placeholder="Par N° Client">
    <input type="submit" value="Valider" name="Envoi"><br/>
</form>
<?php
if (isset($_POST["num_client"]) && !empty($_POST["num_client"])){
    if(!empty($client)){
    ?>

    <h2> Résultat :</h2>
    <table>
    <tr>
        <td>Numéro du membre</td>
        <td>Date de vissionage</td>
        <td>ID du film</td>
        <td>Titre du film</td>
        <td>Résumé</td>
        <td>Avis</td>
    </tr>
    <?php
    foreach ($client as $value){?>
        <tr>
        <td><?=$value['num_membre']?></td>
        <td><?=$value['date']?></td>
        <td><?=$value['film_vu']?></td>
        <td><?=$value['titre']?></td>
        <td><?=$value['resum']?></td>
        <td><?=$value['avis']?></td>
        </tr><?php }?>

        </table><?php }
    else {?>
        <p>Aucun client ne correspond à votre recherche</p>
        <?php
    }}?>
<h2>Ajouter un film vu</h2>

<form method="post" action="">
    <input type="number" name="idclient" placeholder="Rentrer un ID de client">
    <input type="number" name="idfilm" placeholder="Rentrer un ID de film">
    <input type="date" name="datevu">
    <input type="submit" value="Valider" name="Envoi"><br/>
</form>

<h2>Ajouter un avis</h2>

<form method="post" action="">
    <input type="number" name="numclient" placeholder="Rentrer un ID de client">
    <input type="number" name="numfilm" placeholder="Rentrer un ID de film"><br/>
    <textarea name="avis" rows="10" cols="40" maxlength="500" placeholder="Donnez votre avis sur le film"></textarea>
    <input type="submit" value="Valider" name="Envoi"><br/>
</form>

<footer>
    <div class="right">
        Site créer par Lauriane Venancio © COPYRIGHT
    </div>
</footer>
</body>
</html>