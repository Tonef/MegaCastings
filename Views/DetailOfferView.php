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
                        <li><a href="listoffers.php">Toutes les offres</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#"><span class="glyphicon glyphicon-triangle-right"></span> Devenir partenaire de diffusion</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container well col-md-offset-2 col-md-3" style="margin-top:5px;margin-right:5px;">
            <div class="row">
                <?php
                $file = "./img/logo_client/logo_" . $offer["Identifiant"];
                if (file_exists($file)) {
                    ?>
                    <img src="<?php echo $file; ?>" class="img-responsive" style="width:100%" alt="Image">
                    <?php
                }
                else {
                    ?>
                    <img src="http://placehold.it/1000x1000?text=<?php echo $annonceur["Libelle"]; ?>" class="img-responsive" style="width:100%;padding:10px;" alt="Image">
                <?php } ?>
            </div>
            <div class="col-md-offset-1 col-md-10">
                <div class="row">
                    <?php echo "<strong>" . $annonceur['Libelle'] . "</strong>"; ?>
                </div>
                <div class="row text-muted">
                    <?php echo $annonceur["Siret"]; ?>
                </div>
                <div class="row">
                    <?php echo '<span class="glyphicon glyphicon-earphone"></span> ' . $annonceur['Telephone']; ?>
                </div>
                <div class="row">
                    <?php echo '<span class="glyphicon glyphicon glyphicon-print"></span> ' . $annonceur['FAX']; ?>                
                </div>
                <div class="row">
                    <?php echo '<span class="glyphicon glyphicon-envelope"></span> ' . $annonceur['Email']; ?>
                </div>
                <div class="row">
                    <?php echo '<span class="glyphicon glyphicon-home"></span> ' . $annonceur['Adresse']; ?>
                </div>
                <div class="row">
                    <?php echo '<span class="glyphicon glyphicon-link"></span><a href="' . $annonceur['URL'] . '"target="_blank"> ' . $annonceur['URL'] . "</a>"; ?>
                </div>
            </div>
        </div>
        <div class="container col-md-5" style="margin-top:5px;margin-left:5px;">
            <div class="row">
                <h2><?php echo $offer["Intitule"]; ?><small> - Publication <?php echo (new DateTime($offer["DatePublication"]))->format("d/m/Y"); ?></small></h2>
            </div>
            <div class="row text-muted">
                Ref : <?php echo $offer["Reference"]; ?>
            </div>
            <div class="row">
                Nombre de poste(s) : <?php echo $offer["NbPostes"]; ?>
            </div>
            <div class="row">
                Durée de diffusion : <?php echo $offer["DureeDiffusion"]; ?> semaine(s)
            </div>
            <div class="row">
                Date de début de contrat : <?php echo (new DateTime($offer["DateDebutContrat"]))->format("d/m/Y"); ?>
            </div>
            <div class="row">
                Type de contrat : <?php echo getTypeContratById($dataBase, $offer["IdentifiantTypeContrat"])["Label"]; ?>
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Description du poste</div>
                    <div class="panel-body"><?php echo $offer["DescriptionPoste"]; ?></div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Description du profil</div>
                    <div class="panel-body"><?php echo $offer["DescriptionProfil"]; ?></div>
                </div>
            </div>
        </div>

        <!-- Insertion fichiers JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>