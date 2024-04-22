<?php

class ControleurPrincipal {

    private $actions;

    public function __construct() {
        $this->actions = array();
        $this->actions["defaut"] = "Accueil.php";
        $this->actions["Inscription"] = "Inscription.php";
        $this->actions["Connexion"] = "Connexion.php";
        $this->actions["ConfirmationInscription"] = "ConfirmationInscription.php";
        $this->actions["Profil"] = "Profil.php";
        $this->actions["ProfilVisiteur"] = "ProfilVisiteur.php";
        $this->actions["ProfilLocataire"] = "ProfilLocataire.php";
        $this->actions["ProfilProprietaire"] = "ProfilProprietaire.php";
        $this->actions["logout"] = "logout.php";
        $this->actions["MesAppartements"] = "MesAppartements.php";
        $this->actions["AjoutAppartement"] = "AjoutAppartement.php";
        $this->actions["ModifierAppart"] = "ModifierAppart.php";
        $this->actions["SupprimerAppartement"] = "SupprimerAppartement.php";
        $this->actions["LesAppartements"] = "LesAppartements.php";
        $this->actions["LouerAppartement"] = "LouerAppartement.php";
        $this->actions["DetailsAppartement"] = "DetailsAppartement.php";
        $this->actions["VisiterAppartement"] = "VisiterAppartement.php";
        $this->actions["MesVisitesProp"] = "MesVisitesProp.php";
        $this->actions["AccepterVisite"] = "AccepterVisite.php";
        $this->actions["RefuserVisite"] = "RefuserVisite.php";
        $this->actions["MesVisitesVisit"] = "MesVisitesVisit.php";
        $this->actions["DemandeLoc"] = "DemandeLoc.php";
        $this->actions["MesDemandesProp"] = "MesDemandesProp.php";
        $this->actions["MesDemandesVisit"] = "MesDemandesVisit.php";
        $this->actions["AccepterDemande"] = "AccepterDemande.php";
        $this->actions["RefuserDemande"] = "RefuserDemande.php";
        
     
        
        

    }

    public function executerAction($action) {
        if (array_key_exists($action, $this->actions)) {
            return $this->actions[$action];
        } else {
            return $this->actions["defaut"];
        }
    }

}
    