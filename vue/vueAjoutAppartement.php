<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <h1>Ajout appartement</h1>


    <form method="post" action="./?action=AjoutAppartement" enctype="multipart/form-data" onsubmit="return validateForm()">
    <ul>
        <li>
            <label for="typeappart">Type appartement&nbsp;:</label>
            <input type="text" id="typeappart" name="typeappart" required />
        </li>
        <li>
            <label for="prix_loc">Prix location&nbsp;:</label>
            <input type="text" id="prix_loc" name="prix_loc" required />
        </li>
        <li>
            <label for="prix_charge">Prix charge&nbsp;:</label>
            <input type="text" id="prix_charge" name="prix_charge" required />
        </li>
        <li>
            <label for="etage">Etage&nbsp;:</label>
            <input type="number" id="etage" name="etage" required />
        </li>
        <li>
            <div class="checkbox-container">
                <input type="checkbox" id="ascenseur" name="ascenseur" value=1 class="checkbox-input">
                <label for="ascenseur" class="checkbox-label">Ascenseur</label>
            </div>
        </li>
        <li>
            <div class="checkbox-container">
                <input type="checkbox" id="parking" name="parking" value=1 class="checkbox-input">
                <label for="parking" class="checkbox-label">Parking</label>
            </div>
        </li>
        <li>
            <label for="id_coordonnee">Coordonnée&nbsp;:</label>
            <select type="text" id="coordonnee" name="coordonnee" required>
                <option value="">Sélectionnez une coordonnée...</option> <!-- Option vide -->
                <?php
                foreach ($coordonnees as $coordonee) {
                    
                    echo '<option value="' . $coordonee->getIdCoordonnee() . '">' . $coordonee->getAdresse() . ' ' . $coordonee->getCodePostal() . ' ' . $coordonee->getVille() . '</option>';
                }
                ?>
            </select>
        </li>
        <li>
        <label for="image">Sélectionnez une image :</label>
    <input type="file" id="image" name="image" accept="image/*" />
    </li>
    </ul>
    <input type="submit" value="Ajout" class="btn">
</form>





</body>

</html>