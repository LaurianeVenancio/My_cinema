<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=epitech_tp;charset=utf8', 'root', 'root');
}
catch (Exception $erreur){
    echo "Echec de la connection à la base de données : $erreur";
}

include "php/test5.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>my_cinema_Client</title>
    <link rel="stylesheet" href="css/my_cinema_page5.css"/>
</head>
<body>
<nav class="menu">
    <ul>
        <li><a href="my_cinema_lauriane.php" class="onglet1">Recherche Films</a></li>
        <li><a href="my_cinema_page2.php">Recherche clients</a></li>
        <li><a href="my_cinema_page3.php">Recherche abonnements</a></li>
        <li><a href="my_cinema_page4.php">Historique clients</a></li>
        <li><a href="my_cinema_page5.php">Ajouter un avis</a></li>
    </ul>
</nav>
<h2>Trouver l'ID du film</h2>

<form method="post" action="">
    <input type="text" name="recherche" placeholder="Titre du film">
    <input type="submit" value="Valider" name="Envoi"><br/>
</form>
<?php
if (isset($_POST["recherche"]) && !empty($_POST['recherche'])){
    if (!empty($film)){
        ?>

        <h2> Résultat :</h2>
        <table>
        <tr>
            <td>Titre</td>
            <td>ID du film</td>
            <td>Résumé</td>
        </tr>
        <?php
        foreach ($film as $value){?>
            <tr>
            <td><?=$value['titre']?></td>
            <td><?=$value['id_film']?></td>
            <td><?=$value['resum']?></td>
            </tr><?php }?>

        </table><?php }
    else {?>
        <p>Aucun film ne correspond à votre recherche</p>
        <?php
    }}?>
<h2>Ajouter un avis</h2>

<form method="post" action="">
    <input type="number" name="numclient" placeholder="Rentrer un ID de client">
    <input type="number" name="numfilm" placeholder="Rentrer un ID de film"><br/>
    <textarea name="avis" rows="10" cols="40" maxlength="500">Donnez votre avis sur le film</textarea>
    <input type="submit" value="Valider" name="Envoi"><br/>
</form>

<footer>
    <div class="right">
        Site créer par Lauriane Venancio © COPYRIGHT
    </div>
</footer>
</body>
</html>