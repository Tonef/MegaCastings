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
                        <li><a href="#"><span class="glyphicon glyphicon-triangle-right"></span> Devenir partenaire de diffusion</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="well col-md-offset-1 col-md-10 col-sm-offset-0 col-sm-12" style="margin-bottom:-1px;">
            <form class="form-horizontal" role="form">

                <div class="form-group">
                    <label class="control-label col-sm-2" for="typeContrat">Type de contrat :</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="typeContrat" name="typeContrat">
                            <option value="">-- Selection d'un type de contrat --</option>
                            <?php foreach ($listTypeContrat as $typeContrat) { ?>
                                <option value="<?php echo $typeContrat["Identifiant"]; ?>" <?php if(isset($selectedTypeContrat) && $typeContrat["Identifiant"] == $selectedTypeContrat) { echo "SELECTED"; } ?>><?php echo $typeContrat["Label"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="typeContrat">Domaine :</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="typeContrat" name="domaine">
                            <option value="">-- Selection d'un domaine --</option>
                            <?php foreach ($listDomaine as $domaine) { ?>
                                <option value="<?php echo $domaine["Identifiant"]; ?>" <?php if(isset($selectedDomaine) && $domaine["Identifiant"] == $selectedDomaine) { echo "SELECTED"; } ?>><?php echo $domaine["Label"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-sm-2" for="typeContrat">Métier :</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="typeContrat" name="metier">
                            <option value="">-- Selection d'un métier --</option>
                            <?php foreach ($listMetier as $metier) { ?>
                                <option value="<?php echo $metier["Identifiant"]; ?>" <?php if(isset($selectedMetier) && $metier["Identifiant"] == $selectedMetier) { echo "SELECTED"; } ?>><?php echo $metier["Label"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Rechercher</button>
                    </div>
                </div>
            </form>
        </div>

        <ul class="list-group well col-md-offset-2 col-md-8 col-sm-offset-0 col-sm-12" style="margin-top:0px;">
            <?php 
            if (empty($listOffers)) { echo "<div class='text-center'>Aucun résultat trouvé.</div>"; }
            else { foreach ($listOffers as $offer) { ?>
                <a href="detailOffer.php?id=<?php echo $offer["Identifiant"]; ?>" style="text-decoration: none;color: black;">
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-3">
                                <?php
                                $file = "./img/logo_client/logo" . $offer["Identifiant"];
                                if (file_exists($file)) {
                                    ?>
                                    <img src="<?php echo $file; ?>" class="img-responsive" style="width:100%" alt="Image">
                                    <?php
                                }
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
            <?php } } ?>
        </ul>

        <!-- Insertion fichiers JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>