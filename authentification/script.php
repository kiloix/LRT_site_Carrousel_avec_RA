<?php
require_once "../connexionServBD.php";
$nom = $_POST['frm_utilisateur'] ;
$shaMdpSaisi = $_POST['frm_mdp'];
$sql = "SELECT COUNT(*) FROM utilisateurs WHERE motdepasse='".$shaMdpSaisi."' AND id='".$nom."'";
$result = $bd->query($sql) or die(print_r($connexionBD->errorInfo(), true));  																				
$ligne=$result->fetchColumn();
echo $ligne;
 if ($ligne == 1) {
    header("Location: ../accueilBO.html");
} 
if ($ligne == 0) {
    header('Location: ../systemEchec.html');
}




















?>
