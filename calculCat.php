<!DOCTYPE HTML>
<html>
	<head>
	  <title>LRT-Ligue Réunionnaise de Triathlon</title>
	  <link rel="shortcut icon" href="images/ico_LRT.png">
	  <meta charset="UTF-8" />
	  <link rel="stylesheet" type="text/css" href="styles/style.css" />  
	</head>

	<body>
		<div id="main">
			<div id="main">
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
			<section>
				<div id="site_content">
					<div class="content">
						<img style="float: left; vertical-align: middle; margin: 0 10px 0 0;" src="images/logoCategorie.png" alt="home" />
						<h1 style="margin: 15px 0 0 0;">Votre catégorie d'âge en 2025 ! </h1>
						<br/><hr><br/>

						<?php
							// Récupération des données du formulaire
							// $nomVariable = $_POST['nom_contôle_html'];
							$prenom = $_POST['frm_prenom'];
							$genre = $_POST['frm_genre'];
							$dateNaiss = $_POST['frm_dateNaiss'];
							$saison = date("Y");
							if($genre=="F")
								{$libGenre="Femme"; $mess = "Vous serez inscrite dans la catégorie d'âge : "; } 
								else {$libGenre="Homme"; $mess = "Vous serez inscrit dans la catégorie d'âge : ";}
							$message = "Bonjour ".$prenom . " !<br/><br/>";
							$dateExplode = explode("-",$dateNaiss);
							$anneeNaiss = $dateExplode[0];
							$age = $saison - $anneeNaiss;
							$message = $message . "En 2025, vous allez avoir ".$age." ans.<br/>";
							
							if ($age<18) {
								$message = $message . "Vous serez mineur et ne pourrez pas encore être licencié !";
							} else if ($age<=19) {
								$message =$message . $mess . " JUNIOR ".$libGenre.", code JU".$genre." !";
							} else if ($age<=39) {
								$message =$message . $mess . " : SENOIR ".$libGenre.", code SE".$genre." !";
							} else if ($age<=99) {
								$message =$message . $mess . "  VETERAN ".$libGenre.", code VE".$genre." !";
							} else { $message = $message . "Vous serez Centenaitre et ne pouvez plus être licencié !";}
							echo "<h3>".$message."</h3>";
						?>
						<br/><br/>
						<img src="images/categorieTriathlon.jpg" class="logo"/>		
					</div>
				</div>
			</section>					
			<!-- Pied de la page -->
			<footer>
				<p>Copyright &copy; LRT-SLAM 2025 | <a href="#">Ligue Réunionnaise de Triathlon</a></p>
			</footer>
		</div>	  
	</body>
</html>
