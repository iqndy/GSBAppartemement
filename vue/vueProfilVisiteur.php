<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Profil Visiteur</title>
</head>
<body>

<h1>Profil Visiteur</h1>
<a href="./?action=logout" class="btn">Déconnexion</a>
<a href="./?action=LesAppartements" class="btn">Les appartements</a>
<br>

<?php
// Vérifier si les variables de session existent
if (isset($_SESSION["Prenom_Visiteur"]) && isset($_SESSION["Nom_Visiteur"])) {
    // Récupérer les valeurs des variables de session
    $prenomV = $_SESSION["Prenom_Visiteur"];
    $nomV = $_SESSION["Nom_Visiteur"];
    $telV = $_SESSION["Tel_Visiteur"];
    $loginV = $_SESSION["Login_Visiteur"];
    $coordonneeV = $_SESSION["Coordonnee_Visiteur"];
    
    // Afficher les informations du visiteur avec leurs labels
    echo '<div class="info-container">';
    echo '<label for="prenom">Prénom :</label> <span id="prenom">' . $prenomV . '</span><br>';
    echo '<label for="nom">Nom :</label> <span id="nom">' . $nomV . '</span><br>';
    echo '<label for="tel">Téléphone :</label> <span id="tel">' . $telV . '</span><br>';
    echo '<label for="login">Login :</label> <span id="login">' . $loginV . '</span><br>';
    echo '<label for="coordonnee">Coordonnée :</label> <span id="coordonnee">' . $coordonneeV . '</span><br>';
    echo '</div>';
} else {
    // Si les variables de session ne sont pas définies, afficher un message d'erreur
    echo '<p>Aucune information de visiteur disponible.</p>';
}
?>

</body>
</html>
