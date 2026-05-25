<?php
session_start();
?>

          <?php
include "menu.html";

if(isset ($_GET["action"])){
    $action = strtolower($_GET['action']);

}else{
    $action='init';
}

include 'controleur/a-'.$action.'.php'; 
//modele ici
// include 'modele/m-'.$modele.'.php'; 


include 'vue/v-'.$etat.'.php'; 


?>







