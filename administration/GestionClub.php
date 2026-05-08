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
          <h1>Gestion des Clubs</h1>
          <?php
          //non plus
          // $resultat_14 = 14;
            $sql = "SELECT code, nom, adresseRue, codePostal, ville, nomPresident, numTelephone, mail FROM club";    
            // ici non car ce nest pas ce qui est demandé
            // $sql_rowspan = "SELECT COUNT(*) FROM club";    
            include "connexionServBD.php"; //la méthode include sert uniquement pour cette page php en dehors de la classe pour lire directment la BD
            $resultat = $bd->query($sql) or die (print_r($bd->errorInfo(), true));
            //C'est un traitement , ce n'est pas un type string mais une RECUPERATION  de variable -----> $resultat_colspan = $bd->query($sql_colspan) or die (print_r($bd->errorInfo(), true));
            echo " <table>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Adresse Rue</th>
                    <th>code Postal</th>
                    <th>Ville</th>
                    <th>Président</th>
                    <th>Téléphone</th>
                    <th>Mail</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>";
    
            while ($ligne = $resultat->fetch()) 
                {
                echo " <tr>
                    <td>".$ligne['code']."</td>
                    <td>".$ligne['nom']."</td>
                    <td>".$ligne['adresseRue']."</td>
                    <td>".$ligne['codePostal']."</td>
                    <td>".$ligne['ville']."</td>
                    <td>".$ligne['nomPresident']."</td>
                    <td>".$ligne['numTelephone']."</td>
                    <td>".$ligne['mail']."</td>
                    <td><a href='consulterClub.php?codeClub=".$ligne['code']."'><img src=images/icon-MODIF.png class='logo'>Modifier un club</a></td>
                    <td><a href='supprimerClub.php?codeClub=".$ligne['code']."'><img src=images/icon-SUPP.png class='logo'>Supprimer un club</a></td>
                </tr>";
              } 
                echo"<td colspan='10'><a href=formAjoutClub.html><img src=images/icon-AJOUT.png class='logo'>Ajouteur un club</a></td>";
                echo"</table>";
                // <td>".$this->_nom."</td>
                // <td>".$this->_adresseRue."</td>
                // <td>".$this->_codePostal."</td>
                // <td>".$this->_ville."</td>
                // <td>".$this->_nomPresident."</td>
                // <td>".$this->_numTelephone."</td>
                // <td>".$this->_mail."</td>
                // <td><a href='consulterClub.php?codeClub=".$ligne['code']."'><img src=images/icon-MODIF.png class='logo'>Afficher un club</a></td>



            
              
                            
                  

          ?>
        </div>
      </div>
    </section>
  </div>  
</body>
</html>
