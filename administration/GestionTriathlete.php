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
          <h1>Gestion des Triathletes</h1>
          <?php
          //non plus
          // $resultat_14 = 14;
          $sql="SELECT id, numLicence, nom, prenom, adresseRue, codePostal, ville, dateNaissance, mail, codeClub, codeCategorie FROM triathlete";
          require_once "connexionServBD.php";
          $resultat = $bd->query($sql) or die (print_r($bd->errorInfo(), true)); //egale qqch pr definir
          echo"<table>
          <td>
          <tr>
                    <th>id</th>
                    <th>numero de licence</th>
                    <th>nom</th>
                    <th>prenom</th>
                    <th>adresse Rue</th>
                    <th>code postal</th>
                    <th>ville</th>
                    <th>date de naissance</th>
                    <th>Mail</th>
                    <th>code du club</th>
                    <th>code de categorie</th>
                    <th>Consultation</th>
                </tr>";
            while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) //fetch() pour demander à BD la requête SQL ||||||
            {
              echo"<tr>
              <td>".$ligne['id']."</td>
              <td>".$ligne['numLicence']."</td>
              <td>".$ligne['nom']."</td>
              <td>".$ligne['prenom']."</td>
              <td>".$ligne['adresseRue']."</td>
              <td>".$ligne['codePostal']."</td>
              <td>".$ligne['ville']."</td>
              <td>".$ligne['dateNaissance']."</td>
              <td>".$ligne['mail']."</td>
              <td>".$ligne['codeClub']."</td>
              <td>".$ligne['codeCategorie']."</td>
              <td><a href=consulterTria.php?codeTriathlete=".$ligne['id']."><img src=images/icon-MODIF.png class='logo'>Voir un Triathlete</a></td>
              </tr>";
            }
            echo"</table>";
              
                            
                  

          ?>
        </div>
      </div>
    </section>
  </div>  
</body>
</html>
