<?php

include './Methods/DBLibrary.php';

session_start();

$dataBase = getDBConnection();

$lastOffers = getLastOffers($dataBase)->fetchAll();

require './Views/IndexView.php';
