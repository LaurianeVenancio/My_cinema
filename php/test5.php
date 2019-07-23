<?php
if(isset($_POST['recherche']) && !empty($_POST['recherche'])) {
    $reponsefilm = $bdd->prepare("SELECT titre, id_film, resum FROM film WHERE titre LIKE '%" . $_POST['recherche'] . "%' ORDER BY titre");
    $reponsefilm->execute();
    $film = $reponsefilm->fetchAll(PDO::FETCH_ASSOC);
}
if (isset($_POST['numfilm']) && !empty($_POST['numfilm']) && isset($_POST['avis']) && !empty($_POST['avis']) && isset($_POST['numclient']) && !empty($_POST['numclient'])){
    echo 'caca';
    $reponsemodifier = $bdd->prepare("UPDATE historique_membre SET avis='" . $_POST['avis'] . "' WHERE id_film='" . $_POST['numfilm'] . "' AND id_membre='" . $_POST['numclient'] ."'");
    $reponsemodifier->execute();
    $modifier = $reponsemodifier->fetchAll(PDO::FETCH_ASSOC);
}
?>