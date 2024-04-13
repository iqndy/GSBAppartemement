<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Profil Propriétaire</title>
</head>
<body>
    <header>
        <h1>Profil Propriétaire</h1>
    </header>
    <nav>
        <a href="./?action=logout" class="btn">Déconnexion</a>
        <a href="./?action=MesAppartements" class="btn">Mes appartements</a>
    </nav>
    <div class="info-container">
        <?php
        if (isset($_SESSION["Nom_Proprietaire"]) && isset($_SESSION["Prenom_Proprietaire"])) {
            $nomP = $_SESSION["Nom_Proprietaire"];
            $prenomP = $_SESSION["Prenom_Proprietaire"];
            $telP = $_SESSION["Tel_Proprietaire"];
            $loginP = $_SESSION["Login_Proprietaire"];
            $coordonneeP = $_SESSION["Coordonnee_Propritaire"];
            
            echo "<label>Nom:</label><span>$nomP</span><br>";
            echo "<label>Prénom:</label><span>$prenomP</span><br>";
            echo "<label>Téléphone:</label><span>$telP</span><br>";
            echo "<label>Login:</label><span>$loginP</span><br>";
            echo "<label>Coordonnée:</label><span>$coordonneeP</span><br>";
        }
        ?>
    </div>
    <footer>
        <!-- Pied de page -->
    </footer>
</body>
</html>
