<?php
include "./getRacine.php";
include "$racine/modele/DAO.appartement.php";
include "$racine/modele/DAO.coordonnee.php";

$DAOappartement = new DAOAppartement();
$DAOcoordonnee = new DAOCoordonnee();

$coordonnees = $DAOcoordonnee->getCoordonnee();

session_start();

$ajout = false;

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['action']) && $_GET['action'] == 'AjoutAppartement') {
    // Récupérez les autres champs du formulaire
    $TYPEAPPART = $_POST["typeappart"];
    $PRIX_LOC = $_POST["prix_loc"];
    $PRIX_CHARGE = $_POST["prix_charge"];
    $ETAGE = $_POST["etage"];
    $ID_COORDONNEE = $_POST["coordonnee"];
    $ID_PROPRIETAIRE = $_SESSION["id_Proprietaire"];

    // Vérifiez si l'option "Ascenseur" est cochée
    $ASCENSEUR = isset($_POST["ascenseur"]) ? $_POST["ascenseur"] : 0;

    // Vérifiez si l'option "Parking" est cochée
    $PARKING = isset($_POST["parking"]) ? $_POST["parking"] : 0;

    // Vérifiez si un fichier a été téléchargé
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Récupérez les informations sur le fichier téléchargé
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
    
        // Déterminez le chemin où vous souhaitez enregistrer l'image
        $imageDestination = "./picture/" . $imageName;
    
        // Déplacez le fichier téléchargé vers l'emplacement souhaité sur le serveur
        if (move_uploaded_file($imageTmpName, $imageDestination)) {
            // Ajoutez le chemin de l'image à votre base de données si le déplacement est réussi
            $IMAGE = $imageDestination;
        } else {
            // Gestion de l'erreur si le déplacement du fichier a échoué
            echo "Erreur lors de l'enregistrement de l'image.";
        }
    } else {
        // Si aucun fichier n'a été téléchargé, attribuez une valeur par défaut au chemin de l'image
        $IMAGE = null; // Remplacez par le chemin de votre image par défaut
    }
    
    // Appelez votre méthode pour ajouter l'appartement en incluant $ASCENSEUR, $PARKING et $IMAGE
    $ret = $DAOappartement->ajouterAppartement($TYPEAPPART, $PRIX_LOC, $PRIX_CHARGE, $ETAGE, $PARKING, $ASCENSEUR, $IMAGE, $ID_COORDONNEE, $ID_PROPRIETAIRE);
 
    if ($ret) {
        $ajout = true;
    } else {
        echo "L'ajout n'a pas été fait";
    }
}

if ($ajout) {
    include "$racine/vue/vueConfirmationAjoutAppart.php";
} else {
    include "$racine/vue/vueAjoutAppartement.php";
}
?>
