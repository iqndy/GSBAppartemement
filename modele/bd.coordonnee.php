<?php
class Coordonnee {
    private $idCoordonnee;
    private $adresse;
    private $codePostal;
    private $ville;

    public function __construct($idCoordonnee, $adresse, $codePostal, $ville) {
        $this->idCoordonnee = $idCoordonnee;
        $this->adresse = $adresse;
        $this->codePostal = $codePostal;
        $this->ville = $ville;
    }

    // Accesseurs
    public function getIdCoordonnee() {
        return $this->idCoordonnee;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function getVille() {
        return $this->ville;
    }

    public function setIdCoordonnee($idCoordonnee) {
        $this->idCoordonnee = $idCoordonnee;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }
}
