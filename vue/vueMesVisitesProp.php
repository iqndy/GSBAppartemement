<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Visite Propriétaire</title>
</head>
<body>
    <header>
        <h1>Visite Propriétaire</h1>
    </header>
    <nav>
    <a href="./?action=logout" class="btn">Déconnexion</a>
        <a href="./?action=MesAppartements" class="btn">Mes appartements</a>
        <a href="./?action=MesVisitesProp" class="btn">Mes visites</a>
        <a href="./?action=MesDemandesProp" class="btn">Mes demandes</a>
    </nav>

    <table>
        <tr>
            <th>Appartement</th>
            <th>Date</th>
            <th>Visiteur</th>
            <th>Statut</th>
         

        </tr>
        <?php
foreach ($visites as $visite) {
    $visiteur = $DAOVisiteur->getVisiteurById($visite->getId_Visiteur());
    ?>
    <tr>
        <td><?= $DAOAppartement->getTypeAppartementById($visite->getId_appart()) ?></td>
        <td><?= $visite->getDate_visite() ?></td>
        <td><?= $visiteur['NOM'] . ' ' . $visiteur['PRENOM'] ?></td>
        <td><?= $visite->getStatut() ?></td>
     
        <td>
            <!-- Formulaire pour accepter la visite -->
            <form action="./?action=AccepterVisite" method="POST" style="display: inline;">
                <input type="hidden" name="id_appartement" value="<?= $visite->getId_appart() ?>">
                <input type="hidden" name="id_visiteur" value="<?= $visite->getId_visiteur() ?>">
                <input type="submit" value="Accepter" class="btn">
            </form>
        </td>
        <td>
            <!-- Formulaire pour refuser la visite -->
            <form action="./?action=RefuserVisite" method="POST" style="display: inline;">
                <input type="hidden" name="id_appartement" value="<?= $visite->getId_appart() ?>">
                <input type="hidden" name="id_visiteur" value="<?= $visite->getId_visiteur() ?>">
                <input type="submit" value="Refuser" class="btn">
            </form>
        </td>
    </tr>
    <?php
}
?>

  
    <footer>
        <!-- Pied de page -->
    </footer>