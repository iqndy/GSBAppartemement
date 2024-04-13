<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <title>Accueil</title>
</head>

<body>

    <h1>Les locations</h1>
   
    <a href="./?action=ProfilVisiteur" class="btn">Mon Profil</a>

    <br>

    <div class="appartements-container">
        <?php foreach ($appartements as $appartement) : ?>
            <div class="appartement">
                <h2><?= $appartement->getType() ?></h2>

                <?php if (!empty($appartement->getImage())) : ?>
                    <img src="<?= $appartement->getImage() ?>" alt="Image de l'appartement">
                <?php else : ?>
                    <p>Aucune image disponible</p>
                <?php endif; ?>
                <div class="details">

                    <p><strong>Prix de location:</strong> <?= $appartement->getPrixLocation() ?> €</p>
                    <p><strong>Prix de charges:</strong> <?= $appartement->getPrixCharges() ?> €</p>
                    <p><strong>Étage:</strong> <?= $appartement->getEtage() ?></p>
                    <p><strong>Parking:</strong> <?= ($appartement->getParking() ? 'Oui' : 'Non') ?></p>
                    <p><strong>Ascenseur:</strong> <?= ($appartement->getAscenseur() ? 'Oui' : 'Non') ?></p>
                    <?php
                    $coordonnees = $DAOCoordonnee->getCoordonneeById($appartement->getIdCoordonnee());
                    foreach ($coordonnees as $coordonnee) {
                        echo '<p><strong>Rue:</strong> ' . $coordonnee->getAdresse() . '</p>';
                        echo '<p><strong>Ville:</strong> ' . $coordonnee->getVille() . '</p>';
                        echo '<p><strong>Code Postal:</strong> ' . $coordonnee->getCodePostal() . '</p>';
                    }
                    ?>
                    <!-- Ajoutez un bouton "Louer" -->
                    <form action="./?action=DetailsAppartement&id=<?= $appartement->getId() ?>" method="POST">
                        <input type="hidden" name="id_appartement" value="<?= $appartement->getId() ?>">
                        <input type="submit" value="Détails" class="btn">
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>

</html>
