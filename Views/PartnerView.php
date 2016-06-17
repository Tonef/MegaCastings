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
                        <li><a href="partner.php"><span class="glyphicon glyphicon-triangle-right"></span> Devenir partenaire de diffusion</a></li>
                        <?php if (empty($_SESSION)) { ?><li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Connexion</a></li><?php } ?>
                        <?php if (!empty($_SESSION)) { ?><li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Déconnexion</a></li><?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container col-md-offset-2 col-md-8">
            <h2>Partenaire de diffusion</h2>
            
            <h3>Qu'est-ce que c'est ?</h3>
            <p class="text-justify">
                Un partenaire de diffusion est un groupe ou une entreprise voulant faire partager les offres de castings sur leur propre site web. Ce partage se fait grâce à un flux RSS (XML) uniquement accessible par eux. Ce partage permet aux artistes de trouver plus facilement des offres qui les interresses.
            </p>            
            <h3>Comment le devenir ?</h3>
            <p class="text-justify">
                Pour devenir partenaire de diffusion il faut envoyer une demande à l'adresse suivante : <span style="color:blue;">megacastings@megaproduction.local</span>. La demande devra comporter le nom de l'entreprise représentée ainsi que ses motivation pour devenir partenaire de diffusion.
            </p>
        </div>

        <!-- Insertion fichiers JS -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>