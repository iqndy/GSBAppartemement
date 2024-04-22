<?php

include_once 'bd.inc.php';
include_once 'bd.locataire.php';

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

    public function addLocataire($idvisiteur, $nom, $prenom, $tel, $login, $mdp, $rib, $telBanque, $dateNaiss, $id_coordonnee){
        try {
            $req = $this->conn->prepare("INSERT INTO locataires (`id_locataire`,`nom`, `prenom`, `tel`, `login`, `mdp`, `rib`, `tel_Banque`, `dateNaiss`, `id_coordonnee`) VALUES (:idvisiteur, :nom, :prenom, :tel, :login, :mdp, :rib, :telBanque, :dateNaiss, :id_coordonnee)");

            $req->bindValue(':id_locataire', $idvisiteur, PDO::PARAM_INT);
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $req->bindValue(':tel', $tel, PDO::PARAM_STR);
            $req->bindValue(':login', $login, PDO::PARAM_STR);
            $req->bindValue(':mdp', $mdp, PDO::PARAM_STR);
            $req->bindValue(':rib', $rib, PDO::PARAM_INT);
            $req->bindValue(':tel_Banque', $telBanque, PDO::PARAM_STR);
            $req->bindValue(':dateNaiss', $dateNaiss, PDO::PARAM_STR);
            $req->bindValue(':id_coordonnee', $id_coordonnee, PDO::PARAM_INT);
            $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            PRINT "erreur de qdazdazd";
            die();
        }
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

    public function getLocataireById($idLocataire)
    {
        try {
            $req = $this->conn->prepare("SELECT * FROM Locataires WHERE id = :idLocataire");
            $req->bindValue(':ID_LOCATAIRE', $idLocataire, PDO::PARAM_INT);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
            // var_dump($resultat); // Affiche le tableau complet récupéré depuis la base de données
          // Vérifier si la requête a retourné un résultat
          if ($req->rowCount() > 0) {
            $resultat = $req->fetch(PDO::FETCH_ASSOC);

            // Créer l'objet Proprietaire en utilisant les valeurs de l'enregistrement
            $locataire = new Locataire(
                $resultat['ID_LOCATAIRE'],
                $resultat['NOM'],
                $resultat['PRENOM'],
                $resultat['TEL'],
                $resultat['LOGIN'],
                $resultat['MDP'],
                $resultat['RIB'],
                $resultat['TELBANQUE'],
                $resultat['DATENAISS'],
                $resultat['ID_COORDONNEE'],
            );

            return $locataire;
        } else {
            return null; // Aucun résultat trouvé
        }
    } catch (Exception $ex) {
        print "Erreur !: " . $ex->getMessage();
        die();
    }
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

