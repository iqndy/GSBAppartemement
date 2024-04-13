<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Details Location</title>
    <style>
        /* Nouveau style CSS pour les conteneurs */
        .container {
            background-color: #e85c63;
            color: white;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container h2 {
            margin-top: 0;
        }

        .info {
            margin-bottom: 10px;
        }

        .info label {
            font-weight: bold;
        }

        .info span {
            margin-left: 10px;
        }

        .image-container {
            max-width: 500px; /* Largeur maximale de l'image */
            margin-bottom: 20px; /* Marge inférieure pour l'espacement */
        }

        .image-container img {
            width: 100%; /* Pour que l'image occupe 100% de la largeur du conteneur */
            height: auto; /* Pour conserver les proportions de l'image */
        }
    </style>
</head>
<body>

<h1>Details Location</h1>

<a href="./?action=Accueil" class="btn">Accueil</a>
<a href="./?action=LesAppartements" class="btn">Les Appartements</a>

<?php if (isset($appartDetails) && $appartDetails) : ?>
    <div class="container">
        <h2>Appartement</h2>
        <div class="image-container">
            <?php if ($image) : ?><img src="<?= $image ?>" alt="Image de l'appartement"><?php endif; ?>
        </div>
        <div class="info">
            <label>Type:</label>
            <span><?= $typeappart ?></span>
        </div>
        <div class="info">
            <label>Prix de location:</label>
            <span><?= $prix_loc ?></span>
        </div>
        <div class="info">
            <label>Prix de charges:</label>
            <span><?= $prix_charge ?></span>
        </div>
        <div class="info">
            <label>Étage:</label>
            <span><?= $etage ?></span>
        </div>
        <div class="info">
            <label>Parking:</label>
            <span><?= $parking ? 'Oui' : 'Non' ?></span>
        </div>
        <div class="info">
            <label>Ascenseur:</label>
            <span><?= $ascenseur ? 'Oui' : 'Non' ?></span>
        </div>
    </div>

    <?php if (isset($idproprio) && $idproprio) : ?>
        <div class="container">
            <h2>Propriétaire</h2>
            <div class="info">
                <label>Nom:</label>
                <span><?= $nomprop ?></span>
            </div>
            <div class="info">
                <label>Prénom:</label>
                <span><?= $prenomprop ?></span>
            </div>
            <div class="info">
                <label>Téléphone:</label>
                <span><?= $telprop ?></span>
            </div>
        </div>
    <?php else : ?>
        <p>Aucun détail du propriétaire trouvé</p>
    <?php endif; ?>

<?php endif; ?>

<!-- Formulaire de location -->
<form action="./" method="GET">
    <input type="hidden" name="action" value="LouerAppartement">
    <input type="hidden" name="id_appartement" value="<?= $id_appartement ?>">
    <input type="submit" value="demande" class="btn">
</form>

</body>
</html>
