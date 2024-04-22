<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Louer Appartement</title>
</head>

<h1>Demande Location</h1>

<a href="./?action=logout" class="btn">Déconnexion</a>
<a href="./?action=LesAppartements" class="btn">Les appartements</a>
<a href="./?action=MesVisitesVisit" class="btn">Mes visites</a>
<a href="./?action=MesDemandesVisit" class="btn">Mes demandes</a>


<form action="./?action=LouerAppartement" method="post">
<input type="hidden" name="id_appartement" value="<?= $id_appartement ?>">
    <input type="hidden" name="id_visiteur" value="<?= $id_visiteur ?>">
    <label for="rib">RIB</label>
    <input type="text" name="rib" id="rib" required>
    <label for="telBanque">Tel Banque</label>&nbsp;
    <input type="tel" name="telBanque" id="telBanque" pattern="[0-9]{10}" required>
    <label for="dateNaissance">Date de naissance</label>
    <input type="date" name="dateNaissance" id="dateNaissance" required>
    <label for="datePreavis">Date de préavis</label>
    <input type="date" name="datePreavis" id="datePreavis" required>
    <label for="MotDePasse">Mot de passe&nbsp;:</label>
    <input type="password" id="MotDePasse" name="MotDePasse" required>
    <label for="ConfirmerMotDePasse">Confirmer le mot de passe&nbsp;:</label>
    <input type="password" id="ConfirmerMotDePasse" name="ConfirmerMotDePasse" required>
    <input type="checkbox" onclick="togglePasswordVisibility()">Afficher le mot de passe &nbsp;
    <input type="submit" value="Valider" class="btn">
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