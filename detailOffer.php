<?php

include './Methods/DBLibrary.php';

session_start();

if (isset($_GET["id"])) {
    $dataBase = getDBConnection();
    $idOffer = $_GET["id"];

    $offer = getOfferById($dataBase, $idOffer);
    
    if ($offer != null) {
        $annonceur = getAnnonceurById($dataBase, $offer["IdentifiantAnnonceur"]);
        
        if (empty($_SESSION)) {
            incrOfferNbVisitors($dataBase, $idOffer);
        } else {
            incrOfferNbVisitorsAuth($dataBase, $idOffer);
        }
        
        require './Views/DetailOfferView.php';
    } else {
        require './Views/NoFoundOfferView.php';
    }
} else {
    require './Views/NoFoundOfferView.php';
}