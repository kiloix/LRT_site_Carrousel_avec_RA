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
							<li><a href="sio1_David/contact.html">CONTACT</a></li>
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


                                    <?php 
										$nomUtil='jm.Cocanalp%25';
										$mdpUtil='12-Soleil&BOLRT';
										$le_nom= $_POST['frm_nom'];	
										$mdp= $_POST['frm_mdp'];	
										// header("Location : acceuilBO.html");							
										//require_once "acceuilBO.html";
										
										if ($le_nom == $nomUtil  && $mdp == $mdpUtil){ 
											// Le triathlète A fournit des informations correctes et PEUT accéder à la page de gestion des entrainements    
											header("Location: acceuilBO.html");											
											//     Le triathlète N'A PAS fournit des informations correctes et NE PEUT PAS accéder à la page de gestion des entrainements    
										}else{
											header('Location: formEchecAuthen.html');
										}
										
                                    ?>
								</p>
								<span style="color:red">*</span> <span style="font-style:italic ; font-size:smaller">champs obligatoires</span> 
							</fieldset>
						</form>
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
