<?php
//On veut updater le club donc on envoie POST depuis consulterCLub.php
    $codeClub = $_GET['codeClub']; 
    require_once "ClubManager.php";
    $supprClub=new ClubManager(NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
    $supprClub->delete($codeClub); // Envoie de la variable club $codeClub à la fonction update en argument pour MAJ info du club

    echo "Le tria a été ajouter avec succès";
    header("Location: GestionClub.php");
   
        



?>