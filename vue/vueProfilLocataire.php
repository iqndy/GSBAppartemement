<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Accueil</title>
</head>

<h1>Profil Locataire</h1>
<a href="./?action=logout" class="btn">Déconnexion </a>

<br>
<div class="info-container">
    <div>
        <label for="nom">Nom :</label>
        <span><?= $_SESSION["Nom_Proprietaire"] ?></span>
    </div>
    <div>
        <label for="prenom">Prénom :</label>
        <span><?= $_SESSION["Prenom_Proprietaire"] ?></span>
    </div>
    <div>
        <label for="tel">Téléphone :</label>
        <span><?= $_SESSION["Tel_Proprietaire"] ?></span>
    </div>
    <div>
        <label for="login">Login :</label>
        <span><?= $_SESSION["Login_Proprietaire"] ?></span>
    </div>
    <div>
        <label for="coordonnee">Coordonnée :</label>
        <span><?= $_SESSION["Coordonnee_Propritaire"] ?></span>
    </div>
</div>

