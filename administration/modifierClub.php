<?php
//On veut updater le club donc on envoie POST depuis consulterCLub.php
    $codeClub = $_POST['frm_codeClub']; 
    $nomClub = $_POST['frm_nom']; //je déclare obj + je récupère les variables.
    $adresseRueClub = $_POST['frm_adresseRue'];
    $codePostalClub = $_POST['frm_codePostal'];
    $villeClub = $_POST['frm_ville'];
    $presidentClub = $_POST['frm_nomPresident'];
    $numTelClub = $_POST['frm_numTelephone'];
    $mailClub = $_POST['frm_mail'];
    $urlSiteWebClub = $_POST['frm_URL'];

    require_once "ClubManager.php";
    $nouvClub = new ClubManager($codeClub, $nomClub, $adresseRueClub, $codePostalClub, $villeClub, $presidentClub,  $numTelClub,  $mailClub,  $urlSiteWebClub );
    $nouvClub->update($codeClub); // Envoie de la variable club $codeClub à la fonction update en argument pour MAJ info du club

    echo "Le tria a été ajouter avec succès";
    header("Location: GestionClub.php");
   
        



?>