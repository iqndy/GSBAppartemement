<?php
include "./getRacine.php";
include "$racine/modele/DAO.visiter.php";


session_start();

if (isset($_GET['id_appartement'])) {
    $id_appartement = $_GET['id_appartement'];;
}

$ajout = false;
$DAOVisiter = new DAOVisiter();
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET['action']) && $_GET['action'] == 'VisiterAppartement') {
    // Récupération des valeurs de date et d'heure du formulaire
    $dateVisite = $_POST['dateVisite'];
    $heureVisite = $_POST['heureVisite'];
    $id_appartement = $_POST['id_appartement'];
    $ret= $DAOVisiter->addVisiter($id_appartement, $_SESSION['id_Visiteur'], $dateVisite, $heureVisite);
 
    if ($ret) {
        $ajout = true;
    } else {
        echo "La visite n'a pas pu être ajoutée.";
    }


}
if ($ajout) {
    include "$racine/vue/vueConfirmationAjoutVisite.php";
} else {
    include "$racine/vue/vueVisiterAppartement.php";
    
}