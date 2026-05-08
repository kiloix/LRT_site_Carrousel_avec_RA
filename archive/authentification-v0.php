<!DOCTYPE HTML>
<html>
	<!-- Tête de page -->
	<head>	
	  <title>LRT</title>
	  <link rel="shortcut icon" href="LRT.png">
	  <meta charset="UTF-8" />
	  <link rel="stylesheet" type="text/css" href="style.css" />  
	</head>

	<!-- Corps de la page -->
	<body>	
		<div id="main">
			<!-- En-tête de la page -->
			<header>			
				<div id="logo">
					<div id="logo_text">
					<a href="http://www.fftri.com" target="_blank"><img src="images/FFTRI.png" alt="Fédération Française de Triathlon"></a>
						<h1><a href="index.html">LIGUE RÉUNIONNAISE DE <span class="logo_colour">TRIATHLON</span></a></h1>
						<h2>Île de la Réunion</h2>					  
					</div>
				</div>
				<nav>
					<div id="menu_container">
						<ul class="sf-menu" id="nav">
							<li><a href="index.html" >ACCUEIL</a></li>
							<li><a href="#">LA LIGUE<span class="sf-arrow"></span></a>
								<ul>
									<li><a href="presentationLigue.html">Présentation</a></li>
									<li><a href="origineTriathlon.html">Origine du Triathlon</a></li>
								</ul>
							</li>
							<li><a href="annuaireClub.html">ANNUAIRE</a></li>
							<li><a href="calendrierTriathlon.html">CALENDRIER</a></li>								
							<li><a href="categorieAge-v4.html">CATEGORIE</a></li>
							<li><a href="contact.html">CONTACT</a></li>
						</ul>
					</div>
				</nav>
			</header>
			<!-- Section principale de la page -->
			<section>
				<div id="site_content">
					<div class="content">
						<img style="float: left; vertical-align: middle; margin: 0 10px 0 0;" src="images/logo_contact.png" alt="home" />
						<h1 style="margin: 15px 0 0 0;">Nous Contacter !</h1>
						<br/><hr><br/>
						<!-- Création du formulaire de contact -->
						<form name="formAuthentfication" method="POST" action="authentification.php">
							<fieldset>
								<legend>Veuillez saisir les informations suivantes SVP :</legend>
								
								<p>	
									<label for="nom"> Nom <span style="color:red">*</span> : </label> <input type="text" name="nom" id="nom" required><br/>
									<label for="prenom">Mot de passe<span style="color:red">*</span> : </label> <input type="password" name="prenom" id="mdp" required><br/>
									
									</textarea>
									<br/>
									<input type="submit" class="button" > 
								</p>
								<span style="color:red">*</span> <span style="font-style:italic ; font-size:smaller">champs obligatoires</span> 
							</fieldset>
						</form>
						<?php 
										// ||||Remarque ne pas mettre dans la balise form
										require_once "../administration/connexionServBD.php";
										$nom = $_POST['frm_nom'] ;
										$shaMdpSaisi = $_POST['frm_mdp'];
										$corrSaisieMaths = $_POST['frm_maths'];
										$corrSaisieCapitale = $_POST['frm_capitale'];
										// echo "<br> <p> La valeur enregistré par est $nom  ET $shaMdpSaisi : </br> </p>";
										// $shaMdpSaisi = sha1($_POST['frm_mdp']);										
										// ||||Remarque ne pas mettre de guillemets à Utilisateurs + pas grave si on femre les gi=uillmets pendant instruction SQL
										$sql = "SELECT COUNT(*) FROM Utilisateurs WHERE motdepasse='".sha1($shaMdpSaisi)."' AND id='".$nom."'";
										// $sql = "SELECT COUNT(*) FROM Utilisateurs WHERE motdepasse='sha1($shaMdpSaisi)' AND id='$nom';"; // 	// Pas de guillemet car déja string dans SQL
										echo "$sql";
										$result = $bd->query($sql) or die(print_r($connexionBD->errorInfo(), true));  																				
										$ligne=$result->fetchColumn();
										echo $ligne;
									 	if ($ligne == 1 &&  $corrSaisieCapitale == "paris" && $corrSaisieMaths == 13) {
									// 	// ||||Remarque mettre bo nchemi n, pas de chemin inversé  + mettre ech ou sleep()
									// 	// echo"bon";
									 	header("Location: ..\administration\acceuilBO.html");
									} 
									if ($ligne == 0) {
									// 	// ||||Remarque Pareil
									// 	// echo"pas bon";
									 	header('Location: ..\administration\formEchecAuthen.html');
									 }
										// $result = $conexionBD->query($sql) or die(print_r($connexionBD->errorInfo(), true));  										
										// $slq = $connexionBD->query("SELECT COUNT(*) id FROM Utilisateurs; SELECT COUNT(*) motdepasse FROM Utilisateurs;" ) or die(print_r($connexionBD->errorInfo(), true));
									?>

					</div>
				</div>
			</section>
			<!-- Pied de la page -->
			<footer>
				<p>Copyright &copy; LRT-SLAM 2025 | <a href="#">Ligue Réunionnaise de Triathlon</a><IMG class="logo-pour-tria" style="float:right; vertical-align:middle; margin:5px 10px auto 0;" SRC="images/LRT.png"/></p>
			</footer>
		</div>	  
	</body>
</html>
										<!-- $slq = $connexionBD->prepare("SELECT COUNT(*) attribut FROM table; SELECT COUNT(*) attribut FROM mdp; ") ;
										// $result = $conexionBD->query($sql) or die(print_r($connexionBD->errorInfo(), true));  										// $ligne= $result->fetchColumx();
										$result = $connexionBD->query("$slq" $query, $ligne $fetchMode) or die(print_r($connexionBD->errorInfo(), true));
										$ligne=$result->fetchColumn(); -->
