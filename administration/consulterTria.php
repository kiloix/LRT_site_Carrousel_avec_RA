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
    require_once "TriathleteManager.php";
    $licenceTria=$_GET['numLicence'];
    echo $licenceTria;

    $consulterTria = NEW TriathleteManager($licenceTria, NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
    $consulterTria->retrieve($licenceTria)
        ?>
    <form name="formAuthentfication" method="POST" action="modifierClub.php">  <!-- Je créer mon forumaire de visualisation et de modification --> 
    <fieldset>
        <legend>Souhaiteriez-vous les informations de ce club concenrant... :</legend>
        <?php echo"licence :<input  type='text' name='frm_licence' value='".$consulterTria->get_licence()."'hidden>";?></br>
        <?php echo"Nom:<input type='text' name='frm_nom' value='".$consulterTria->get_nom()."'disabled>";?></br>
        <?php echo"Prenom:<input type='text' name='frm_prenom' value='".$consulterTria->get_prenom()."'disabled>";?></br>
        <?php echo"Genre :<input type='text' name='frm_prenom' value='".$consulterTria->get_genre()."'disabled>";?></br>
        <?php echo"adresse Rue :<input type='text' name='frm_adresseRue' value='".$consulterTria->get_adresseRue()."'disabled>";?></br>
        <?php echo"code Postal :<input type='text' name='frm_codePostal' value='".$consulterTria->get_codePostal()."'disabled>";?></br>
        <?php echo"ville :<input type='text' name='frm_ville' value='".$consulterTria->get_ville()."'disabled>";?></br>
        <?php echo"date Naissance :<input type='text' name='frm_dateNaissance' value='".$consulterTria->get_dateNaissance()."'disabled>";?></br>
        <?php echo"Mail :<input type='text' name='frm_dateNaissance' value='".$consulterTria->get_mail()."'disabled>";?></br>
        <?php echo"code CLub :<input type='text' name='frm_codeClub' value='".$consulterTria->get_codeClub()."'disabled>";?></br>
        <?php echo"code Categorie :<input type='text' name='frm_codeCategorie' value='".$consulterTria->get_codeCategorie()."'disabled>";?></br>
        </fieldset>
      </form>






