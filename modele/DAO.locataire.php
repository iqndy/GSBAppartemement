<?php

include_once 'bd.inc.php';

class DAOLocataire
{

    private $conn;

    public function __construct()
    {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }

    public function getLocataires()
    {
        $resultat = array();

        try {

            $req = $this->conn->prepare("select * from Locataires");
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getMdp()
    {
        $resultat = array();

        try {

            $req = $this->conn->prepare("select MDP from Locataires");
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function addLocataire($nom, $login, $prenom, $adresse, $cp, $ville, $dateEmbauche, $MotDePasse, $mail)
    {

        try {
            $req = $this->conn->prepare("INSERT INTO visiteur (`nom`, `login`, `prenom`, `adresse`, `cp`, `ville`, `dateEmbauche`, `MotDePasse`, `mail`) VALUES (:nom, :login, :prenom, :adresse, :cp, :ville, :dateEmbauche, :MotDePasse, :mail)");

            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':login', $login, PDO::PARAM_STR); // Correction ici
            $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $req->bindValue(':mail', $mail, PDO::PARAM_STR);
            $hashedPassword = password_hash($MotDePasse, PASSWORD_DEFAULT); // Hashage du mot de passe
            $req->bindValue(':MotDePasse', $hashedPassword, PDO::PARAM_STR);
            $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
            $req->bindValue(':cp', $cp, PDO::PARAM_STR);
            $req->bindValue(':ville', $ville, PDO::PARAM_STR);
            $req->bindValue(':dateEmbauche', $dateEmbauche, PDO::PARAM_STR);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getLocataireBylogin($login)
    {
        try {
            $req = $this->conn->prepare("SELECT * FROM Locataires WHERE login = :login");
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

    public function getLocataireMdp($login)
    {
        try {
            $req = $this->conn->prepare("SELECT MDP FROM Locataires WHERE login = :login");
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


    public function isLoginExists($login)
    {
        try {
            $req = $this->conn->prepare("SELECT COUNT(*) FROM Locataires WHERE login = :login");
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
            $stmt = $this->conn->prepare("SELECT * FROM LOCATAIRES WHERE LOGIN = :login");
            $stmt->bindParam(':login', $login);
            $stmt->execute();
            $locataire = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
            $password= md5($password);
            // Vérifier si l'utilisateur existe et si le mot de passe correspond
            if ($locataire && $password === $locataire['MDP']) {
                return $locataire;
            } else {
                // Mot de passe incorrect ou utilisateur non trouvé
                return false;
            }
        }
        
    }

