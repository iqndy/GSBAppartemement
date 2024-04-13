<?php



include "getRacine.php";
include "$racine\controleur\ControleurPrincipal.php"; // Vérifiez le nom du fichier

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "defaut";
}

$controleur = new ControleurPrincipal(); // Créez une instance du contrôleur
$fichier = $controleur->executerAction($action); // Appelez la méthode avec l'instance
include "$racine\controleur\\$fichier";