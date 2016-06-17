<?php

include './Methods/DBLibrary.php';

session_start();

if (!empty($_SESSION)) {
    header('Location: ./index.php');
}

if (!empty($_GET)) {
    $dataBase = getDBConnection();

    if (!empty($_GET["email"]) && !empty($_GET["password"])) {
        $email = $_GET["email"];
        $password = $_GET["password"];

        $user = getUserByEmail($dataBase, $email);
        if ($user) {
            if (strcmp($password, $user["Password"]) == 0) {
                $_SESSION["userIdentifiant"] = $user["Identifiant"];
                $_SESSION["userName"] = $user["Email"];
                $_SESSION["userPassword"] = $user["Password"];
                $_SESSION["userName"] = $user["Name"];
                
                header('Location: ./index.php');
            }            
        }
        else {
            $error = true;
        }
    }
    else {
        $error = true;
    }
}

require './Views/LoginView.php';
