<?php

    // Identifiants corrects
    $utilisateur_correct = "Meva";
    $mdp_correct = "123";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $utilisateur = $_POST["utilisateur"] ;
        $mdp = $_POST["mdp"] ;

        if ($utilisateur == $utilisateur_correct && $mdp == $mdp_correct) {
            header("Location: accueilBO.html");
        }else {
            header("Location: systemEchec.html");
        }
    }else {
        header("Location: formAuthentification.html");
    }
?>