<?php
include "./getRacine.php";
include "$racine/modele/DAO.appartement.php";
include "$racine/modele/DAO.coordonnee.php";
include "$racine/modele/DAO.proprietaire.php";

$DAOappartement = new DAOAppartement();
$DAOcoordonnee = new DAOCoordonnee();
$DAOproprietaire = new DAOProprietaire();

$coordonnees = $DAOcoordonnee->getCoordonnee();

session_start();
if (isset($_POST['id_appartement'])) {
        $id_appartement = $_POST['id_appartement'];
    $appartDetails = $DAOappartement->getAppartementById($id_appartement);

    $modif = false;
    if ($appartDetails[0]) {
        // Pré-remplissez les champs du formulaire avec les détails de l'appartement
        $idappart = $appartDetails[0]->getId();
        $typeappart = $appartDetails[0]->getType();
        $prix_loc = $appartDetails[0]->getPrixLocation();
        $prix_charge = $appartDetails[0]->getPrixCharges();
        $etage = $appartDetails[0]->getEtage();
        $parking = $appartDetails[0]->getParking();
        $ascenseur = $appartDetails[0]->getAscenseur();
        if ($ascenseur == 1) {
            $ascenseur = "checked";
        }
        if ($parking == 1) {
            $parking = "checked";
        }
        $id_coordonnee = $appartDetails[0]->getIdCoordonnee();
        $image = $appartDetails[0]->getImage();
        $idprop = $appartDetails[0]->getIdProprietaire();
        $idproprio = $DAOproprietaire->getProprietaireById($idprop);
        $nomprop = $idproprio->getNom();
        $prenomprop= $idproprio->getPrenom();
        $telprop= $idproprio->getTel();
      


        // Répétez pour d'autres champs de formulaire
    } else {
        print("pas id appart");
    }
}
include "$racine/vue/vueDetailsAppartement.php";
