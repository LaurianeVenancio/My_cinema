<?php
$reponseclient = $bdd->prepare("SELECT fiche_personne.id_perso, fiche_personne.nom AS nom_client, prenom, abonnement.nom AS nom_abo, date_naissance, email, adresse, cpostal, ville, pays FROM membre
                                              LEFT JOIN fiche_personne ON membre.id_fiche_perso = fiche_personne.id_perso
                                              LEFT JOIN abonnement ON membre.id_abo = abonnement.id_abo
                                              WHERE 1 ORDER BY fiche_personne.nom");
$reponsemodi = $bdd->prepare("SELECT * from abonnement WHERE 1");

if(isset($_POST['client']) && !empty($_POST['client'])){
    $reponseclient = $bdd->prepare("SELECT fiche_personne.id_perso, fiche_personne.nom AS nom_client, prenom, abonnement.nom AS nom_abo, id_membre, membre.id_abo AS num_abo, id_fiche_perso FROM membre
                                              LEFT JOIN fiche_personne ON membre.id_fiche_perso = fiche_personne.id_perso
                                              LEFT JOIN abonnement ON membre.id_abo = abonnement.id_abo
                                              WHERE 1 AND fiche_personne.nom LIKE '%" . $_POST["client"] . "%' 
                                              OR prenom LIKE '%" . $_POST["client"] . "%' ORDER BY fiche_personne.nom");
}
if(isset($_POST['num_client']) && !empty($_POST['num_client'])){
    $reponseclient = $bdd->prepare("SELECT fiche_personne.id_perso, fiche_personne.nom AS nom_client, prenom, abonnement.nom AS nom_abo, id_membre, membre.id_abo AS num_abo, id_fiche_perso FROM membre
                                              LEFT JOIN fiche_personne ON membre.id_fiche_perso = fiche_personne.id_perso
                                              LEFT JOIN abonnement ON membre.id_abo = abonnement.id_abo
                                              WHERE 1 AND id_membre=" . $_POST['num_client'] . "");
}
if (isset($_POST['numclient']) && !empty($_POST['numclient']) && isset($_POST['modifier']) && !empty($_POST['modifier'])){
    $reponsemodifier = $bdd->prepare("UPDATE membre set id_abo=" . $_POST['modifier'] . " WHERE id_membre=" . $_POST['numclient'] . "");
    $reponsemodifier->execute();
    $modifier = $reponsemodifier->fetchAll(PDO::FETCH_ASSOC);
}
$reponseclient->execute();
$client = $reponseclient->fetchAll(PDO::FETCH_ASSOC);
$reponsemodi->execute();
$modi = $reponsemodi->fetchAll(PDO::FETCH_ASSOC);
?>