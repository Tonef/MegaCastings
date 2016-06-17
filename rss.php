<?php

include './Methods/DBLibrary.php';

$dataBase = getDBConnection();

if (isset($_GET["id"])) {
    $listOffers = array(getOfferById($dataBase, $_GET["id"]));
}
else {
    $listOffers = getOffers($dataBase)->fetchAll();
}

require './Views/RssView.php';
