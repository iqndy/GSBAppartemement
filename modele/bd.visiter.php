<?php
class visiter{
    private $id_Visiteur;
    private $id_appart;
    private $date_visite;
    private $statut;
    private $statut_location;

    public function __construct($id_Visiteur, $id_appart, $date_visite, $statut, $statut_location){
        $this->id_Visiteur = $id_Visiteur;
        $this->id_appart = $id_appart;
        $this->date_visite = $date_visite;
        $this->statut = $statut;
        $this->statut_location = $statut_location;
    }

    public function getId_Visiteur(){
        return $this->id_Visiteur;
    }

    public function getId_appart(){
        return $this->id_appart;
    }   

    public function getDate_visite(){
        return $this->date_visite;
    }   

    public function getStatut(){
        return $this->statut;
    }   

    public function getStatut_location(){
        return $this->statut_location;
    }   

    public function setId_Visiteur($id_Visiteur){
        $this->id_Visiteur = $id_Visiteur;
    }   

    public function setId_appart($id_appart){
        $this->id_appart = $id_appart;
    }   

    public function setDate_visite($date_visite){
        $this->date_visite = $date_visite;
    }   

    public function setStatut($statut){
        $this->statut = $statut;
    }   

    public function setStatut_location($statut_location){
        $this->statut_location = $statut_location;
    }   


}