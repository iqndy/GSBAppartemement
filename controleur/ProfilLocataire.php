<?php
include "./getRacine.php";
include "$racine/modele/bd.Authentification.php";

$Auth= new Authentification();
session_start();

if(!$Auth->isLoggedOn()){
    header("Location: ./?action=defaut");
    exit();
}

include "$racine/vue/vueProfilLocataire.php";