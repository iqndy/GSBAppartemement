<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>Modifier appartement</h1>


    <form action="./?action=ModifierAppart&id_appartement=<?= $id_appartement ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <!-- Ajoutez un champ caché pour l'ID de l'appartement -->
    <input type="hidden" name="id_appartement" value="<?= $id_appartement ?>">
    <ul>
        <li>
            <label for="typeappart">Type appartement&nbsp;:</label>
            <input type="text" id="typeappart" name="typeappart" value="<?= $typeappart ?>" required>
        </li>
        <li>
            <label for="prix_loc">Prix location&nbsp;:</label>
            <input type="text" id="prix_loc" name="prix_loc" value="<?= $prix_loc ?>" required>
        </li>
        <li>
            <label for="prix_charge">Prix charge&nbsp;:</label>
            <input type="text" id="prix_charge" name="prix_charge" value="<?= $prix_charge ?>" required>
        </li>
        <li>
            <label for="etage">Etage&nbsp;:</label>
            <input type="number" id="etage" name="etage" value="<?= $etage ?>" required>
        </li>
        <li>
            <div class="checkbox-container">
                <input type="checkbox" id="ascenseur" name="ascenseur"<?= $ascenseur ?> class="checkbox-input">
                <label for="ascenseur" class="checkbox-label">Ascenseur</label>
            </div>
        </li>
        <li>
            <div class="checkbox-container">
                <input type="checkbox" id="parking" name="parking" <?= $parking ?> class="checkbox-input">
                <label for="parking" class="checkbox-label">Parking</label>
            </div>
        </li>
        <li>
        <label for="id_coordonnee">Coordonnée&nbsp;:</label>
<select type="text" id="coordonnee" name="coordonnee" required>
    <option value="">Sélectionnez une coordonnée...</option> <!-- Option vide -->
    <?php
    foreach ($coordonnees as $coordonee) {
        // Vérifiez si l'ID de la coordonnée correspond à l'ID de la coordonnée de l'appartement
        $selected = ($coordonee->getIdCoordonnee() == $id_coordonnee) ? 'selected' : '';
        // Ajoutez l'attribut selected à l'option si nécessaire
        echo '<option value="' . $coordonee->getIdCoordonnee() . '" ' . $selected . '>' . $coordonee->getAdresse() . ' ' . $coordonee->getCodePostal() . ' ' . $coordonee->getVille() . '</option>';
    }
    ?>
</select>
        </li>
        <li>
    <label for="image">Sélectionnez une image :</label>
    <?php if (!empty($image)) : ?>
        <img src="<?= $image ?>" alt="Image préchargée" style="max-width: 200px; max-height: 200px;">
    <?php endif; ?>
    <input type="file" id="image" name="image" accept="image/*" value="<?= $image ?>">
</li>


    </ul>
    <input type="submit" value="Modifier" class="btn">
</form>





</body>

</html>