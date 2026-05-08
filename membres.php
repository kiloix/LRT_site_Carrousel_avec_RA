<?php
session_start();
require 'config.php'; // Fichier de connexion à la base de données

// Vérifier si l'utilisateur est connecté en tant qu'admin
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

// Récupérer les membres
$sql = "SELECT * FROM membres";
$result = $conn->query($sql);

// Suppression d'un membre
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM membres WHERE id = $id");
    header("Location: admin_membres.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Membres</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Gestion des Membres</h1>
    <a href="logout.php">Déconnexion</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Qualification</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['telephone']; ?></td>
            <td><?php echo $row['qualification']; ?></td>
            <td>
                <a href="edit_membre.php?id=<?php echo $row['id']; ?>">Modifier</a>
                <a href="admin_membres.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Êtes-vous sûr ?');">Supprimer</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <a href="add_membre.php">Ajouter un membre</a>
</body>
</html>
