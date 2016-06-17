<?php

// Set the content type to be XML, so that the browser will   recognise it as XML.
header("content-type: application/xml; charset=ISO-8859-15");

// "Create" the document.
$xml = new DOMDocument("1.0", "ISO-8859-15");

// Create some elements.
$xml_rss = $xml->createElement("rss");
$xml_rss->setAttribute("version", "2.0");

$xml_channel = $xml->createElement("channel");
$xml_channel->appendChild($xml->createElement("title", "MegaCastings"));
$xml_channel->appendChild($xml->createElement("link", "http://172.16.1.181/listoffers.php"));
$xml_channel->appendChild($xml->createElement("description", "Offers RSS stream."));

foreach ($listOffers as $item) {
    $xml_item = $xml->createElement("item");
    $xml_item->appendChild($xml->createElement("title", utf8_decode($item["Intitule"])));
    $xml_item->appendChild($xml->createElement("link", "http://172.16.1.181/detailOffer.php?id=" . $item["Identifiant"]));
    $xml_item->appendChild($xml->createElement("descriptionPoste", utf8_decode($item["DescriptionPoste"])));
    $xml_item->appendChild($xml->createElement("annonceur", utf8_decode(getAnnonceurById($dataBase, $item["IdentifiantAnnonceur"])["Libelle"])));
    $xml_item->appendChild($xml->createElement("dateDebutContrat", $item["DateDebutContrat"]));
    $xml_item->appendChild($xml->createElement("datePublication", $item["DatePublication"]));
    $xml_item->appendChild($xml->createElement("nbPostes", $item["NbPostes"]));
    $xml_item->appendChild($xml->createElement("reference", utf8_decode($item["Reference"])));
    $xml_item->appendChild($xml->createElement("dureeDiffusion", $item["DureeDiffusion"]));
    $xml_item->appendChild($xml->createElement("descriptionProfil", utf8_decode($item["DescriptionProfil"])));
    $xml_item->appendChild($xml->createElement("typeContrat", utf8_decode(getTypeContratById($dataBase, $item["IdentifiantTypeContrat"])["Label"])));
    $xml_item->appendChild($xml->createElement("metier", utf8_decode(getMetierById($dataBase, $item["IdentifiantMetier"])["Label"])));
    $xml_item->appendChild($xml->createElement("domaine", utf8_decode(getDomaineById($dataBase, $item["IdentifiantDomaine"])["Label"])));
    $xml_channel->appendChild($xml_item);
}

$xml_rss->appendChild($xml_channel);
$xml->appendChild($xml_rss);

// Parse the XML.
print $xml->saveXML();
