<?php
// Connexion à la base de données
require_once "connexionServBD_local.php";

// Vérification si l'ID est passé en paramètre
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les informations du membre
    $sql = "SELECT * FROM membre WHERE id_personne = :id";
    $stmt = $connexionBD->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $membre = $stmt->fetch();
    if (!$membre) {
        die("Le membre n'existe pas.");
    }
} else {
    die("ID du membre manquant.");
}

// Traitement du formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $id_service = $_POST['id_service'];

    // Mettre à jour les informations dans la base de données
    $sql = "UPDATE membre SET nom = :nom, prenom = :prenom, id_service = :id_service WHERE id_personne = :id";
    $stmt = $connexionBD->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':id_service', $id_service);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "<p>Membre modifié avec succès !</p>";
        echo "<a href='membres_dyn.php'>Retour à la liste des membres</a>";
    } else {
        echo "<p>Une erreur est survenue lors de la modification.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Modifier le membre</title>
</head>
<body>
    <h1>Modifier le membre</h1>
    <form method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($membre['nom']) ?>" required><br><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($membre['prenom']) ?>" required><br><br>

        <label for="id_service">Numéro du service :</label>
        <input type="text" id="id_service" name="id_service" value="<?= htmlspecialchars($membre['id_service']) ?>" required><br><br>

        <input type="submit" value="Modifier">
    </form>
    <a href="gestion.php">Retour à la liste des membres</a>
</body>
</html>
