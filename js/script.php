<?php
require_once "config.php"; // Inclusion des identifiants sécurisés

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $utilisateur = $_POST["utilisateur"];
    $mdp = $_POST["mdp"];

    // Vérification du nom d'utilisateur et du mot de passe
    if ($utilisateur === UTILISATEUR_CORRECT && password_verify($mdp, MDP_HASH)) {
        header("Location: accueilBO.html");
    } else {
        header("Location: systemEchec.html");
    }
}
?>
