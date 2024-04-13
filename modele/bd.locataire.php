<?php
include_once "bd.personne.php";
class Locataire extends Personne{
    private $rib;
    private $dateNaissance;
    private $telBanque;
public function __construct($numPersonne, $nom, $prenom, $id_coordonnee, $tel, $login, $mdp, $rib, $dateNaissance, $telBanque){
    parent::__construct($numPersonne, $nom, $prenom, $id_coordonnee, $tel, $login, $mdp);
    $this->rib = $rib;
    $this->dateNaissance = $dateNaissance;
    $this->telBanque = $telBanque;
}
public function getRib(){
    return $this->rib;

    
}
public function getDateNaissance(){
    return $this->dateNaissance;
}

public function getTelBanque(){
    return $this->telBanque;
}

public function setRib($rib){
    $this->rib = $rib;
}

public function setDateNaissance($dateNaissance){
    $this->dateNaissance = $dateNaissance;
}

public function setTelBanque($telBanque){
    $this->telBanque = $telBanque;
}
}