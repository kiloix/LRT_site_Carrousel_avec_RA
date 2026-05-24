<?php
require_once "../connexionServBD_local.php";
$id = $_POST['frm_utilisateur'] ;
$shaMdpSaisi = $_POST['frm_mdp'];

$sql = "SELECT COUNT(*) FROM utilisateurs WHERE motdepasse=sha1('".$shaMdpSaisi."') AND id='".$id."'";
$result = $bd->query($sql) or die(print_r($connexionBD->errorInfo(), true));  																				
$ligne=$result->fetchColumn();

if ($ligne == 1) {
    header("Location: ../acceuilBO.html");
} else {
    header('Location: ../systemEchec.html');
}




















?>
