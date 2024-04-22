<?php
include "./getRacine.php";
include "$racine/modele/DAO.appartement.php";
include "$racine/modele/DAO.visiteur.php";
include "$racine/modele/DAO.locataire.php";
include "$racine/modele/DAO.occuper.php";

$locataireAdded = false;

if (isset($_GET['id_appartement']) && isset($_GET['id_visiteur'])) {
    $id_appartement = intval($_GET['id_appartement']);
    $id_visiteur = intval($_GET['id_visiteur']);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['action']) && $_GET['action'] == 'LouerAppartement') {
    // Validation des données POST
    if (
        isset($_POST['id_appartement']) &&
        isset($_POST['id_visiteur']) &&
        isset($_POST['MotDePasse']) &&
        isset($_POST['rib']) &&
        isset($_POST['dateNaissance']) &&
        isset($_POST['telBanque']) &&
        isset($_POST['datePreavis'])
    ) {
        // Récupération des données POST
        $id_appartement = intval($_POST['id_appartement']);
        $id_visiteur = intval($_POST['id_visiteur']);
        $mdp = $_POST['MotDePasse'];
        $rib = $_POST['rib'];
        $dateNaissance = $_POST['dateNaissance'];
        $telBanque = $_POST['telBanque'];
        $datePreavis = $_POST['datePreavis'];

        // Accès aux données via les DAO
        $DAOAppartement = new DAOAppartement();
        $DAOVisiteur = new DAOVisiteur();
        $DAOLocataire = new DAOLocataire();

        $visiteur = $DAOVisiteur->getVisiteurById($id_visiteur);
        var_dump($_POST);

        // Ajout du locataire
        $locataireAdded = $DAOLocataire->addLocataire(
            $visiteur->getNumPersonne(),
            $visiteur->getNom(),
            $visiteur->getPrenom(),
            $visiteur->getTel(),
            $visiteur->getLogin(),
            $mdp,
            $rib,
            $telBanque,
            $dateNaissance,
            $visiteur->getId_coordonnee()
        );

        if ($locataireAdded) {
            // Attribuer la location de l'appartement au locataire
            $DAOOccuper = new DAOOccuper();
            $locataire = $DAOLocataire->getLocataireById($id_visiteur);
            $DAOOccuper->louerAppartement($id_appartement, $locataire);
        } else {
            // Gestion de l'erreur si l'ajout du locataire échoue
            echo "Une erreur s'est produite lors de l'ajout du locataire.";
        }
    } else {
        // Afficher un message d'erreur si des données sont manquantes dans $_POST
        echo "Des données nécessaires sont manquantes.";
    }

    // Inclusion de la vue appropriée en fonction du résultat de l'ajout du locataire
    
}


if ($locataireAdded) {
    include "$racine/vue/vueConfirmationLouerAppartement.php";
} else {
    include "$racine/vue/vueLouerAppartement.php";
}
?>
