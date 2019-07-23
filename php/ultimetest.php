<?php

$reponsegenre = $bdd->query('SELECT nom FROM genre ORDER BY nom');
$genre = $reponsegenre->fetchAll(PDO::FETCH_ASSOC);

$reponsedistrib = $bdd->query('SELECT nom FROM distrib ORDER BY nom');
$distrib = $reponsedistrib->fetchAll(PDO::FETCH_ASSOC);

$requete = "SELECT titre, resum, genre.nom AS nom_genre, date_debut_affiche, date_fin_affiche, duree_min, annee_prod, distrib.nom AS distributeur FROM film LEFT JOIN genre ON film.id_genre = genre.id_genre LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib WHERE 1";

if(isset($_POST['recherche']) && !empty($_POST['recherche'])){
    $requete .= " AND titre LIKE '%" . $_POST['recherche'] . "%'";
}
if(isset($_POST['genre']) && !empty($_POST['genre'])){
    $requete .= " AND genre.nom='" . $_POST['genre'] . "'";
}
if(isset($_POST['distrib']) && !empty($_POST['distrib'])){
    $requete .= " AND distrib.nom='" . $_POST['distrib'] . "'";
}
$requete .= " ORDER BY titre ";
$reponsefilm = $bdd->prepare($requete);
$reponsefilm->execute();
$film = $reponsefilm->fetchALL(PDO::FETCH_ASSOC);