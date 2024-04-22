<?php

include "./getRacine.php";
include_once "$racine/vue/vueConnexion.php";
include_once "$racine/modele/DAO.locataire.php";
include_once "$racine/modele/DAO.proprietaire.php";
include_once "$racine/modele/DAO.visiteur.php";

$DAOLocataire = new DAOLocataire();
$DAOProprietaire = new DAOProprietaire();
$DAOVisiteur = new DAOVisiteur();

session_start();    

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['action']) && $_GET['action'] == 'Connexion') {
    $login = $_POST["login"];
    $MotDePasse = $_POST["MotDePasse"];

    if ($DAOProprietaire->checkLogin($login, $MotDePasse)) {
        $Proprietaire = $DAOProprietaire->checkLogin($login, $MotDePasse);
        $_SESSION["id_Proprietaire"] = $Proprietaire["ID_PROPRIETAIRE"];
        $_SESSION["Nom_Proprietaire"] = $Proprietaire["NOM"];
        $_SESSION["Prenom_Proprietaire"] = $Proprietaire["PRENOM"];
        $_SESSION["Tel_Proprietaire"] = $Proprietaire["TEL"];
        $_SESSION["Login_Proprietaire"] = $Proprietaire["LOGIN"];
        $_SESSION["Coordonnee_Propritaire"] = $Proprietaire["ID_COORDONNEE"];

        header("Location: ./?action=ProfilProprietaire");
        exit();
    } elseif ($DAOLocataire->checkLogin($login, $MotDePasse)) {
        $Locataire = $DAOLocataire->checkLogin($login, $MotDePasse);
        $_SESSION["id_Locataire"] = $Locataire["ID_LOCATAIRE"];
        $_SESSION["Nom_Locataire"] = $Locataire["NOM"];
        $_SESSION["Prenom_Locataire"] = $Locataire["PRENOM"];
        $_SESSION["Tel_Locataire"] = $Locataire["TEL"];
        $_SESSION["Login_Locataire"] = $Locataire["LOGIN"];
        $_SESSION["Rib_Locataire"] = $Locataire["RIB"];
        $_SESSION["Tel_Banque_Locataire"] = $Locataire["TEL_BANQUE"];
        $_SESSION["Date_Naiss_Locataire"] = $Locataire["DATENAISS"];
        $_SESSION["Coordonnee_Locataire"] = $Locataire["ID_COORDONNEE"];
        header("Location: ./?action=ProfilLocataire");
        exit();
    } elseif ($DAOVisiteur->checkLogin($login, $MotDePasse)) {
        $Visiteur = $DAOVisiteur->checkLogin($login, $MotDePasse);
        var_dump($Visiteur);
        $_SESSION["id_Visiteur"] = $Visiteur["ID_VISITEUR"];
        $_SESSION["Nom_Visiteur"] = $Visiteur["NOM"];
        $_SESSION["Prenom_Visiteur"] = $Visiteur["PRENOM"];
        $_SESSION["Tel_Visiteur"] = $Visiteur["TEL"];
        $_SESSION["Login_Visiteur"] = $Visiteur["LOGIN"];
        $_SESSION["Coordonnee_Visiteur"] = $Visiteur["ID_COORDONNEE"];
        header("Location: ./?action=ProfilVisiteur");

        exit();
    } else {
        // Aucun utilisateur trouvé, afficher un message d'erreur
        print "Mot de passe ou login incorrect ";
    }
}
