<?php

function getDBConnection()
{
    return new PDO("sqlsrv:Server=localhost;Database=MegaCasting", "sa", "sql2012");
}

function getOffers($dataBase)
{
    $query = $dataBase->prepare('SELECT * FROM [Offre]');
    $query->execute();
    return $query;
}

function getLastOffers($dataBase)
{
    $query = $dataBase->prepare('SELECT TOP 6 * FROM [Offre]');
    $query->execute();
    return $query;
}

function getDomaineById($dataBase, $id)
{
    $query = $dataBase->prepare('SELECT * FROM [Domaine] WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->execute();
    
    return $query->fetch();
}

function getMetierById($dataBase, $id)
{
    $query = $dataBase->prepare('SELECT * FROM [Metier] WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->execute();
    
    return $query->fetch();
}

function getAnnonceurById($dataBase, $id)
{
    $query = $dataBase->prepare('SELECT * FROM [Annonceur] WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->execute();
    
    return $query->fetch();
}
