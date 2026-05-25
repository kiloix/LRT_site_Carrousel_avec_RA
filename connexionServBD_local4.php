<?php
	// Script de Connexion au serveur de BD MySQL et à une base de données spécifique
	
	//Initialisation des données de connexion
	$nomServeur = "127.0.0.1"; 	//identifiant du serveur hôte de base de données (adresse IP ou nom de domaine du serveur de BD)
	$nomUtil = "root";		//nom de l'utilisateur ayant des droits de connexion au serveur hôte
	$mdpUtil = "";		//mot de passe de l'utilisateur ayant les droits
	$nomBD = "lrt_david";			//nom de la BD sur laquelle sera établi la connexion
	
	//Etablissement de la connexion
	try {
		$bd4 = new PDO("mysql:host=$nomServeur;dbname=$nomBD", $nomUtil, $mdpUtil);
		//Definition du mode d'erreur de PDO sur Exception
		$bd4 -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	
	//Capture des exceptions et affichage des informations de celles-ci
	catch(PDOException $e) {
		echo "<h4>Erreur de connexion : </h4>" .$e->getMessage();
	}					
?>