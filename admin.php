<?php

include './Methods/DBLibrary.php';

session_start();

$dataBase = getDBConnection();
$listOffers = getOffers($dataBase)->fetchAll();
$listUsers = getUsers($dataBase)->fetchAll();

$totalVisiteur = 0;
$totalVisiteurAuth = 0;
$totalConnexion = 0;

require './Views/AdminView.php';