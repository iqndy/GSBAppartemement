<?php
include_once "bd.coordonnee.php";
include_once 'bd.inc.php';
class DAOCoordonnee
{
    private $conn;

    public function __construct()
    {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }

    public function getCoordonnee()
    {
        try {
            $coordonnees = array();
    
            $req = $this->conn->prepare("SELECT * FROM COORDONNEES");
            $req->execute();
            $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
    
            // Parcourir chaque ligne de résultat
            foreach ($resultats as $coord) {
                // Créer un nouvel objet Coordonnee avec les données récupérées de la base de données
                $coordonnee = new Coordonnee(
                    $coord['ID_COORDONNEE'],
                    $coord['ADRESSE'],
                    $coord['CP'],
                    $coord['VILLE']
                );
    
                // Ajouter l'objet Coordonnee à notre tableau de coordonnees
                $coordonnees[] = $coordonnee;
            }
    
            return $coordonnees;
        } catch (PDOException $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
    }

    public function getCoordonneeById($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM COORDONNEES WHERE ID_COORDONNEE = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $coordData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $coordonnees = array(); // Initialisez le tableau des coordonnees ici
    
            foreach ($coordData as $coord) {
                $coordonnee = new Coordonnee(
                    $coord['ID_COORDONNEE'],
                    $coord['ADRESSE'],
                    $coord['CP'],
                    $coord['VILLE']
                );
                $coordonnees[] = $coordonnee;
            }
    
            return $coordonnees; // Retournez le tableau complet à l'extérieur de la boucle
        } catch (PDOException $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
    }
}