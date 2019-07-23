<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=epitech_tp;charset=utf8', 'root', 'root');
}
catch (Exception $erreur){
    echo "Echec de la connection à la base de données : $erreur";
}

include "php/test2.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>my_cinema_Client</title>
    <link rel="stylesheet" href="css/my_cinema_page2.css"/>
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
<h2>Rechercher un client</h2>

<form method="post" action="">
    <input type="text" name="client" placeholder="Rechercher un client">
    <input type="submit" value="Valider" name="Envoi"><br/>
</form>
<?php
if (isset($_POST["client"])){
    if (!empty($client)){
    ?>

    <h2> Résultat :</h2>
    <table>
    <tr>
        <td>Nom</td>
        <td>Prenom</td>
        <td>Date de naissance</td>
        <td>Email</td>
        <td>Adresse</td>
        <td>Code postal</td>
        <td>Ville</td>
        <td>Abonnement actuel</td>
    </tr>
    <?php
    foreach ($client as $value){?>
        <tr>
        <td><?=$value['nom_client']?></td>
        <td><?=$value['prenom']?></td>
        <td><?=$value['date_naissance']?></td>
        <td><?=$value['email']?></td>
        <td><?=$value['adresse']?></td>
        <td><?=$value['cpostal']?></td>
        <td><?=$value['ville']?></td>
        <td><?=$value['nom_abo']?></td>
        </tr><?php }?>

    </table><?php }
    else {?>
<p>Aucun client ne correspond à votre recherche</p>
<?php
    }}?>
<footer>
    <div class="right">
        Site créer par Lauriane Venancio © COPYRIGHT
    </div>
</footer>
</body>
</html>