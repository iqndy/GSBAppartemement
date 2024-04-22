<?php

include "./getRacine.php";
include "$racine/modele/DAO.Visiter.php";

$DAOVisiter = new DAOVisiter();
session_start();


// Pour AccepterVisite
if ($_GET['action'] === 'AccepterDemande') {
    $idAppartement = $_POST['id_appartement'];
    $idVisiteur = $_POST['id_visiteur'];
    $DAOVisiter->accepterDemande($idAppartement, $idVisiteur);
    include "$racine/vue/vueConfirmationAccepterVisite.php";
}

