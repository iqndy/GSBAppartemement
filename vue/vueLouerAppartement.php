<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Louer Appartement</title>
</head>

<h1>Demande Location</h1>

<a href="./?action=ProfilVisiteur" class="btn">Profil</a>
<a href="./?action=LesAppartements" class="btn">Les apprtements</a>


<form action="./?action=VueLouerAppartement" method="post">
    <label for="rib">RIB</label>
    <input type="text" name="rib" id="rib" required>
    <label for="dateNaissance">Date de naissance</label>
    <input type="date" name="dateNaissance" id="dateNaissance" required>
    <input type="submit" value="Valider">
