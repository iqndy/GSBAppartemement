<?php
include_once 'bd.inc.php';
include_once 'bd.visiter.php';
class DAOVisiter{
    private $conn;
    public function __construct(){
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }
    public function getVisiter(){
        $resultat = array();
        try {
            $req = $this->conn->prepare("select * from Visiter");
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    public function getVisiterById($idAppartement, $idVisiteur){
        $resultat = array();
        try {
            $req = $this->conn->prepare("select * from Visiter where ID_APPART = :idAppartement AND ID_VISITEUR = :idVisiteur");
            $req->bindParam(':idAppartement', $idAppartement);
            $req->bindParam(':idVisiteur', $idVisiteur);
            $req->execute();
            $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public function getVisiterByIdProp($idProprietaire){
       
        try {
            $req = $this->conn->prepare("select * from Visiter where ID_APPART IN (select ID_APPART from Appartements where ID_PROPRIETAIRE = :idProprietaire)");
            $req->bindParam(':idProprietaire', $idProprietaire);
            $req->execute();
            $visiteData = $req->fetchAll(PDO::FETCH_ASSOC);
            $visites=array();


            foreach ($visiteData as $visite) {
                $visite = new Visiter(
                    $visite['ID_VISITEUR'],
                    $visite['ID_APPART'],
                    $visite['DATE_VISITE'],
                    $visite['STATUT_VISITE'],
                    $visite['STATUT_LOCATION'],
                );
                $visites[] = $visite;
            }
    
            return $visites; // Retournez le tableau complet à l'extérieur de la boucle
        } catch (PDOException $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
    }
    public function getVisiterByIdVisit($idVisiteur){
       
        try {
            $req = $this->conn->prepare("select * from Visiter where ID_VISITEUR = :idVisiteur");
            $req->bindParam(':idVisiteur', $idVisiteur);
            $req->execute();
            $visiteData = $req->fetchAll(PDO::FETCH_ASSOC);
            $visites=array();


            foreach ($visiteData as $visite) {
                $visite = new Visiter(
                    $visite['ID_VISITEUR'],
                    $visite['ID_APPART'],
                    $visite['DATE_VISITE'],
                    $visite['STATUT_VISITE'],
                    $visite['STATUT_LOCATION'],
                );
                $visites[] = $visite;
            }
    
            return $visites; // Retournez le tableau complet à l'extérieur de la boucle
        } catch (PDOException $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
    }

    public function getDemandeLocation($idVisiteur){
        try {
            $req = $this->conn->prepare("select * from Visiter where ID_VISITEUR = :idVisiteur AND STATUT_LOCATION = 'En attente'");
            $req->bindParam(':idVisiteur', $idVisiteur);
            $req->execute();
            $visiteData = $req->fetchAll(PDO::FETCH_ASSOC);
            $visites=array();   

            foreach ($visiteData as $visite) {
                $visite = new Visiter(
                    $visite['ID_VISITEUR'],
                    $visite['ID_APPART'],
                    $visite['DATE_VISITE'],
                    $visite['STATUT_VISITE'],
                    $visite['STATUT_LOCATION'],
                );
                $visites[] = $visite;
            }
    
            return $visites; // Retournez le tableau complet à l'extérieur de la boucle
        } catch (PDOException $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
    }

    public function getDemandeLocationParProprietaire($idProprietaire){
        try {
            // Récupérer les ID des appartements appartenant au propriétaire
            $reqAppart = $this->conn->prepare("SELECT ID_APPART FROM Appartements WHERE ID_PROPRIETAIRE = :idProprietaire");
            $reqAppart->bindParam(':idProprietaire', $idProprietaire);
            $reqAppart->execute();
            $idAppartements = $reqAppart->fetchAll(PDO::FETCH_COLUMN);
    
            // Construire la requête pour récupérer les visites correspondantes
            $idAppartementsStr = implode(',', $idAppartements); // Convertir les ID en une chaîne séparée par des virgules
            $req = $this->conn->prepare("SELECT * FROM Visiter WHERE ID_APPART IN ($idAppartementsStr) AND STATUT_LOCATION = 'En attente'");
            $req->execute();
            $visiteData = $req->fetchAll(PDO::FETCH_ASSOC);
            $visites = array();   
    
            foreach ($visiteData as $visite) {
                $visite = new Visiter(
                    $visite['ID_VISITEUR'],
                    $visite['ID_APPART'],
                    $visite['DATE_VISITE'],
                    $visite['STATUT_VISITE'],
                    $visite['STATUT_LOCATION']
                );
                $visites[] = $visite;
            }
    
            return $visites; // Retourner le tableau complet à l'extérieur de la boucle
        } catch (PDOException $ex) {
            print "Erreur !: " . $ex->getMessage();
            die();
        }
    }
    
    public function addVisiter($idAppartement, $idVisiteur, $dateVisite, $heureVisite) {
        try {
            // Créer une instance DateTime à partir de la date et de l'heure de visite
            $datetimeVisite = new DateTime($dateVisite . ' ' . $heureVisite);
            // Formater la date et l'heure dans le format requis par MySQL
            $datetimeVisiteFormatted = $datetimeVisite->format('Y-m-d H:i:s');
    
            // Préparer la requête SQL en utilisant la date et l'heure formatées
            $req = $this->conn->prepare("INSERT INTO visiter (ID_APPART, ID_VISITEUR, DATE_VISITE) VALUES (:idAppartement, :idVisiteur, :dateVisite)");
            // Binder les paramètres avec les valeurs formatées
            $req->bindParam(':idAppartement', $idAppartement);
            $req->bindParam(':idVisiteur', $idVisiteur);
            $req->bindParam(':dateVisite', $datetimeVisiteFormatted);
            // Exécuter la requête SQL
            $resultat = $req->execute();
        } catch (PDOException $e) {
            // Gérer les exceptions PDO
            print "Erreur !: " . $e->getMessage();
            die();
        }
        // Retourner le résultat de l'exécution de la requête
        return $resultat;
    }
    
    
    public function deleteVisiter($idAppartement, $idVisiteur){
        try {
            $req = $this->conn->prepare("DELETE FROM visiter WHERE ID_APPART = :idAppartement AND ID_VISITEUR = :idVisiteur");
            $req->bindParam(':idAppartement', $idAppartement);
            $req->bindParam(':idVisiteur', $idVisiteur);
            $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function accepterVisiter($idAppartement, $idVisiteur){
        try {
            $req = $this->conn->prepare("UPDATE visiter SET STATUT_VISITE = 'Acceptée' WHERE ID_APPART = :idAppartement AND ID_VISITEUR = :idVisiteur");
            $req->bindParam(':idAppartement', $idAppartement);
            $req->bindParam(':idVisiteur', $idVisiteur);
            $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function accepterDemande($idAppartement, $idVisiteur){
        try {
            $req = $this->conn->prepare("UPDATE visiter SET STATUT_LOCATION = 'Acceptée' WHERE ID_APPART = :idAppartement AND ID_VISITEUR = :idVisiteur");
            $req->bindParam(':idAppartement', $idAppartement);
            $req->bindParam(':idVisiteur', $idVisiteur);
            $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function refuserVisiter($idAppartement, $idVisiteur){
        try {
            $req = $this->conn->prepare("UPDATE visiter SET STATUT_VISITE = 'Refusée' WHERE ID_APPART = :idAppartement AND ID_VISITEUR = :idVisiteur");
            $req->bindParam(':idAppartement', $idAppartement);
            $req->bindParam(':idVisiteur', $idVisiteur);
            $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function refuserDemande($idAppartement, $idVisiteur){
        try {
            $req = $this->conn->prepare("UPDATE visiter SET STATUT_LOCATION = 'Refusée' WHERE ID_APPART = :idAppartement AND ID_VISITEUR = :idVisiteur");
            $req->bindParam(':idAppartement', $idAppartement);
            $req->bindParam(':idVisiteur', $idVisiteur);
            $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    public function updateStatutLocationAttente($idAppartement, $idVisiteur) {
        try {
            $req = $this->conn->prepare("UPDATE visiter SET STATUT_LOCATION = 'En attente' WHERE ID_APPART = :idAppartement AND ID_VISITEUR = :idVisiteur");
            $req->bindParam(':idAppartement', $idAppartement);
            $req->bindParam(':idVisiteur', $idVisiteur);
            $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }
    
}


?>
