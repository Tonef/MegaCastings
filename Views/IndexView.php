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
                        <li class="active"><a href="index.php">Accueil</a></li>
                        <li><a href="listoffers.php">Toutes les offres</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-triangle-right"></span> Devenir partenaire de diffusion</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="jumbotron">
            <div class="container text-center">
                <div class="col-md-offset-4 col-md-4">
                    <img src="img/logo_large.png" class="img-responsive" style="width:100%;" alt="Logo" />
                </div>
            </div>
        </div>

        <div class="col-md-5 well">
            <h2>A propos de MegaProduction</h2>
            <p style="text-indent: 50px;text-align: justify;">MegaProduction est une société de production créée en janvier 2003. Cette production officie dans plusieurs domaines culturels : le spectacle vivant, le secteur de l’image et celui de la musique. MegaProduction a su s’entourer de personnes qualifiées dans chacun de ces domaines qui aujourd’hui encore sont des partenaires proches.</p>
            <p style="text-indent: 50px;text-align: justify;">MegaCastings se veut être un point de rencontre entre professionnels à la recherche de nouveaux talents et artistes désireux de faire leur entrée dans le monde du spectacle.</p>
        </div>

        <div class="col-md-7">
            <div class="container-fluid bg-3 text-center">    
                <h3>Dernières offres publiées...</h3><br>
                <div class="row">
                    <?php foreach ($lastOffers as $offer) { ?>
                    <a href="detailOffer.php?id=<?php echo $offer["Identifiant"]; ?>" style="text-decoration: none;color: black;">
                        <div class="col-sm-4 col-xs-6">
                            <p><?php echo $offer["Intitule"]; ?></p>
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
                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <!-- Insertion fichiers JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>