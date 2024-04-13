<?php

include_once 'bd.inc.php';

class Authentification {
   
    private $conn;

    public function __construct()
    {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }



    public function getLoggedOn() {
        return isset($_SESSION["login_utilisateur"]);
    }
    
    

    public function logout() {
        session_start();
        session_destroy(); // Détruit complètement la session
    }

    public function isLoggedOn() {
        // Vérifier si l'utilisateur est connecté en tant que propriétaire
        if (isset($_SESSION["id_Proprietaire"]) && isset($_SESSION["Login_Proprietaire"])) {
            // Ici, vous pouvez également ajouter d'autres conditions de vérification si nécessaire
            return true;
        }
    
        // Vérifier si l'utilisateur est connecté en tant que locataire
        if (isset($_SESSION["id_Locataire"]) && isset($_SESSION["Login_Locataire"])) {
            // Ici, vous pouvez également ajouter d'autres conditions de vérification si nécessaire
            return true;
        }
    
        // Vérifier si l'utilisateur est connecté en tant que visiteur
        if (isset($_SESSION["id_Visiteur"]) && isset($_SESSION["Login_Visiteur"])) {
            // Ici, vous pouvez également ajouter d'autres conditions de vérification si nécessaire
            return true;
        }
    
        return false;
        session_destroy();
    }
    
}

?>
