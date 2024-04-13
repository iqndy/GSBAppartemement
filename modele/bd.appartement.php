<?php
class Appartement {
    private $id;
    private $type;
    private $prixLocation;
    private $prixCharges;
    private $etage;
    private $parking;
    private $ascenseur;
    private $image;
    private $idCoordonnee;
    private $idProprietaire;

    public function __construct($id, $type, $prixLocation, $prixCharges, $etage, $parking, $ascenseur,$image, $idCoordonnee, $idProprietaire) {
        $this->id = $id;
        $this->type = $type;
        $this->prixLocation = $prixLocation;
        $this->prixCharges = $prixCharges;
        $this->etage = $etage;
        $this->parking = $parking;
        $this->ascenseur = $ascenseur;
        $this->image = $image;
        $this->idCoordonnee = $idCoordonnee;
        $this->idProprietaire = $idProprietaire;
    }

    // Getter et setter pour l'identifiant
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter et setter pour le type
    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    // Getter et setter pour le prix de location
    public function getPrixLocation() {
        return $this->prixLocation;
    }

    public function setPrixLocation($prixLocation) {
        $this->prixLocation = $prixLocation;
    }

    // Getter et setter pour le prix des charges
    public function getPrixCharges() {
        return $this->prixCharges;
    }

    public function setPrixCharges($prixCharges) {
        $this->prixCharges = $prixCharges;
    }

    // Getter et setter pour l'étage
    public function getEtage() {
        return $this->etage;
    }

    public function setEtage($etage) {
        $this->etage = $etage;
    }

    // Getter et setter pour le parking
    public function getParking() {
        return $this->parking;
    }

    public function setParking($parking) {
        $this->parking = $parking;
    }

    // Getter et setter pour l'ascenseur
    public function getAscenseur() {
        return $this->ascenseur;
    }

    public function setAscenseur($ascenseur) {
        $this->ascenseur = $ascenseur;
    }

       // Getter et setter pour le type
       public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->type = $image;
    }
    // Getter et setter pour l'identifiant de la coordonnée
    public function getIdCoordonnee() {
        return $this->idCoordonnee;
    }

    public function setIdCoordonnee($idCoordonnee) {
        $this->idCoordonnee = $idCoordonnee;
    }

    // Getter et setter pour l'identifiant du propriétaire
    public function getIdProprietaire() {
        return $this->idProprietaire;
    }

    public function setIdProprietaire($idProprietaire) {
        $this->idProprietaire = $idProprietaire;
    }
}

