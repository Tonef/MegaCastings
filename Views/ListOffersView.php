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

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>                        
                    </button>
                    <a class="navbar-brand" href="index.php"><img src="img/logo_medium.png" class="img-responsive" style="width:100%" alt="Logo Small"/></a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Accueil</a></li>
                        <li class="active"><a href="listoffers.php">Toutes les offres</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Inscription</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <ul class="list-group col-md-offset-2 col-md-8 col-sm-offset-0 col-sm-12">
            <?php foreach ($listOffers as $offer) { ?>
            <a href="detailOffer.php?id=<?php echo $offer["Identifiant"]; ?>" style="text-decoration: none;color: black;">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-xs-3">
                            <?php
                            $file = "./img/logo_client/logo" . $offer["Identifiant"];
                            if (file_exists($file)) {
                            ?>
                                <img src="<?php echo $file; ?>" class="img-responsive" style="width:100%" alt="Image">
                            <?php }
                            else {
                            ?>
                                <img src="http://placehold.it/150x80?text=<?php echo $offer["Intitule"]; ?>" class="img-responsive" style="width:100%" alt="Image">
                            <?php } ?>
                        </div>
                        <div class="col-xs-9">
                            <div class="col-sm-12" style="border-bottom: 1px solid;">
                                <?php echo $offer["Intitule"]; ?>
                            </div>
                            <div class="col-sm-12">
                                <?php echo getAnnonceurById($dataBase, $offer["IdentifiantAnnonceur"])["Libelle"]; ?>
                            </div>
                            <div class="col-sm-12">
                                <?php echo getDomaineById($dataBase, $offer["IdentifiantDomaine"])["Label"]; ?>
                            </div>
                            <div class="col-sm-12">
                                <?php echo getMetierById($dataBase, $offer["IdentifiantMetier"])["Label"]; ?>
                            </div>
                        </div>
                    </div>
                </li>
            </a>
            <?php } ?>
        </ul>

        <!-- Insertion fichiers JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>