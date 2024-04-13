<?php
include "./getRacine.php";
include "$racine/modele/bd.Authentification.php";

$deco = new Authentification;

$deco->logout();

header("Location: ./?action=Connexion");
print "vous avez bien été déconnecté";
exit();
