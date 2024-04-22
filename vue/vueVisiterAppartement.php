<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Visiter Appartement</title>
</head>
<body>
    <h1>Visiter Appartement</h1>
    <a href="./?action=ProfilVisiteur" class="btn">Profil</a>
    <a href="./?action=LesAppartements" class="btn">Les appartements</a>

    <form action="./?action=VisiterAppartement" method="post">
        <label for="dateVisite">Date de visite</label>
        <input type="date" name="dateVisite" id="dateVisite" required>
        <label for="heureVisite">Heure de visite</label>
        <input type="time" name="heureVisite" id="heureVisite" required>
        <input type="submit" value="Valider">
        <input type="hidden" name="id_appartement" value="<?= $id_appartement ?>">