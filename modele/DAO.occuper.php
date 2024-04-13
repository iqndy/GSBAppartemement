<?php
include_once "bd.occuper.php";
include_once 'bd.inc.php';
class DAOOccuper
{
    private $conn;

    public function __construct()
    {
        $pdo = new Database();
        $this->conn = $pdo->getConnexion();
    }



//getOccuper
public function getOccuper()
{
    $resultat = array();

    try {

        $req = $this->conn->prepare("select * from occuper");
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

//getOccuperById
public function getOccuperById($id)
{
    $resultat = array();

    try {

        $req = $this->conn->prepare("select * from occuper where ID_LOCATAIRE = :id");
        $req->bindParam(':id', $id);
        $req->execute();

        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;

}


public function addOccuper($id_locataire, $id_appart)
{

    try {
        $req = $this->conn->prepare("INSERT INTO occuper (`ID_LOCATAIRE`, `ID_APPART`) VALUES (:id_locataire, :id_appart)");

        $req->bindValue(':id_locataire', $id_locataire, PDO::PARAM_INT);
        $req->bindValue(':id_appart', $id_appart, PDO::PARAM_INT);

        $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
}
?>

