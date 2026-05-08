<!DOCTYPE html>
<html class="h-100" lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Membres du CA</title>
    <link rel="stylesheet" href="css/theme.min.css">
    <style>
        #corps {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        #corps table {
            width: 90%;
            max-width: 1200px;
            border-collapse: collapse;
            color: white;
            text-align: center;
        }
        #corps th, #corps td {
            padding: 12px;
            border: 1px solid #444;
        }
        #corps th {
            background-color: #333;
            font-weight: bold;
        }
        #corps tr:nth-child(even) {
            background-color: #444;
        }
        #corps tr:nth-child(odd) {
            background-color: #555;
        }
        #corps td img {
            border-radius: 50%;
            border: 2px solid #fff;
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body class="bg-black text-white">
    <nav class="navbar navbar-dark bg-black fixed-top px-vw-5">
        <div class="container">
            <a class="navbar-brand pe-md-4 fs-4" href="index.html">
                <img src="img/MS2R_Logo.png" width="58" height="58" alt="MS2R Logo">
                <span class="ms-md-1 fw-bolder">MS2R</span>
            </a>
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 list-group list-group-horizontal">
                <li class="nav-item"><a class="nav-link fs-5" href="index.html">Accueil</a></li>
                <li class="nav-item"><a class="nav-link fs-5" href="membres_dyn.php">Membres</a></li>
            </ul>
        </div>
    </nav>
    <main class="container mt-5 pt-5"><br></br>
        <h1 class="text-center">Membres du CA</h1>
        <div id="corps">
            <table>
                <tr>
                    <th>Photo</th>
                    <th>Numéro du membre</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Numéro du service</th>
                </tr>
                <?php
                require_once "connexionServBD_local.php";
                $sql = "SELECT * FROM membre;";
                $resultat = $connexionBD->query($sql);
                if (!$resultat) {
                    die("Erreur SQL : " . $connexionBD->errorInfo()[2]);
                }
                while ($ligne = $resultat->fetch()) {
                    $prenom = strtolower($ligne['prenom']);
                    $photoPath = "Membres/photos/" . $prenom . ".png";
                    if (!file_exists($photoPath)) {
                        $photoPath = "Membres/photos/default.png";
                    }
                    echo "<tr>
                            <td><img src='" . htmlspecialchars($photoPath) . "' alt='" . htmlspecialchars($ligne['prenom']) . "'></td>
                            <td>" . htmlspecialchars($ligne['id_personne']) . "</td>
                            <td>" . htmlspecialchars($ligne['nom']) . "</td>
                            <td>" . htmlspecialchars($ligne['prenom']) . "</td>
                            <td>" . htmlspecialchars($ligne['id_service']) . "</td>
                          </tr>";
                }
                ?>
            </table>
        </div>
    </main>
    <footer class="text-center py-3">
        <p>&copy; 2024 LRT | <a href="#">Ligue Reunionnaise de Triathlon</a></p>
    </footer>
</body>
</html>
