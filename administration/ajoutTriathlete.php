<?php
    $licenceTria = $_POST['frm_licence'];
    $nomTria = $_POST['frm_nom'];
    $prenomTria = $_POST['frm_prenom'];
    $genreTria = $_POST['frm_genre'];
    $rueTria = $_POST['frm_adresseRue'];
    $codePostalTria = $_POST['frm_genre'];
    $villeTria = $_POST['frm_ville'];
    $naissTria = $_POST['frm_dateNaissance'];
    $mailTria = $_POST['frm_codePostal'];
    $mailTria = $_POST['frm_mail'];
    $clubTria = $_POST['frm_codeClub'];
    $categorieAgeTria = $_POST['frm_codeCategorie'];

    require_once "TriathleteManager.php";
    echo"ok";
    $nouvClub = new TriathleteManager($licenceTria,$nomTria, $prenomTria, $genreTria, $rueTria, $codePostalTria, $villeTria, $naissTria, $mailTria, $clubTria, $categorieAgeTria);
    $nouvClub->create();

    echo "Le tria a été ajouter avec succès";
    header("Location: formGestionClub.html");
   
        



?>