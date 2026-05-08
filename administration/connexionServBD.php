<?php
	// Script de Connexion au serveur de BD MySQL et à une base de données spécifique
	
	//Initialisation des données de connexion
	$nomServeur = "172.18.155.181"; 	//identifiant du serveur hôte de base de données (adresse IP ou nom de domaine du serveur de BD)
	$nomUtil = "sio1_David";		//nom de l'utilisateur ayant des droits de connexion au serveur hôte
	$mdpUtil = "12-Soleil&LEO";		//mot de passe de l'utilisateur ayant les droits
	$nomBD = "LRT_David";			//nom de la BD sur laquelle sera établi la connexion
	
	//Etablissement de la connexion
 try {
        $bd = new PDO("mysql:host=$nomServeur;dbname=$nomBD", $nomUtil, $mdpUtil);
        //Definition du mode d'erreur de PDO sur Exception
        $bd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connexion établie !";
    }
    
    //Capture des exceptions et affichage des informations de celles-ci
    catch(PDOException $e) {
        echo "<h4>Erreur de connexion : </h4>" .$e->getMessage();
    }                   
?>