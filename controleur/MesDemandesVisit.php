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




include "$racine/vue/vueMesDemandesVisit.php";