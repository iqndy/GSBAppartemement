<?php
include_once "bd.appartement.php";
include_once 'bd.inc.php';
class DAOAppartement
{
    private $conn;

    public function __construct()
    {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }
    public function getAppartementByIdProp($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM APPARTEMENTS WHERE ID_PROPRIETAIRE = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $appartementData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $appartements = array(); // Initialisez le tableau des appartements ici
    
            foreach ($appartementData as $appartement) {
                $appart = new Appartement(
                    $appartement['ID_APPART'],
                    $appartement['TYPEAPPART'],
                    $appartement['PRIX_LOC'],
                    $appartement['PRIX_CHARGE'],
                    $appartement['ETAGE'],
                    $appartement['PARKING'],
                    $appartement['ASCENSEUR'],
                    $appartement['IMAGE'],
                    $appartement['ID_COORDONNEE'],
                    $appartement['ID_PROPRIETAIRE']
                );
                $appartements[] = $appart;
            }
    
            return $appartements; // Retournez le tableau complet à l'extérieur de la boucle
        } catch (PDOException $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
    }

    public function getTypeAppartementById($idAppartement) {
        try {
            $req = $this->conn->prepare("SELECT TYPEAPPART FROM APPARTEMENTS WHERE ID_APPART = :idAppartement");
            $req->bindParam(':idAppartement', $idAppartement);
            $req->execute();
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
            return $resultat['TYPEAPPART'];
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    

    public function getAppartementById($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM APPARTEMENTS WHERE ID_APPART = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $appartementData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $appartements = array(); // Initialisez le tableau des appartements ici
    
            foreach ($appartementData as $appartement) {
                $appart = new Appartement(
                    $appartement['ID_APPART'],
                    $appartement['TYPEAPPART'],
                    $appartement['PRIX_LOC'],
                    $appartement['PRIX_CHARGE'],
                    $appartement['ETAGE'],
                    $appartement['PARKING'],
                    $appartement['ASCENSEUR'],
                    $appartement['IMAGE'],
                    $appartement['ID_COORDONNEE'],
                    $appartement['ID_PROPRIETAIRE']
                );
                $appartements[] = $appart;
            }
    
            return $appartements; // Retournez le tableau complet à l'extérieur de la boucle
        } catch (PDOException $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
    }


    public function getAppartement()
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM APPARTEMENTS");
            $stmt->execute();
            $appartementData = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $appartements = array(); // Initialisez le tableau des appartements ici
    
            foreach ($appartementData as $appartement) {
                $appart = new Appartement(
                    $appartement['ID_APPART'],
                    $appartement['TYPEAPPART'],
                    $appartement['PRIX_LOC'],
                    $appartement['PRIX_CHARGE'],
                    $appartement['ETAGE'],
                    $appartement['PARKING'],
                    $appartement['ASCENSEUR'],
                    $appartement['IMAGE'],
                    $appartement['ID_COORDONNEE'],
                    $appartement['ID_PROPRIETAIRE']
                );
                $appartements[] = $appart;
            }
    
            return $appartements; // Retournez le tableau complet à l'extérieur de la boucle
        } catch (PDOException $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
    }
    
    

    public function ajouterAppartement($TYPEAPPART,$PRIX_LOC,$PRIX_CHARGE,$ETAGE,$PARKING,$ASCENSEUR,$IMAGE,$ID_COORDONNEE,$ID_PROPRIETAIRE){
        try {
            $req = $this->conn->prepare("INSERT INTO appartements ( `TYPEAPPART`, `PRIX_LOC`, `PRIX_CHARGE`, `ETAGE`, `PARKING`, `ASCENSEUR`,`IMAGE`, `ID_COORDONNEE`, `ID_PROPRIETAIRE`) VALUES (:TYPEAPPART, :PRIX_LOC, :PRIX_CHARGE, :ETAGE, :PARKING, :ASCENSEUR, :IMAGE, :ID_COORDONNEE, :ID_PROPRIETAIRE)");

            $req->bindValue(':TYPEAPPART', $TYPEAPPART, PDO::PARAM_STR);
            $req->bindValue(':PRIX_LOC', $PRIX_LOC, PDO::PARAM_INT); // Correction ici
            $req->bindValue(':PRIX_CHARGE', $PRIX_CHARGE, PDO::PARAM_INT);
            $req->bindValue(':ETAGE', $ETAGE, PDO::PARAM_INT);
            $req->bindValue(':PARKING', $PARKING, PDO::PARAM_BOOL);
            $req->bindValue(':ASCENSEUR', $ASCENSEUR, PDO::PARAM_BOOL);
            $req->bindValue(':IMAGE', $IMAGE, PDO::PARAM_STR);
            $req->bindValue(':ID_COORDONNEE', $ID_COORDONNEE, PDO::PARAM_INT);
            $req->bindValue(':ID_PROPRIETAIRE', $ID_PROPRIETAIRE, PDO::PARAM_INT);

            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function modifierAppartement($ID_APPART, $TYPEAPPART, $PRIX_LOC, $PRIX_CHARGE, $ETAGE, $PARKING, $ASCENSEUR, $IMAGE, $ID_COORDONNEE, $ID_PROPRIETAIRE)
{
    try {
        $req = $this->conn->prepare("UPDATE appartements SET `TYPEAPPART` = :TYPEAPPART, `PRIX_LOC` = :PRIX_LOC, `PRIX_CHARGE` = :PRIX_CHARGE, `ETAGE` = :ETAGE, `PARKING` = :PARKING, `ASCENSEUR` = :ASCENSEUR, `IMAGE` = :IMAGE, `ID_COORDONNEE` = :ID_COORDONNEE, `ID_PROPRIETAIRE` = :ID_PROPRIETAIRE WHERE `ID_APPART` = :ID_APPART");

        $req->bindValue(':ID_APPART', $ID_APPART, PDO::PARAM_INT); // Correction ici
        $req->bindValue(':TYPEAPPART', $TYPEAPPART, PDO::PARAM_STR);
        $req->bindValue(':PRIX_LOC', $PRIX_LOC, PDO::PARAM_INT);
        $req->bindValue(':PRIX_CHARGE', $PRIX_CHARGE, PDO::PARAM_INT);
        $req->bindValue(':ETAGE', $ETAGE, PDO::PARAM_INT);
        $req->bindValue(':PARKING', $PARKING, PDO::PARAM_BOOL);
        $req->bindValue(':ASCENSEUR', $ASCENSEUR, PDO::PARAM_BOOL);
        $req->bindValue(':IMAGE', $IMAGE, PDO::PARAM_STR);
        $req->bindValue(':ID_COORDONNEE', $ID_COORDONNEE, PDO::PARAM_INT);
        $req->bindValue(':ID_PROPRIETAIRE', $ID_PROPRIETAIRE, PDO::PARAM_INT);

        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


public function supprimerAppartement($id_appartement) {
    try {
        // Préparez la requête SQL pour supprimer l'appartement avec l'ID spécifié
        $req = $this->conn->prepare("DELETE FROM appartements WHERE id_appart = :id_appart");
        
        // Liez la valeur de l'ID de l'appartement à la requête préparée
        $req->bindParam(':id_appart', $id_appartement, PDO::PARAM_INT);
        
        // Exécutez la requête
        $resultat = $req->execute();
        
        // Retournez le résultat (true si la suppression a réussi, sinon false)
        return $resultat;
    } catch (PDOException $e) {
        // Gérez les erreurs éventuelles
        echo "Erreur lors de la suppression de l'appartement : " . $e->getMessage();
        return false; // Indiquez que la suppression a échoué
    }
}


}
