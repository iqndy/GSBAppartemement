<?php

include_once 'bd.inc.php';
include_once 'bd.Proprietaire.php';
class DAOProprietaire
{

    private $conn;

    public function __construct()
    {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }

    public function getProprietaires()
    {
        $resultat = array();

        try {

            $req = $this->conn->prepare("select * from Proprietaire");
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

            $req = $this->conn->prepare("select MDP from Proprietaire");
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
// Méthode pour ajouter un propriétaire
public function addProprietaire($nom, $prenom, $coordonnee, $tel, $login, $MotDePasse) {
    try {
        $req = $this->conn->prepare("INSERT INTO proprietaires (NOM, PRENOM, ID_COORDONNEE, TEL, LOGIN, MDP) VALUES (:nom, :prenom, :coordonnee, :tel, :login, :mdp)");
        $req->bindParam(':nom', $nom);
        $req->bindParam(':prenom', $prenom);
        $req->bindParam(':coordonnee', $coordonnee);
        $req->bindParam(':tel', $tel);
        $req->bindParam(':login', $login);
        $req->bindParam(':mdp', $MotDePasse);
        $req->execute();
        
        // Récupérer l'ID du propriétaire ajouté
        $lastInsertId = $this->conn->lastInsertId();
        
        // Retourner l'ID du propriétaire ajouté
        return $lastInsertId;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
        return false; // En cas d'erreur, retourner false
    }
}


    public function getProprietaireBylogin($login)
    {
        try {
            $req = $this->conn->prepare("SELECT * FROM Proprietaires WHERE login = :login");
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

    public function getProprietaireMdp($login)
    {
        try {
            $req = $this->conn->prepare("SELECT MDP FROM Proprietaires WHERE login = :login");
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
            $req = $this->conn->prepare("SELECT COUNT(*) FROM Proprietaires WHERE login = :login");
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
            $stmt = $this->conn->prepare("SELECT * FROM PROPRIETAIRES WHERE LOGIN = :login");
            $stmt->bindParam(':login', $login);
            $stmt->execute();
            $proprietaire = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
        $password=md5($password);
        if ($proprietaire && $password === $proprietaire['MDP'])  {
            return $proprietaire;
        } else {
            
            return false;
        }
    }

public function getProprietaireById($id)
{
    try {
        $req = $this->conn->prepare("SELECT * FROM Proprietaires WHERE ID_PROPRIETAIRE = :id");
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();

        // Vérifier si la requête a retourné un résultat
        if ($req->rowCount() > 0) {
            $resultat = $req->fetch(PDO::FETCH_ASSOC);

            // Créer l'objet Proprietaire en utilisant les valeurs de l'enregistrement
            $proprietaire = new Proprietaire(
                $resultat['ID_PROPRIETAIRE'],
                $resultat['NOM'],
                $resultat['PRENOM'],
                $resultat['ID_COORDONNEE'],
                $resultat['TEL'],
                $resultat['LOGIN'],
                $resultat['MDP']
            );

            return $proprietaire;
        } else {
            return null; // Aucun résultat trouvé
        }
    } catch (Exception $ex) {
        print "Erreur !: " . $ex->getMessage();
        die();
    }
}

}
