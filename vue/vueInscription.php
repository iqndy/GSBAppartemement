<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <h1>Inscription</h1>

        Veuillez vous inscrire

        <form method="POST" action="./?action=Inscription" onsubmit="return validateForm()">

            <ul>
            <li>
            <label for="Statut">Statut&nbsp;:</label>
            <select type="text" id="statut" name="statut" required>
                <option value="">Sélectionnez votre statut</option>
                <option value="visiteur">Visiteur</option>
                <option value="proprietaire">Propriétaire</option>
                 <!-- Option vide -->
            </select>
        </li>
                <li>
                    <label for="Prenom">Prenom&nbsp;:</label>
                    <input type="text" id="prenom" name="prenom" required />
                </li>
                <li>
                    <label for="Nom">Nom&nbsp;:</label>
                    <input type="text" id="nom" name="nom" required />
                </li>
                <li>
                    <label for="Login">Login&nbsp;:</label>
                    <input type="text" id="login" name="login" required />
                </li>
                <label for="MotDePasse">Mot de passe&nbsp;:</label>
                <input type="password" id="MotDePasse" name="MotDePasse" required />
            </li>
            <li>
                <label for="ConfirmerMotDePasse">Confirmer le mot de passe&nbsp;:</label>
                <input type="password" id="ConfirmerMotDePasse" name="ConfirmerMotDePasse" required />
            </li>
            <!-- Ajouter une section pour la visibilité du mot de passe -->
            <li class="password-section">
                <input type="checkbox" id="togglePassword" onchange="togglePasswordVisibility()">
                <label for="togglePassword">Afficher le mot de passe</label>
            </li>
            </li>
                <label for="Téléphone">Téléphone&nbsp;:</label>
                <input type="number" id="tel" name="tel" required />
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
            </ul>
            <div class="button">
                <input type="submit"  value='Inscription' class="btn">
            </div>
        </form>

        <script>
            function togglePasswordVisibility() {
                var passwordField = document.getElementById("MotDePasse");
                var confirmPasswordField = document.getElementById("ConfirmerMotDePasse");

                passwordField.type = (passwordField.type === "password") ? "text" : "password";
                confirmPasswordField.type = (confirmPasswordField.type === "password") ? "text" : "password";
            }

            function validateForm() {
                var password = document.getElementById("MotDePasse").value;
                var confirmPassword = document.getElementById("ConfirmerMotDePasse").value;

                if (password !== confirmPassword) {
                    alert("Les mots de passe ne correspondent pas");
                    return false;
                }

                return true;
            }
        </script>
    </body>
</html>
