<?php

class Client extends Personne {
    // Constructeur
    public function __construct($numPersonne, $nom, $prenom, $adresse, $codeVille, $tel, $login, $mdp, $role) {
        // Appel du constructeur de la classe parente (Personne)
        parent::__construct($numPersonne, $nom, $prenom, $adresse, $codeVille, $tel, $login, $mdp, $role);
    }

    // Méthodes spécifiques à la classe Client (à définir selon tes besoins)
    // ...

    
}

