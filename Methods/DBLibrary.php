<?php

/**
 * Get the connection to the DataBase
 * @return \PDO
 */
function getDBConnection()
{
    //return new PDO("sqlsrv:Server=SRV04;Database=MegaCasting", "sa", "P@ssw0rd");
    return new PDO("dblib:host=172.16.1.182;dbname=MegaCasting", "sa", "P@ssw0rd");
}

// <editor-fold defaultstate="collapsed" desc="OFFER'S METHODS">
/**
 * Get list offers
 * @param type $dataBase
 * @return type
 */
function getOffers($dataBase, $idDomaine = null, $idMetier = null, $idTypeContrat = null)
{
    $queryString = "SELECT * FROM [Offre]";
    $addedOne = false;

    if ($idDomaine != null) {
        $queryString .= " WHERE [IdentifiantDomaine] = :idDomaine";
        $addedOne = true;
    }
    if ($idMetier != null) {
        if ($addedOne) {
            $queryString .= " AND [IdentifiantMetier] = :idMetier";
        }
        else {
            $queryString .= " WHERE [IdentifiantMetier] = :idMetier";
            $addedOne = true;
        }
    }
    if ($idTypeContrat != null) {
        if ($addedOne) {
            $queryString .= " AND [IdentifiantTypeContrat] = :idTypeContrat";
        }
        else {
            $queryString .= " WHERE [IdentifiantTypeContrat] = :idTypeContrat";
        }
    }

    $query = $dataBase->prepare($queryString);
    if ($idDomaine != null) {
        $query->bindParam(":idDomaine", $idDomaine);
    }
    if ($idMetier != null) {
        $query->bindParam(":idMetier", $idMetier);
    }
    if ($idTypeContrat != null) {
        $query->bindParam(":idTypeContrat", $idTypeContrat);
    }
    $query->execute();
    return $query;
}

function getLastOffers($dataBase)
{
    $query = $dataBase->prepare('SELECT TOP 6 * FROM [Offre]');
    $query->execute();
    return $query;
}

function getOfferById($dataBase, $id)
{
    $query = $dataBase->prepare('SELECT * FROM [Offre] WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->execute();

    return $query->fetch();
}

function incrOfferNbVisitors($dataBase, $id)
{
    $query = $dataBase->prepare('SELECT * FROM [Offre] WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->execute();

    $number = intval($query->fetch()['NbVisiteur']) + 1;

    $query = $dataBase->prepare('UPDATE [Offre] SET [NbVisiteur] = :number WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->bindParam(":number", $number);
    $query->execute();
}

function incrOfferNbVisitorsAuth($dataBase, $id)
{
    $query = $dataBase->prepare('SELECT * FROM [Offre] WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->execute();

    $number = intval($query->fetch()['NbVisiteurAuthentifie']) + 1;

    $query = $dataBase->prepare('UPDATE [Offre] SET [NbVisiteurAuthentifie] = :number WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->bindParam(":number", $number);
    $query->execute();
}

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="TYPE CONTRAT'S METHODS">
/**
 * Get list Type Contrat
 * @param type $dataBase
 * @return type
 */
function getTypeContrats($dataBase)
{
    $query = $dataBase->prepare('SELECT * FROM [TypeContrat]');
    $query->execute();
    return $query;
}

function getTypeContratById($dataBase, $id)
{
    $query = $dataBase->prepare('SELECT * FROM [TypeContrat] WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->execute();

    return $query->fetch();
}

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="DOMAINE'S METHODS">
/**
 * Get list Domaines
 * @param type $dataBase
 * @return type
 */
function getDomaines($dataBase)
{
    $query = $dataBase->prepare('SELECT * FROM [Domaine]');
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

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="METIER'S METHODS">
/**
 * Get list Metier
 * @param type $dataBase
 * @return type
 */
function getMetiers($dataBase)
{
    $query = $dataBase->prepare('SELECT * FROM [Metier]');
    $query->execute();
    return $query;
}

function getMetierById($dataBase, $id)
{
    $query = $dataBase->prepare('SELECT * FROM [Metier] WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->execute();

    return $query->fetch();
}

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="ANNONCEUR'S METHODS">

function getAnnonceurById($dataBase, $id)
{
    $query = $dataBase->prepare('SELECT * FROM [Annonceur] WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->execute();

    return $query->fetch();
}

// </editor-fold>
// <editor-fold defaultstate="collapsed" desc="USER'S METHODS">
function getUsers($dataBase)
{
    $query = $dataBase->prepare('SELECT * FROM [User]');
    $query->execute();
    return $query;
}

function getUserByEmail($dataBase, $email)
{
    $query = $dataBase->prepare('SELECT * FROM [User] WHERE [email] = :email');
    $query->bindParam(":email", $email);
    $query->execute();

    return $query->fetch();
}

function incrUserNbConnexion($dataBase, $id)
{
    $query = $dataBase->prepare('SELECT * FROM [User] WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->execute();

    $number = intval($query->fetch()['NbConnexion']) + 1;

    $query = $dataBase->prepare('UPDATE [User] SET [NbConnexion] = :number WHERE [Identifiant] = :id');
    $query->bindParam(":id", $id);
    $query->bindParam(":number", $number);
    $query->execute();
}

// </editor-fold>