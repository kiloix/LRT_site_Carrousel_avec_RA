<?php
									
	require_once "../administration/connexionServBD.php";
	require_once "../archive/authentification-v0.php";
	$sql = "SELECT COUNT(*) FROM Utilisateurs WHERE motdepasse='".sha1($shaMdpSaisi)."' AND id='".$nom."'";
	$result = $bd->query($sql) or die(print_r($connexionBD->errorInfo(), true));  																				
	$ligne=$result->fetchColumn();
	$nom = $_POST['frm_nom'] ;
	$shaMdpSaisi = $_POST['frm_mdp'];

	session_start();
	$_SESSION['nomUtil'] = $nom;
	$_SESSION['MotDePasse'] = $shaMdpSaisi ;
	echo $_SESSION['MotDePasse'];

	// if (isset ($_SESSION['nomUtil']) && isset($_SESSION['MotDePasse'])) {
	// 	header('Location: acceuilBO.html');
	// } else {
	// 	header("Location: ../index.html");
	// }
?>




