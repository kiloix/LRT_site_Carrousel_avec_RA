<?php
session_start();

// Vérifie si l'utilisateur est connecté et a le bon rôle
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'editeur')) {
    // Si l'utilisateur n'est pas admin ou editeur, on le redirige
    header("Location: connexion.php");
    exit();
}

// Connexion à la base de données
$host = "172.18.156.200";
$user = "equipeB";
$password = "%45fM<T6cd";
$dbname = "ap4_equipeB";
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Fonction pour sécuriser les données d'entrée
function secure_input($data) {
    global $conn;
    return htmlspecialchars(mysqli_real_escape_string($conn, trim($data)));
}

// Traiter les formulaires
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['update'])) {
        // Sécuriser et valider les données
        $id = secure_input($_POST['id_membre']);
        $nom = secure_input($_POST['nom']);
        $qualification = secure_input($_POST['qualification']);
        $email = secure_input($_POST['email']);
        $telephone = secure_input($_POST['telephone']);
        $service_id = secure_input($_POST['service_id']);
        
        // Préparer la requête de mise à jour
        $sql = "UPDATE membres SET nom=?, qualification=?, email=?, telephone=?, service_id=? WHERE id_membre=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssii", $nom, $qualification, $email, $telephone, $service_id, $id);
        if ($stmt->execute()) {
            $message = "Membre mis à jour avec succès.";
        } else {
            $message = "Erreur lors de la mise à jour.";
        }
        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        // Sécuriser et valider les données
        $id = secure_input($_POST['id_membre']);
        
        // Préparer la requête de suppression
        $sql = "DELETE FROM membres WHERE id_membre=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $message = "Membre supprimé avec succès.";
        } else {
            $message = "Erreur lors de la suppression.";
        }
        $stmt->close();
    } elseif (isset($_POST['add'])) {
        // Sécuriser et valider les données
        $nom = secure_input($_POST['nom']);
        $qualification = secure_input($_POST['qualification']);
        $email = secure_input($_POST['email']);
        $telephone = secure_input($_POST['telephone']);
        $service_id = secure_input($_POST['service_id']);
        
        // Préparer la requête d'ajout
        $sql = "INSERT INTO membres (nom, qualification, email, telephone, service_id) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $nom, $qualification, $email, $telephone, $service_id);
        if ($stmt->execute()) {
            $message = "Membre ajouté avec succès.";
        } else {
            $message = "Erreur lors de l'ajout.";
        }
        $stmt->close();
    }
}

// Récupérer la liste des membres
$result = $conn->query("SELECT * FROM membres");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
<div id="bandeau"><h1>Maison des Sports de la région Réunion</h1></div>
<!-- Menu -->
<div id="menu"> 
    <ul>
        <li class="fin first"><a href="index.html">Accueil</a></li>
        <li class="extension first"><a href="#">MS2R</a>
            <ul>
                <li class="fin first"><a href="historique.html">Historique</a></li>
                <li class="fin"><a href="statuts.html">Statuts</a></li>
                <li class="fin"><a href="listeMembres.php">Les Employés</a></li>
                <li class="fin last"><a href="organigramme.html">Organigramme CA</a></li>
            </ul>
        </li>
        <li class="fin first"><a href="documents.html">Les Documents</a></li>
    </ul>
</div>

<h1>Gestion des Membres</h1>

<!-- Affichage message d'erreur/succès -->
<?php if (isset($message)): ?>
    <p style="color: green;"><?php echo $message; ?></p>
<?php endif; ?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Qualification</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th>Service</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <form method="POST">
                <td><?php echo $row['id_membre']; ?></td>
                <td><input type="text" name="nom" value="<?php echo $row['nom']; ?>"></td>
                <td><input type="text" name="qualification" value="<?php echo $row['qualification']; ?>"></td>
                <td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
                <td><input type="text" name="telephone" value="<?php echo $row['telephone']; ?>"></td>
                <td><input type="number" name="service_id" value="<?php echo $row['service_id']; ?>"></td>
                <td>
                    <input type="hidden" name="id_membre" value="<?php echo $row['id_membre']; ?>">
                    <button type="submit" name="update">Modifier</button>
                    <button type="submit" name="delete">Supprimer</button>
                </td>
            </form>
        </tr>
    <?php } ?>
</table>

<h2>Ajouter un Membre</h2>
<button onclick="document.getElementById('form-ajout').style.display='block'">Afficher le formulaire complet</button>
<form method="POST" id="form-ajout" style="display: none;" class="form-ajout">
    <fieldset>
        <legend>Ajout rapide</legend>
        <label for="nom">Nom : <span style="color: red;">*</span></label>
        <input type="text" id="nom" name="nom" required>
        
        <label for="qualification">Qualification : <span style="color: red;">*</span></label>
        <input type="text" id="qualification" name="qualification" required>
        
        <label for="email">Email : <span style="color: red;">*</span></label>
        <input type="email" id="email" name="email" required>
        
        <label for="telephone">Téléphone : <span style="color: red;">*</span></label>
        <input type="text" id="telephone" name="telephone" required>
        
        <label for="service_id">Service : <span style="color: red;">*</span></label>
        <select id="service_id" name="service_id">
            <option value="1">Service 1</option>
            <option value="2">Service 2</option>
            <option value="3">Service 3</option>
        </select>
        
        <button type="submit" name="add">Enregistrer</button>
        <button type="reset">Annuler</button>
        <p><span style="color: red;">* signifie champs obligatoire</span></p>
    </fieldset>
</form>
</body>
</html>
