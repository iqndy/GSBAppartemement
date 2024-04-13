<?php
include "./getRacine.php";
include "$racine/modele/bd.Authentification.php";
include "$racine/modele/DAO.Appartement.php";
include "$racine/modele/DAO.Coordonnee.php";

$Auth= new Authentification();
$DAOAppartement= new DAOAppartement();
$DAOCoordonnee= new DAOCoordonnee();
session_start();

if(!$Auth->isLoggedOn()){
    header("Location: ./?action=defaut");
    exit();
}



$appartements=$DAOAppartement->getAppartementByIdProp($_SESSION["id_Proprietaire"]);
include "$racine/vue/vueMesAppartements.php";