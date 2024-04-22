<?php

include "./getRacine.php";
include "$racine/modele/DAO.Visiter.php";

$DAOVisiter = new DAOVisiter();
session_start();


if ($_GET['action'] === 'RefuserVisite') {
    $idAppartement = $_POST['id_appartement'];
    $idVisiteur = $_POST['id_visiteur'];
    $DAOVisiter->refuserVisiter($idAppartement, $idVisiteur);
    include "$racine/vue/vueConfirmationRefuserVisite.php";
    
}


