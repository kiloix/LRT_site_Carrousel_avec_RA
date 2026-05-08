<!DOCTYPE HTML>
<html>
<head>  
  <title>LRT</title>

  <link rel="shortcut icon" href="images/back-office.png">
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="style.css">  
</head>

<body>  
  <div id="main">
    <header>      
      <div id="logo">
        <div id="logo_text">
        <a href="http://www.fftri.com" target="_blank"><img src="logo_accueil.png" alt="Fédération Française de Triathlon"></a>
          <h1><a href="..\index.html">BACK OFFICE DE LA LRT <span class="logo_colour">TRIATHLON</span></a></h1>
          <h2>Ligue réunionnaise de triathlon</h2>					  
        </div>
      </div>
      <nav>
        <div id="menu_container">
          <ul class="sf-menu" id="nav">
            
              
            </li>
            <li><a href="acceuilBO.html">ACCEUIL</a></li>
            <li><a href="GestionClub.php">Gestion Des Clubs</a></li>								
            <li><a href="formAjoutTriathlete.html">Gestion Des Triathlètes</a></li>								
            <li><a href="#">Gestion Des Categories</a></li>								
            <li><a href="../index.html">EXIT</a></li>

          </ul>
        </div>
      </nav>
  </header>
    
    <section>
      <div id="site_content">
        <div class="content">
<?php
    // On doit faire appelle à la récuperatio ndu code club
    // Pour chaque objet, il faut les associer à une requête SQL pour faire la recup et le catch...
    require_once "ClubManager.php";
    // include "connexionServBD.php"; //la méthode include sert uniquement pour cette page php en dehors de la classe pour lire directment la BD
    
    $codeClub = $_GET['codeClub']; //C'est suelemnt cet objet qu'on get car...clé primaire ? & car écrit dans consigne donc cassa pas la tête
    $consulterClub = new ClubManager($codeClub, NULL, NULL, NULL,NULL,NULL,NULL,NULL,NULL); // seulment code car on voulait une transmission URL.
    //$consulterCLub est un tableau qui va questionner les méthodes ci-après.
    $consulterClub->retrieve();// Il questionne la méthode retrieve.
    echo"execution fichier CONSULTERCLUB.php ";
    // echo "codeClub=".$ligne['code']; <- Ma version c'est bon 
    //on attend un $consulterClub=... return# int |||| Non car il faut qu'il ait une construction de cette variable. 
    echo"récuperation des informations du club";
    echo"creation des informations du tableau"; 
    ?>
    <form name="formAuthentfication" method="POST" action="modifierClub.php">  <!-- Cette ligne est utilisée pour envoyer toutes les variabls ci-dessous du formulaire ne mode POST à la page modifierClub.php -->
      <fieldset>
        <legend>Souhaiteriez-vous les informations de ce club concenrant... :</legend>
        <?php echo"<input type='text' name='frm_codeClub' value='".$consulterClub->getCode()."'hidden>";?></br>
        <?php echo"Nom Club : <input type='text' name='frm_nom' value='".$consulterClub->getNom()."' >";?></br>
        <?php echo"Adresse : <input type='text' name='frm_adresseRue' value='".$consulterClub->getAdresseRue()."' >";?></br>
        <?php echo"code Postal : <input type='text' name='frm_codePostal' value='".$consulterClub->getCodePostal()."' >";?></br>
        <?php echo"Ville : <input type='text' name='frm_ville' value='".$consulterClub->getVille()."' >";?></br>
        <?php echo"Nom President : <input type='text' name='frm_nomPresident' value='".$consulterClub->getNomPresident()."' >";?></br>
        <?php echo"Numéro de téléphone : <input type='text' name='frm_numTelephone' value='".$consulterClub->getNumTelephone()."' >";?></br>
        <?php echo"Adresse mail : <input type='text' name='frm_mail' value='".$consulterClub->getMail()."' >";?></br>
        <?php echo"<input type='text' name='frm_URL' value='".$consulterClub->getURL()."' hidden >";?></br>
        <input type='submit' class='button' value='Envoyer'  > </a></br>
        </fieldset>
      </form>
      <!-- Ce formulaire est correct ^^^^^^^^^^ -->

        <!-- $sql = "SELECT code FROM club WHERE code='" . $_GET['codeClub'] . "'";    //|||||||||||||
        $resultat = $bd->query($sql) or die (print_r($bd->errorInfo(), true)); //|||||||||||||
       while ($ligne = $resultat->fetch()) { //|||||||||||||
       echo"<input   <a href='modifierClub.php?codeClub=".$ligne['code']."'   type='submit' class='button' value='Envoyer' >"; // Cette ligne pose problème.
// }//|||||||||||||?> -->
    <!-- </p>';           -->









