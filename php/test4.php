<?php
$reponseclient = $bdd->prepare("SELECT historique_membre.id_membre AS num_membre, membre.id_membre AS idmembre, historique_membre.id_film AS film_vu, historique_membre.date, titre, resum, avis FROM historique_membre
                                LEFT JOIN membre ON historique_membre.id_membre = membre.id_membre
                                LEFT JOIN film ON historique_membre.id_film = film.id_film
                                WHERE 1");

if(isset($_POST['num_client']) && !empty($_POST['num_client'])){
    $reponseclient = $bdd->prepare("SELECT historique_membre.id_membre AS num_membre, membre.id_membre AS idmembre, historique_membre.id_film AS film_vu, historique_membre.date, titre, resum, avis FROM historique_membre
                                LEFT JOIN membre ON historique_membre.id_membre = membre.id_membre
                                LEFT JOIN film ON historique_membre.id_film = film.id_film
                                WHERE 1 AND historique_membre.id_membre='" . $_POST['num_client'] . "' ORDER BY historique_membre.date DESC");
}
$reponseclient->execute();
$client = $reponseclient->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['idclient']) && !empty($_POST['idclient']) && isset($_POST['idfilm']) && !empty($_POST['idfilm']) && isset($_POST['datevu']) && !empty($_POST['datevu'])){
    $reponsedate = $bdd->prepare("INSERT INTO historique_membre (id_membre, id_film, historique_membre.date) VALUES ('" . $_POST['idclient'] . "', '" . $_POST['idfilm'] . "', '" . $_POST['datevu'] . "')");
    $reponsedate->execute();
    $date = $reponsedate->fetchAll(PDO::FETCH_ASSOC);
}
if(isset($_POST['recherche']) && !empty($_POST['recherche'])) {
    $reponsefilm = $bdd->prepare("SELECT titre, id_film, resum FROM film WHERE titre LIKE '%" . $_POST['recherche'] . "%' ORDER BY titre");
    $reponsefilm->execute();
    $film = $reponsefilm->fetchAll(PDO::FETCH_ASSOC);
}
if (isset($_POST['numfilm']) && !empty($_POST['numfilm']) && isset($_POST['avis']) && !empty($_POST['avis']) && isset($_POST['numclient']) && !empty($_POST['numclient'])){
    $reponsemodifier = $bdd->prepare("UPDATE historique_membre SET avis='" . $_POST['avis'] . "' WHERE id_film='" . $_POST['numfilm'] . "' AND id_membre='" . $_POST['numclient'] ."'");
    $reponsemodifier->execute();
    $modifier = $reponsemodifier->fetchAll(PDO::FETCH_ASSOC);
}
?>

