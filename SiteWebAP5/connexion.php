<?php
// Connexion à la base de données MySQL
$host = "172.18.156.200";
$user = "equipeB";
$password = "%45fM<T6cd";
$dbname = "ap4_equipeB";
$conn = new mysqli($host, $user, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Vérification du formulaire
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération et sécurisation des entrées
    $login = trim($_POST['utilisateur'] ?? '');
    $password = $_POST['mot_de_passe'] ?? '';

    if (empty($login) || empty($password)) {
        $error = "Veuillez remplir tous les champs.";
    } else {
        // Requête pour chercher l'utilisateur via son nom_utilisateur
        $sql = "SELECT * FROM utilisateurs WHERE nom_utilisateur = ?";
        $stmt = $conn->prepare($sql);

        if (!$stmt) {
            $error = "Erreur de préparation de la requête : " . $conn->error;
        } else {
            $stmt->bind_param("s", $login);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();

                // Vérification avec SHA-1
                $hashedPassword = sha1($password);
                if ($hashedPassword === $user['mot_de_passe']) {
                    if ($user['role'] === 'admin' || $user['role'] === 'editeur') {
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['login'] = $user['nom'];
                        $_SESSION['role'] = $user['role'];

                        header("Location: admin.php");
                        exit();
                    } else {
                        $error = "Accès réservé aux administrateurs et éditeurs.";
                    }
                } else {
                    $error = "Mot de passe incorrect.";
                }
            } else {
                $error = "Utilisateur non trouvé.";
            }

            $stmt->close();
        }
    }

    $conn->close();
}
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

    <!-- Formulaire de connexion -->
    <form action="connexion.php" method="POST">
        <input type="text" name="utilisateur" id="utilisateur" placeholder="Nom utilisateur" required>
        <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
    </form>

    <!-- Message d'erreur -->
    <div class="error-message">
        <?php
        if (isset($error)) {
            echo htmlspecialchars($error);
        }
        ?>
    </div>

    <!-- Lien mot de passe oublié -->
    <a href="#" class="forgot-password">Mot de passe oublié ?</a>

    <footer>
        <p>© 2025 Maison des Sports. Tous droits réservés.</p>
    </footer>
</body>
</html>
