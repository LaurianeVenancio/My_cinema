<?php

    $reponsegenre = $bdd->query('select nom from genre order by nom');
    $genre = $reponsegenre->fetchAll(PDO::FETCH_ASSOC);

    $reponsedistrib = $bdd->query('select nom from distrib order by nom');
    $distrib = $reponsedistrib->fetchAll(PDO::FETCH_ASSOC);

    $reponsefilmgenre = $bdd->query("select film.id_genre, titre, resum, date_debut_affiche, date_fin_affiche, duree_min, annee_prod from film inner join genre on film.id_genre = genre.id_genre;");
    $filmgenre = $reponsefilmgenre->fetchAll(PDO::FETCH_ASSOC);



    if (isset( $_POST['recherche'] ) && !empty($_POST['recherche'])) {
        $recherche = $_POST["recherche"];
        $reponsefilm = $bdd->query("select * from film where titre like '%" . $recherche . "%'");
        $film = $reponsefilm->fetchAll(PDO::FETCH_ASSOC);
    }
    //if (isset( $_POST['genre'] ) && !empty($_POST['genre'])) {
        //$recherchegenre = $_POST["genre"];

    //}
?>