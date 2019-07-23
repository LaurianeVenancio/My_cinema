<?php

$reponsegenre = $bdd->query('SELECT nom FROM genre ORDER BY nom');
$genre = $reponsegenre->fetchAll(PDO::FETCH_ASSOC);

$reponsedistrib = $bdd->query('SELECT nom FROM distrib ORDER BY nom');
$distrib = $reponsedistrib->fetchAll(PDO::FETCH_ASSOC);

$reponsefilm = $bdd->prepare("SELECT titre, resum, date_debut_affiche, date_fin_affiche, duree_min, annee_prod, genre.nom AS genrefilm, distrib.nom AS distributeur FROM film LEFT JOIN genre ON film.id_genre = genre.id_genreLEFT JOIN distrib ON film.id_distrib = distrib.id_distrib WHERE 1");
if(isset($_POST['distrib']) && !empty($_POST['distrib']) && empty($_POST['recherche']) && empty($_POST['distrib'])){
    $reponsefilm = $bdd->prepare("SELECT titre, resum, date_debut_affiche, date_fin_affiche, duree_min, annee_prod, genre.nom AS genrefilm, distrib.nom AS distributeur FROM film 
                                            LEFT JOIN genre ON film.id_genre = genre.id_genre
                                            LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
                                            WHERE 1 AND distrib.nom='".$_POST['distrib']."'");
}
if(isset($_POST['recherche']) && !empty($_POST['recherche'])){
    $reponsefilm = $bdd->prepare("SELECT titre, resum, date_debut_affiche, date_fin_affiche, duree_min, annee_prod, genre.nom AS genrefilm, distrib.nom AS distributeur FROM film
                                                    LEFT JOIN genre ON film.id_genre = genre.id_genre
                                                    LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
                                                    WHERE 1 AND titre LIKE '%" . $_POST["recherche"] . "%'");
}
if(isset($_POST['genre']) && !empty($_POST['genre'])){
    $reponsefilm = $bdd->prepare("SELECT titre, resum, date_debut_affiche, date_fin_affiche, duree_min, annee_prod, genre.nom AS genrefilm, distrib.nom AS distributeur FROM film 
                                                    LEFT JOIN genre ON film.id_genre = genre.id_genre
                                                    LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
                                                    WHERE 1 AND titre LIKE '%" . $_POST["recherche"] . "%' AND genre.nom='" . $_POST['genre'] . "'");
}
if(isset($_POST['distrib']) && !empty($_POST['distrib'])){
    $reponsefilm = $bdd->prepare("SELECT titre, resum, date_debut_affiche, date_fin_affiche, duree_min, annee_prod, genre.nom AS genrefilm, distrib.nom AS distributeur FROM film 
                                                    LEFT JOIN genre ON film.id_genre = genre.id_genre
                                                    LEFT JOIN distrib ON film.id_distrib = distrib.id_distrib
                                                    WHERE 1 AND titre LIKE '%" . $_POST["recherche"] . "%' AND genre.nom='" . $_POST['genre'] . "' AND distrib.nom='".$_POST['distrib']."'");
}

$reponsefilm->execute();
$film = $reponsefilm->fetchAll(PDO::FETCH_ASSOC);


?>
