<?php

include './Methods/DBLibrary.php';

$dataBase = getDBConnection();

if (!empty($_GET)) {
    $listOffers = array();
}
else {
    $listOffers = getOffers($dataBase);
}

require './Views/ListOffersView.php';
