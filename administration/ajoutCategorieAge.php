<?php
    $categorieAgeTria = $_POST['frm_code'];
    $licenceTria = $_POST['frm_libelle'];
    $ageDebutCateg= $_POST['frm_ageDebut'];
    $ageFinCateg = $_POST['frm_ageFin'];

    require_once "CategorieAgeManager.php";
    echo"ok";
    $nouvClub = new CategorieAgeManager($categorieAgeTria, $licenceTria, $ageDebutCateg, $ageFinCateg);
    $nouvClub->create();

    echo "La categorie a été ajouter avec succès";
    header("Location: formAjoutCategorieAge.html");
   
        



?>