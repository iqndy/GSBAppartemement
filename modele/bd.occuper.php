<?php
class Occuper {
    private $ID_APPART;
    private $ID_LOCATAIRE;
    private $DATE_SIGNATURE_CONTRAT;
    private $DATE_PREAVIS;

    // Constructeur
    public function __construct($ID_APPART, $ID_LOCATAIRE, $DATE_SIGNATURE_CONTRAT, $DATE_PREAVIS) {
        $this->ID_APPART = $ID_APPART;
        $this->ID_LOCATAIRE = $ID_LOCATAIRE;
        $this->DATE_SIGNATURE_CONTRAT = $DATE_SIGNATURE_CONTRAT;
        $this->DATE_PREAVIS = $DATE_PREAVIS;
    }

    // Getters et setters
    public function getID_APPART() {
        return $this->ID_APPART;
    }

    public function setID_APPART($ID_APPART) {
        $this->ID_APPART = $ID_APPART;
    }

    public function getID_LOCATAIRE() {
        return $this->ID_LOCATAIRE;
    }

    public function setID_LOCATAIRE($ID_LOCATAIRE) {
        $this->ID_LOCATAIRE = $ID_LOCATAIRE;
    }

    public function getDATE_SIGNATURE_CONTRAT() {
        return $this->DATE_SIGNATURE_CONTRAT;
    }

    public function setDATE_SIGNATURE_CONTRAT($DATE_SIGNATURE_CONTRAT) {
        $this->DATE_SIGNATURE_CONTRAT = $DATE_SIGNATURE_CONTRAT;
    }

    public function getDATE_PREAVIS() {
        return $this->DATE_PREAVIS;
    }

    public function setDATE_PREAVIS($DATE_PREAVIS) {
        $this->DATE_PREAVIS = $DATE_PREAVIS;
    }
}