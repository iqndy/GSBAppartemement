<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Visite Visiteur</title>
</head>

<body>
    <header>
        <h1>Mes Visites </h1>
    </header>
    <nav>
        <a href="./?action=logout" class="btn">Déconnexion</a>
        <a href="./?action=LesAppartements" class="btn">Les appartements</a>
        <a href="./?action=MesVisitesVisit" class="btn">Mes visites</a>
        <a href="./?action=MesDemandesVisit" class="btn">Mes demandes</a>
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
    if (empty($visite->getStatut_location())) {
        $visiteur = $DAOVisiteur->getVisiteurById($visite->getId_Visiteur());
?>
        <tr>
            <td><?= $DAOAppartement->getTypeAppartementById($visite->getId_appart()) ?></td>
            <td><?= $visite->getDate_visite() ?></td>
            <td><?= $visiteur['NOM'] . ' ' . $visiteur['PRENOM'] ?></td>
            <td><?= $visite->getStatut() ?></td>
            <td>
                <?php if ($visite->getStatut() === 'Acceptée') : ?>
                    <!-- Formulaire pour accepter la location -->
                    <form action="./?action=DemandeLoc" method="POST" style="display: inline;">
                        <input type="hidden" name="id_appartement" value="<?= $visite->getId_appart() ?>">
                        <input type="hidden" name="id_visiteur" value="<?= $visite->getId_visiteur() ?>">
                        <input type="submit" value="Faire une demande" class="btn">
                    </form>
                <?php endif; ?>
                <?php if ($visite->getStatut() === 'Refusée') : ?>
                    <!-- Mettre à jour le statut de location à "Refusée" -->
                    <?php $DAOVisiter->updateStatutLocation($visite->getId_Visiteur(), 'Refusée'); ?>
                <?php endif; ?>
            </td>
        </tr>
<?php
    }
}
?>




        <footer>
            <!-- Pied de page -->
        </footer>