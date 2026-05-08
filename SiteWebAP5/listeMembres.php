<?php
// Connexion à la base de données
$host = "172.18.156.200";
$user = "equipeB";
$password = "%45fM<T6cd";
$dbname = "ap4_equipeB";
$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

// Récupération des membres
$sql = "SELECT * FROM membre";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Maison des Sports Régionale de la Réunion</title>
    <link rel="stylesheet" title="Design" href="design.css" type="text/css" media="screen" />
    <meta charset="UTF-8" />    
</head>

<body>
    <div id="bandeau"><h1> Maison des Sports de la région Réunion</h1></div>

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

    <div id="corps">
        <h1>Liste des Employés</h1>
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Nom Prénom</th>
                    <th>Utilisateur</th>
                    <th>Habilitation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>";
                        if (!empty($row['image'])) {
                            echo "<img src='" . htmlspecialchars($row['image']) . "' alt='Photo' width='80'>";
                        } else {
                            echo "Aucune image";
                        }
                        echo "</td>";
                        echo "<td>" . htmlspecialchars($row['nom']) . " " . htmlspecialchars($row['prenom']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['utilisateur']) . "</td>";
                        echo "<td>" . ($row['habilitation'] ? "Oui" : "Non") . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun membre trouvé</td></tr>";
                }
                ?>
            </tbody>
        </table>


		</body>

			<!-- <h1>Liste des Employés</h1>
			<table  class="tab">
			  <thead> 
				<tr>
					<th>Photos</th>
					<th> Nom Prénom</th>
					<th> Qualifications</th>
					<th> e-mail</th>
					<th> Telephone</th>
				</tr>
			  </thead>
				<tr>
					<td><img src='Membres/photos/leonardo.png'></td><td>Léonardo PANHELIONS</td>
					<td>Directeur</td><td>l.panhelions@ms2r.re</td><td>0262 10 20 01</td>
				</tr>
				<tr>
					<td><img src='Membres/photos/lara.png'></td><td>Lara SKIMALKOS</td>
					<td>Directrice Adjointe</td><td>l.skimalkos@ms2r.re</td><td>0262 10 20 02</td>
				</tr>
				<tr>
					<td><img src='Membres/photos/robert.png'></td><td>Robert FAYDE</td>
					<td>Responsable Gestion</td><td>r.fayde@ms2r.re</td><td>0262 10 20 03</td>
				</tr>
				<tr>
					<td><img src='Membres/photos/andie.png'></td><td>Andie THIEUMA</td>
					<td>Formation, Commmunication, Secrétariat</td><td>a.thieuma@ms2r.re</td><td>0262 10 20 04</td>
				</tr>
				<tr>
					<td><img src='Membres/photos/adriana.png'></td><td>Adriana LIOFO</td>
					<td>Responsable SAPHIR</td><td>a.lofio@ms2r.re</td><td>0262 10 20 05</td>
				</tr>
				<tr>
					<td><img src='Membres/photos/chimene.png'></td><td>Chimène TUNED</td>
					<td>Responsable RH</td><td>c.tuned@ms2r.re</td><td>0262 10 20 06</td>
				</tr>
				<tr>
					<td><img src='Membres/photos/adele.png'></td><td>Adèle NAISET</td>
					<td>Infographisme et Gestion des photocopieurs numériques</td><td>a.naiset@ms2r.re</td><td>0262 10 20 07</td>
				</tr>
				<tr>
					<td><img src='Membres/photos/mark.png'></td><td>Mark DISCAR</td>
					<td>Responsable Ligues nord-est</td><td>m.discar@ms2r.re</td><td>0262 10 20 08</td>
				</tr>
				<tr>
					<td><img src='Membres/photos/pierre.png'></td><td>Pierre LAVONS</td>
					<td>Responsable Ligues sud-oeust</td><td>p.lavons@ms2r.re</td><td>0262 10 20 09</td>
				</tr>				
			</table> -->
		</div> 
		<!-- Pied de page -->
		<!-- Footer -->
		<footer id="pied">
			<div id="liens">
				<h3>Liens Utiles</h3>
				<ul>
					<li><a href="https://www.regionreunion.com/">Région Réunion</a></li>
					<li><a href="http://reunion.franceolympique.com/accueil.php">CROS Réunion</a></li>
					<li><a href="https://www.agencedusport.fr/">Agence Nationale du Sport</a></li>
					<li><a href="connexion.php">Administration</a></li>
				</ul>
			</div>
		</footer>
	</body>
</html>


