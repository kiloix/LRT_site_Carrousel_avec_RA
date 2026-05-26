<?php
    $nomCompet = $_POST['frm_code'];
    $nomClub = $_POST['frm_libelle'];
    $nomSponsor= $_POST['frm_ageDebut'];
    $villeCompet = $_POST['frm_ageFin'];

    require_once "modele/m-Enregistrement.php.php";
    echo"ok";
    $nouvTuple = new Enregistrement($categorieAgeTria, $licenceTria, $ageDebutCateg, $ageFinCateg);
    $nouvTuple->createC();

    echo "La categorie a été ajouter avec succès";
    header("Location: index.php?action=habilE");
   
        



?>