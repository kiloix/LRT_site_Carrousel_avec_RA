<?php
    $codeClub = $_POST['code'];
    $nomClub = $_POST['nom'];
    $adresseRueClub = $_POST['adresse'];
    $codePostalClub = $_POST['code_postal'];
    $villeClub = $_POST['ville'];
    $presidentClub = $_POST['nom_president'];
    $numTelClub = $_POST['telephone'];
    $mailClub = $_POST['mail'];
    $urlClub = $_POST['url'];

    require_once "ClubManager.php";
    $nouvClub = new ClubManager($codeClub, $nomClub, $adresseRueClub, $codePostalClub, $villeClub, $presidentClub, $numTelClub, $mailClub, $urlClub);
    $nouvClub->retrieve();

    echo "Le club a été ajouter avec succès";
    header("Location: GestionClub.php");
   
        



?>