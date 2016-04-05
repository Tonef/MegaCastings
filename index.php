<?php

include './Methods/DBLibrary.php';

$dataBase = getDBConnection();

$lastOffers = getLastOffers($dataBase)->fetchAll();

require 'Views/IndexView.php';
