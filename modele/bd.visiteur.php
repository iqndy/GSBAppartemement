<?php
include_once "bd.personne.php";
class Visiteur extends Personne
{

    public function __construct($numPersonne, $nom, $prenom, $id_coordonnee, $tel, $login, $mdp)
    {
        parent::__construct($numPersonne, $nom, $prenom, $id_coordonnee, $tel, $login, $mdp);
    }

    
}