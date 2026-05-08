<?php
session_start();

// Connexion à la base de données
$host = "172.18.156.200";
$user = "equipeB";
$password = "%45fM<T6cd";
$dbname = "ap4_equipeB";
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Fonction de sécurisation
function secure_input($data) {
    global $conn;
    return htmlspecialchars(mysqli_real_escape_string($conn, trim($data)));
}

// Pour les tests : valeur par défaut
if (!isset($_SESSION['nom_utilisateur'])) {
    $_SESSION['nom_utilisateur'] = 'admin';
}

$message = "";
$image = null;

// Traitement formulaire
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Upload image
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $upload_dir = "uploads/";
        if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
        $image = $upload_dir . basename($_FILES["photo"]["name"]);
        move_uploaded_file($_FILES["photo"]["tmp_name"], $image);
    }

    if (isset($_POST['add'])) {
        $nom = secure_input($_POST['nom']);
        $prenom = secure_input($_POST['prenom']);
        $utilisateur = secure_input($_POST['utilisateur']);
        $password = sha1(secure_input($_POST['password']));
        $habilitation = intval($_POST['habilitation']);
        $ajoute_par = $_SESSION['nom_utilisateur'];

        $sql = "INSERT INTO membre (nom, prenom, image, utilisateur, password, habilitation, ajoute_par)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssis", $nom, $prenom, $image, $utilisateur, $password, $habilitation, $ajoute_par);
        $message = $stmt->execute() ? "Membre ajouté avec succès." : "Erreur lors de l'ajout.";
        $stmt->close();
    }

    if (isset($_POST['delete'])) {
        $id = intval($_POST['id_personne']);
        $utilisateur_id = $_SESSION['id_utilisateur'] ?? null;

        $stmt = $conn->prepare("SELECT image FROM membre WHERE id_personne=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->bind_result($image_avant);
        $stmt->fetch();
        $stmt->close();

        if ($utilisateur_id) {
            $sql_hist = "INSERT INTO historique_modifications (utilisateur_id, action, chemin_image_avant) VALUES (?, 'suppression', ?)";
            $stmt = $conn->prepare($sql_hist);
            $stmt->bind_param("is", $utilisateur_id, $image_avant);
            $stmt->execute();
            $stmt->close();
        }

        $stmt = $conn->prepare("DELETE FROM membre WHERE id_personne=?");
        $stmt->bind_param("i", $id);
        $message = $stmt->execute() ? "Membre supprimé avec succès." : "Erreur lors de la suppression.";
        $stmt->close();
    }
}

$result = $conn->query("SELECT * FROM membre");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Maison des Sports Régionale de la Réunion</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="connect.css">
</head>
<body>

<div id="bandeau"><h1>Maison des Sports de la région Réunion</h1></div>

<!-- Menu -->
<div id="menu"> 
    <ul>
        <li class="fin first"> <a href="index.html">Accueil</a></li>
        <li class="extension first"> <a href="#">MS2R</a>
            <ul>
                <li class="fin first"><a href="historique.html">Historique</a></li>
                <li class="fin"><a href="statuts.html">Statuts</a></li>
                <li class="fin"><a href="listeMembres.php">Les Employés</a></li>
                <li class="fin last"><a href='organigramme.html'>Organigramme CA</a></li>
            </ul>
        </li>
        <li class="fin first"> <a href='documents.html'>Les Documents</a></li>
    </ul>
</div>

<div style="padding: 20px;">
    <h2>Gestion des Membres</h2>
    <?php if ($message): ?><p style="color:green;"><?= $message ?></p><?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>ID</th><th>Nom</th><th>Prénom</th><th>Utilisateur</th><th>Habilitation</th><th>Image</th><th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <form method="POST" enctype="multipart/form-data">
                    <td><?= $row['id_personne'] ?></td>
                    <td><input type="text" name="nom" value="<?= $row['nom'] ?>"></td>
                    <td><input type="text" name="prenom" value="<?= $row['prenom'] ?>"></td>
                    <td><input type="text" name="utilisateur" value="<?= $row['utilisateur'] ?>"></td>
                    <td><input type="number" name="habilitation" value="<?= $row['habilitation'] ?>" min="0" max="1"></td>
                    <td>
                        <?php if ($row['image']): ?>
                            <img src="<?= $row['image'] ?>" width="80">
                        <?php endif; ?>
                        <input type="file" name="photo">
                    </td>
                    <td>
                        <input type="hidden" name="id_personne" value="<?= $row['id_personne'] ?>">
                        <button type="submit" name="update">Modifier</button>
                        <button type="submit" name="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce membre ?')">Supprimer</button>
                    </td>
                </form>
            </tr>
        <?php } ?>
    </table>

    <h3>Ajouter un Membre</h3>
    <form method="POST" enctype="multipart/form-data">
        <label>Nom: <input type="text" name="nom" required></label><br>
        <label>Prénom: <input type="text" name="prenom" required></label><br>
        <label>Utilisateur: <input type="text" name="utilisateur" required></label><br>
        <label>Mot de passe: <input type="password" name="password" required></label><br>
        <label>Habilitation: <input type="number" name="habilitation" value="0" min="0" max="1"></label><br>
        <label>Photo: <input type="file" name="photo" accept="image/*"></label><br>
        <button type="submit" name="add">Ajouter</button>
    </form>
</div>

</body>
</html>