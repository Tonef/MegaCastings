<?php

include './Methods/DBLibrary.php';

$dataBase = getDBConnection();

if (!empty($_GET)) {
    $listOffers = array();

    if (isset($_GET["typeContrat"]) && $_GET["typeContrat"] != "") {
        $selectedTypeContrat = $_GET["typeContrat"];
    }
    if (isset($_GET["domaine"]) && $_GET["domaine"] != "") {
        $selectedDomaine = $_GET["domaine"];
    }
    if (isset($_GET["metier"]) && $_GET["metier"] != "") {
        $selectedMetier = $_GET["metier"];
    }

    if (!isset($selectedDomaine) && !isset($selectedMetier) && !isset($selectedTypeContrat)) {
        $listOffers = getOffers($dataBase)->fetchAll();
    } else {
        $listOffers = getOffers(
            $dataBase, 
            isset($selectedDomaine) ? $selectedDomaine : null, 
            isset($selectedMetier) ? $selectedMetier : null, 
            isset($selectedTypeContrat) ? $selectedTypeContrat : null)->fetchAll();
    }
}
else {
    $listOffers = getOffers($dataBase)->fetchAll();
}

$listTypeContrat = getTypeContrats($dataBase)->fetchAll();
$listDomaine = getDomaines($dataBase)->fetchAll();
$listMetier = getMetiers($dataBase)->fetchAll();

require './Views/ListOffersView.php';
