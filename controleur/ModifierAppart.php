<?php
include "./getRacine.php";
include "$racine/modele/DAO.appartement.php";
include "$racine/modele/DAO.coordonnee.php";

$DAOappartement = new DAOAppartement();
$DAOcoordonnee = new DAOCoordonnee();

$coordonnees = $DAOcoordonnee->getCoordonnee();

session_start();
if (isset($_GET['id_appartement'])) {
    $id_appartement = $_GET['id_appartement'];
    $appartModif = $DAOappartement->getAppartementById($id_appartement);
    $modif = false;
    if ($appartModif[0]) {
        // Pré-remplissez les champs du formulaire avec les détails de l'appartement
        $idappart = $appartModif[0]->getId();
        $typeappart = $appartModif[0]->getType();
        $prix_loc = $appartModif[0]->getPrixLocation();
        $prix_charge = $appartModif[0]->getPrixCharges();
        $etage = $appartModif[0]->getEtage();
        $parking = $appartModif[0]->getParking();
        $ascenseur = $appartModif[0]->getAscenseur();
        if ($ascenseur == 1) {
            $ascenseur = "checked";
        }
        if ($parking == 1) {
            $parking = "checked";
        }
        $id_coordonnee = $appartModif[0]->getIdCoordonnee();
        $image = $appartModif[0]->getImage();
        // Répétez pour d'autres champs de formulaire
    } else {
        print("pas id appart");
    }
}






if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['action']) && $_GET['action'] == 'ModifierAppart') {
    // Récupérez les autres champs du formulaire
    $id_appartement = $_POST['id_appartement'];
    $TYPEAPPART = $_POST["typeappart"];
    $PRIX_LOC = $_POST["prix_loc"];
    $PRIX_CHARGE = $_POST["prix_charge"];
    $ETAGE = $_POST["etage"];
    $ID_COORDONNEE = $_POST["coordonnee"];
    $ID_PROPRIETAIRE = $_SESSION["id_Proprietaire"];
    $ASCENSEUR = isset($_POST["ascenseur"]) ? $_POST["ascenseur"] : 0;
    $PARKING = isset($_POST["parking"]) ? $_POST["parking"] : 0;
 

    // Vérifiez si un fichier a été téléchargé
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Récupérez les informations sur le fichier téléchargé
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageName = $_FILES['image']['name'];
        // Déplacez le fichier téléchargé vers l'emplacement souhaité sur le serveur
        $imageDestination = "./picture/" . $imageName;
        move_uploaded_file($imageTmpName, $imageDestination);

        // modifez le chemin de l'image à votre base de données
        $IMAGE = $imageDestination;
    } else {
        // Si aucun fichier n'a été téléchargé, attribuez une valeur par défaut au chemin de l'image
        $IMAGE = $image; // Remplacez par le chemin de votre image par défaut
    }

    // Appelez votre méthode pour modifer l'appartement en incluant $ASCENSEUR, $PARKING et $IMAGE
    $ret = $DAOappartement->modifierAppartement($id_appartement, $TYPEAPPART, $PRIX_LOC, $PRIX_CHARGE, $ETAGE, $PARKING, $ASCENSEUR, $IMAGE, $ID_COORDONNEE, $ID_PROPRIETAIRE);

    if ($ret) {
        $modif = true;
    } else {
        echo "L'modif n'a pas été fait";
    }
}

if ($modif) {
    include "$racine/vue/vueConfirmationModifierAppart.php";
} else {
    include "$racine/vue/vueModifierAppart.php";
}
