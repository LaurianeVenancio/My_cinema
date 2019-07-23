<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=epitech_tp;charset=utf8', 'root', 'root');
}
catch (Exception $erreur){
    echo "Echec de la connection à la base de données : $erreur";
}

include "php/test3.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>my_cinema_Client</title>
    <link rel="stylesheet" href="css/my_cinema_page3.css"/>
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
<h2>Trouver un abonnement</h2>

<form method="post" action="">
    <input type="text" name="client" placeholder="Par Nom ou prenom du client">ou
    <input type="number" name="num_client" placeholder="Par N° Client">
    <input type="submit" value="Valider" name="Envoi"><br/>
</form>
<?php
if (isset($_POST["client"]) && !empty($_POST["client"]) || !empty($_POST["num_client"])){
    if(!empty($client)){
    ?>

    <h2> Résultat :</h2>
    <table>
    <tr>
        <td>Nom</td>
        <td>Prenom</td>
        <td>Numéro du membre</td>
        <td>Abonnement actuel</td>
        <td>Id abonnement</td>
        <td></td>
    </tr>
    <?php
    foreach ($client as $value){?>
        <tr>
        <td><?=$value['nom_client']?></td>
        <td><?=$value['prenom']?></td>
        <td><?=$value['id_membre']?></td>
        <td><?=$value['nom_abo']?></td>
        <td><?=$value['num_abo']?></td>
        </tr><?php }?>

        </table><?php }
    else {?>
        <p>Aucun client ne correspond à votre recherche</p>
        <?php
    }}?>

<h2>Modifier ou supprimer un abonnement</h2>

<form method="post" action="">
    <input type="number" name="numclient" placeholder="Rentrer le n° client">
    <select name="modifier">
        <option value="">Selectionner un nouveau abonnement</option>
        <option value="NULL">Supprimer l'abonnement</option>
        <?php
        foreach ($modi as $value2){?>
            <option value="<?=$value2["id_abo"]?>"><?=$value2["nom"]?></option>
        <?php } ?>
    </select>
    <input type="submit" value="Valider" name="Envoi"><br/>
</form>
<footer>
    <div class="right">
        Site créer par Lauriane Venancio © COPYRIGHT
    </div>
</footer>
</body>
</html>