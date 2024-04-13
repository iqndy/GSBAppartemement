<?php
class Personne {
    private $numPersonne;
    private $nom;
    private $prenom;
    private $id_coordonnee;
    private $tel;
    private $login;
    private $mdp;
 

    // Constructeur
    public function __construct($numPersonne, $nom, $prenom, $id_coordonnee, $tel, $login, $mdp) {
        $this->numPersonne = $numPersonne;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->id_coordonnee = $id_coordonnee;
        $this->tel = $tel;
        $this->login = $login;
        $this->mdp = $mdp;
      
    }

    // Getters
    public function getNumPersonne() {
        return $this->numPersonne;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

public function getId_coordonnee() {
        return $this->id_coordonnee;
    }

    public function getTel() {
        return $this->tel;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getMdp() {
        return $this->mdp;
    }



    // Setters
    public function setNumPersonne($numPersonne) {
        $this->numPersonne = $numPersonne;
    }
    public function setId_coordonnee($id_coordonnee) {
        $this->id_coordonnee = $id_coordonnee;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }


    public function setTel($tel) {
        $this->tel = $tel;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }


}



?>