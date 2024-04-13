<?php

include_once "./getRacine.php";
include_once "$racine/modele/DAO.visiteur.php";
include_once "$racine/modele/DAO.proprietaire.php";
include_once "$racine/modele/DAO.coordonnee.php";

$DAOCoordonnee = new DAOCoordonnee();
$coordonnees = $DAOCoordonnee->getCoordonnee();

$inscrit = false;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_REQUEST['action']) && $_REQUEST['action'] == 'Inscription') {
    // Vérification si l'action est Inscription à partir des données POST
    if ($_REQUEST['action'] == 'Inscription') {
        // Récupération des données du formulaire
        $login = $_POST["login"];
        $prenom = $_POST["prenom"];
        $nom = $_POST["nom"];
        $MotDePasse = $_POST["MotDePasse"];
        $coordonnee = $_POST["coordonnee"];
        $statut = $_POST["statut"];
        $tel = $_POST["tel"];
    }
    
    $DAOVisiteur = new DAOVisiteur();
    $DAOProprietaire = new DAOProprietaire();
    
    // Vérification du statut et ajout du visiteur ou du propriétaire
    if ($statut == "visiteur") {
        $inscrit = $DAOVisiteur->addVisiteur($nom, $prenom, $coordonnee, $tel, $login, $MotDePasse);
    } else {
        $inscrit = $DAOProprietaire->addProprietaire($nom, $prenom, $coordonnee, $tel, $login, $MotDePasse);
    }
}

if ($inscrit) {
    include "$racine/vue/vueConfirmationInscription.php";
} else {
    include "$racine/vue/vueInscription.php";
}
?>
