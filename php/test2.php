<?php
$reponseclient = $bdd->prepare("SELECT fiche_personne.id_perso, fiche_personne.nom AS nom_client, prenom, abonnement.nom AS nom_abo, date_naissance, email, adresse, cpostal, ville, pays FROM membre 
                                              LEFT JOIN fiche_personne ON membre.id_fiche_perso = fiche_personne.id_perso
                                              LEFT JOIN abonnement ON membre.id_abo = abonnement.id_abo
                                              WHERE 1");

if(isset($_POST['client']) && !empty($_POST['client'])){
    $reponseclient = $bdd->prepare("SELECT fiche_personne.id_perso, fiche_personne.nom AS nom_client, prenom, abonnement.nom AS nom_abo, date_naissance, email, adresse, cpostal, ville, pays FROM membre 
                                              LEFT JOIN fiche_personne ON membre.id_fiche_perso = fiche_personne.id_perso
                                              LEFT JOIN abonnement ON membre.id_abo = abonnement.id_abo
                                              WHERE 1 AND fiche_personne.nom LIKE '%" . $_POST["client"] . "%' 
                                              OR prenom LIKE '%" . $_POST["client"] . "%' ORDER BY fiche_personne.nom");
}
$reponseclient->execute();
$client = $reponseclient->fetchAll(PDO::FETCH_ASSOC);
    ?>