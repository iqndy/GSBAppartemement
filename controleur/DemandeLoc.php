<?php

include "./getRacine.php";
include "$racine/modele/DAO.Visiter.php";

$DAOVisiter = new DAOVisiter();
session_start();


// Pour AccepterVisite
if ($_GET['action'] === 'DemandeLoc') {
    $idAppartement = $_POST['id_appartement'];
    $idVisiteur = $_POST['id_visiteur'];
    $DAOVisiter->updateStatutLocationAttente($idAppartement, $idVisiteur);
    include "$racine/vue/vueConfirmationDemandeLocation.php";
}

