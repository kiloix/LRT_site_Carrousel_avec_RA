<?php
// Connexion à la base de données
require_once "connexionServBD_local.php";

// Vérification si l'ID est passé en paramètre
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Suppression du membre
    $sql = "DELETE FROM membre WHERE id_personne = :id";
    $stmt = $connexionBD->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<p>Membre supprimé avec succès !</p>";
        echo "<a href='gestion.php'>Retour à la liste des membres</a>";
    } else {
        echo "<p>Une erreur est survenue lors de la suppression.</p>";
    }
} else {
    die("ID du membre manquant.");
}
?>
