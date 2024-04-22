<?php

include "./getRacine.php";
include "$racine/modele/DAO.Visiter.php";

$DAOVisiter = new DAOVisiter();
session_start();


if ($_GET['action'] === 'RefuserDemande') {
    $idAppartement = $_POST['id_appartement'];
    $idVisiteur = $_POST['id_visiteur'];
    $DAOVisiter->refuserDemande($idAppartement, $idVisiteur);
    include "$racine/vue/vueConfirmationRefuserDemande.php";
    
}





