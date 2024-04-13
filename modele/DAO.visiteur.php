<?php

include_once 'bd.inc.php';

class DAOVisiteur {

    private $conn;

    public function __construct() {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }

    public function getVisiteurs() {
        $resultat = array();

        try {

            $req = $this->conn->prepare("select * from Visiteur");
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getMdp() {
        $resultat = array();

        try {

            $req = $this->conn->prepare("select MDP from Visiteur");
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function addVisiteur($nom, $prenom, $coordonnee, $tel, $login, $MotDePasse) {
        try {
            $req = $this->conn->prepare("INSERT INTO visiteurs (NOM, PRENOM, ID_COORDONNEE, TEL, LOGIN, MDP) VALUES (:nom, :prenom, :coordonnee, :tel, :login, :mdp)");
            $req->bindParam(':nom', $nom);
            $req->bindParam(':prenom', $prenom);
            $req->bindParam(':coordonnee', $coordonnee);
            $req->bindParam(':tel', $tel);
            $req->bindParam(':login', $login);
            $req->bindParam(':mdp', $MotDePasse);
            $req->execute();
            
            // Récupérer l'ID du visiteur ajouté
            $lastInsertId = $this->conn->lastInsertId();
            var_dump($lastInsertId); // Affiche l'ID du visiteur ajouté
            // Retourner l'ID du visiteur ajouté
            return $lastInsertId;
        } catch (PDOException $e) {
            echo "Erreur: " . $e->getMessage();
            return false; // En cas d'erreur, retourner false
        }
    }
    public function getVisiteurBylogin($login) {
        try {
            $req = $this->conn->prepare("SELECT * FROM Visiteur WHERE login = :login");
            $req->bindValue(':login', $login, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
           // var_dump($resultat); // Affiche le tableau complet récupéré depuis la base de données
        } catch (Exception $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
        return $resultat;
    }

    public function getVisiteurMdp($login) {
        try {
            $req = $this->conn->prepare("SELECT MDP FROM Visiteur WHERE login = :login");
            $req->bindValue(':login', $login, PDO::PARAM_STR);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
// Après la récupération du mot de passe
        } catch (Exception $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
        return $resultat;
    }


    public function isLoginExists($login) {
        try {
            $req = $this->conn->prepare("SELECT COUNT(*) FROM Visiteur WHERE login = :login");
            $req->bindValue(':login', $login, PDO::PARAM_STR);
            $req->execute();
            $count = $req->fetchColumn();
            return $count > 0;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }


    function checkLogin($login, $password)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM VISITEURS WHERE LOGIN = :login");
            $stmt->bindParam(':login', $login);
            $stmt->execute();
            $visiteur = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
        $password=md5($password);
        if ($visiteur && $password === $visiteur['MDP']) {
            
            return $visiteur;
        } else {
        
            return false;
        }
    }
    
}
