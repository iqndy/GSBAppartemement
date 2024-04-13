<?php
// crééer moi la classe de propriétaire qui est une personne
include_once "bd.personne.php";
class Proprietaire extends Personne
{
 

    public function __construct($numPersonne, $nom, $prenom, $id_coordonnee, $tel, $login, $mdp)
    {
        parent::__construct($numPersonne, $nom, $prenom, $id_coordonnee, $tel, $login, $mdp);
      
    }

}