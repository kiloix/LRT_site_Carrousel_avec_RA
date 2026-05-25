<?php
require_once "../connexionServBD_local2.php";
require_once "../connexionServBD_local3.php";
$id = $_POST['frm_utilisateur'] ;
$shaMdpSaisi = $_POST['frm_mdp'];


$sql2 = "SELECT COUNT(*) FROM utilisateurs WHERE motdepasse=sha1('".$shaMdpSaisi."') AND id='".$id."' AND habil='E'";
$result = $bd2->query($sql2) or die(print_r($connexionBD->errorInfo(), true));  																				
$ligne2=$result->fetchColumn();

$sql3 = "SELECT COUNT(*) FROM utilisateurs WHERE motdepasse=sha1('".$shaMdpSaisi."') AND id='".$id."'AND habil='A'";
$result = $bd3->query($sql3) or die(print_r($connexionBD->errorInfo(), true));  																				
$ligne3=$result->fetchColumn();

if ($ligne2 == 1){
        header("Location: ../index.php?action=habilE");
}else if ($ligne3 == 1){
        header("Location: ../index.php?action=habilA");
} else {
    header('Location: ../systemEchec.html');
}




















?>
