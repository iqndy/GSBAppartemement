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
        <h1>Demande de location </h1>
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
            <th>Statut de la demande</th>
            <th>Etat</th>


        </tr>
        <?php
        foreach ($visites as $visite) {
            $visiteur = $DAOVisiteur->getVisiteurById($visite->getId_Visiteur());

            // Vérifier si le statut de location n'est pas vide ou null
            if (!empty($visite->getStatut_location())) {
        ?>
                <tr>
                    <td><?= $DAOAppartement->getTypeAppartementById($visite->getId_appart()) ?></td>
                    <td><?= $visite->getDate_visite() ?></td>
                    <td><?= $visiteur->getNom() . ' ' . $visiteur->getPrenom() ?></td>
                    <td><?= $visite->getStatut_location() ?></td>
                    <td>
                        <?php if ($visite->getStatut_location() === 'Acceptée') : ?>
                            <!-- Formulaire pour accepter la location -->
                

                            <form action="./" method="GET" style="display: inline;">
    <input type="hidden" name="action" value="LouerAppartement">
    <input type="hidden" name="id_appartement" value="<?= $visite->getId_appart() ?>">
    <input type="hidden" name="id_visiteur" value="<?= $visite->getId_visiteur() ?>">
    <input type="submit" value="louer" class="btn">
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