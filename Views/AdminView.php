<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MEGAPRODUCTION</title>
        <link rel="icon" type="image/png" href="img/logo_small.png" />

        <!-- Insertion fichiers CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            /* Remove the navbar's default margin-bottom and rounded borders */ 
            .navbar {
                margin-bottom: 0;
                border-radius: 0;
            }

            /* Add a gray background color and some padding to the footer */
            footer {
                background-color: #f2f2f2;
                padding: 25px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Liste des offres</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom de l'offre</th>
                        <th>Nombre de visiteurs</th>
                        <th>Nombre de visiteurs authentifiés</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listOffers as $offer) { ?>
                        <tr>
                            <td><?php echo $offer['Intitule']; ?></td>
                            <td><?php echo $offer['NbVisiteur']; ?></td>
                            <td><?php echo $offer['NbVisiteurAuthentifie']; ?></td>
                            <td><?php echo intval($offer['NbVisiteurAuthentifie']) + intval($offer['NbVisiteur']); ?></td>
                        </tr>
                        <?php
                        $totalVisiteur += intval($offer['NbVisiteur']);
                        $totalVisiteurAuth += intval($offer['NbVisiteurAuthentifie']);
                    } ?>

                    <tr class="success">
                        <td>Total</td>
                        <td><?php echo $totalVisiteur; ?></td>
                        <td><?php echo $totalVisiteurAuth; ?></td>
                        <td><?php echo $totalVisiteur + $totalVisiteurAuth; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="container">
            <h2>Liste des utilisateurs</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nom de l'utilisateur</th>
                        <th>Nombre de connexions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($listUsers as $user) { ?>
                        <tr>
                            <td><?php echo $user['Name']; ?></td>
                            <td><?php echo $user['NbConnexion']; ?></td>
                        </tr>
                        <?php
                        $totalConnexion += intval($user['NbConnexion']);
                    } ?>

                    <tr class="success">
                        <td>Total</td>
                        <td><?php echo $totalConnexion; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Insertion fichiers JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>