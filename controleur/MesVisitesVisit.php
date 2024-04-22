<?php
include "./getRacine.php";
include "$racine/modele/DAO.visiter.php";
include "$racine/modele/DAO.appartement.php";
include "$racine/modele/DAO.visiteur.php"; 


$DAOVisiter= new DAOVisiter();
$DAOVisiteur= new DAOVisiteur();
$DAOAppartement= new DAOAppartement();
session_start();



$visites=$DAOVisiter->getVisiterByIdVisit($_SESSION["id_Visiteur"]);


// Pour AccepterVisite
if ($_GET['action'] === 'AccepterVisite') {
    $idAppartement = $_POST['id_appartement'];
    $idVisiteur = $_POST['id_visiteur'];
    $DAOVisiter->accepterVisiter($idAppartement, $idVisiteur);
    include "$racine/vue/vueConfirmationAccepterVisite.php";
}

// Pour RefuserVisite
if ($_GET['action'] === 'RefuserVisite') {
    $idAppartement = $_POST['id_appartement'];
    $idVisiteur = $_POST['id_visiteur'];
    $DAOVisiter->refuserVisiter($idAppartement, $idVisiteur);
    // Rediriger ou faire d'autres traitements après le refus
}

include "$racine/vue/vueMesVisitesVisit.php";