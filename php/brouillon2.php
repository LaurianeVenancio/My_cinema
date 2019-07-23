<?php
if(isset($_POST['recherche']) && !empty($_POST['recherche'])) {
    $reponsefilm = $bdd->prepare("SELECT titre, id_film, resum FROM film WHERE titre LIKE '%" . $_POST['recherche'] . "%' ORDER BY titre");
    $reponsefilm->execute();
    $film = $reponsefilm->fetchAll(PDO::FETCH_ASSOC);
}
if (isset($_POST['num_film']) && !empty($_POST['num_film']) && isset($_POST['avis']) && !empty($_POST['avis'])) {
    /*$reponseavis = $bdd->prepare("ALTER TABLE historique_membre ADD avis VARCHAR(500)");
    $reponseavis->execute();
    $avis = $reponseavis->fetchAll(PDO::FETCH_ASSOC);*/
    $reponseavisfilm = $bdd->prepare("UPDATE historique_membre SET avis = '" . $_POST['avis'] . "' WHERE id_film = '" . $_POST['num_film'] . "'");
    $reponseavisfilm->execute();
    $avisfilm = $reponseavisfilm->fetchAll(PDO::FETCH_ASSOC);
}
?>