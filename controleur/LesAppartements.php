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



$appartements=$DAOAppartement->getAppartement();
include "$racine/vue/vueLesAppartements.php";