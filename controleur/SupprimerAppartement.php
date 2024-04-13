<?php
session_start();
include "./getRacine.php";
include "$racine/modele/DAO.appartement.php";

$DAOappartement = new DAOAppartement();

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['action']) && $_GET['action'] == 'SupprimerAppartement') {
    // Vérifiez si l'ID de l'appartement à supprimer est défini dans les paramètres de la requête
    if (isset($_GET['id'])) {
        $id_appartement = $_GET['id'];
        // Appelez votre méthode DAO pour supprimer l'appartement en utilisant son ID
        $resultat = $DAOappartement->supprimerAppartement($id_appartement);
        if ($resultat) {
            // Redirigez l'utilisateur vers une autre page après la suppression
            header("Location: ./?action=MesAppartements");
            exit; // Assurez-vous de terminer le script après la redirection
        } else {
            echo "Erreur lors de la suppression de l'appartement.";
        }
    } else {
        echo "ID de l'appartement non spécifié.";
    }
}
?>
