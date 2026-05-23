<?php
// session_start();
include 'modele/m-Enregistrement.php';
 ?>
          <?php

          //navigation des news, par défaut valeur de l'id à 1.
          if (!isset($_GET['id'])||($_GET['id']<=0)){
            $_GET['id'] = 1;
            // $_SESSION['id']=1;
          }
          var_dump($_GET['id']);
          $id  = $_GET['id'];
          // $sql = "SELECT nomAuteur, datePublication, description, urlImage  FROM enregistrement WHERE id ='".$_GET['id']."'";    
          include "connexionServBD_local2.php"; //la méthode include sert uniquement pour cette page php en dehors de la classe pour lire directment la BD
          // $resultat = $bd->query($sql) or die (print_r($bd->errorInfo(), true));
          // $sqlCount = "SELECT COUNT(*) FROM enregistrement";    
          // $resultat2 = $bd2->query($sqlCount) or die (print_r($bd2->errorInfo(), true)) ;
          //           var_dump($resultat2->fetchColumn(0));
          $consulterTuple = new Enregistrement($id, NULL, NULL, NULL, NULL, NULL);
          $consulterTuple->retrieve($id);
          // var_dump($resultat);

            //Mise en place de la distributivité des news.
// while ($ligne = $resultat->fetch()) 
//     {
                  // Mise en place du défilement des boutosn pour le carrousel. J'aligne les boutons et les news.
//Limite de l'id

    echo ' <table> 
    <th> <a href="index.php?id=';
    if ($_GET['id'] > 1){
      echo $_GET['id']  - 1;
    }
    else{
      echo $_GET['id']=1;
      } 
    echo '">
            <img src="images/icon-MODIF.png" class="logo">
            Modifier un club
          </a>
          </th>
          <th>';

          echo '       
            <div class="card bg-transparent" data-aos="zoom-in-up">
              <div class="bg-dark shadow rounded-5 p-0">

                <img src="'.$consulterTuple->getUrlImage().'" width="582" height="327" alt="abstract image" class="img-fluid rounded-5 no-bottom-radius" loading="lazy">
                <div class="p-5">
                  <h4 class="fw-lighter"> '.$consulterTuple->getDescription().'</h3>
                  <p class="pb-4 text-secondary">
                              Posté par : '.$consulterTuple->getNomAuteur().' le '.$consulterTuple->getDatePublication().'</p>
                
                
              </div>
            </div>
          </div>
          </th>';
        echo'<th><a href="index.php?id=';
        // $idMax = $resultat2->fetchColumn(0);
        if($_GET['id']>$idMax){
          // print 'Limite des actualités dépassée';
          echo $_GET['id']-- ;
        }
        else{
          echo $_GET['id']++ ;
        };
        
        
        echo '">
            <img src="images/icon-MODIF.png" class="logo">
            Modifier un club
          </a></th>
          </table>';  
          
          // } 
          include "footer.html";

      ?> 
      <!-- Le reste sera pour les privilèges utilsiateurs -->
                    <!-- '.$ligne["nom"].'
                    
                   
                   
                    <a href="consulterClub.php?codeClub='.$ligne['code'].'><img src=images/icon-MODIF.png class="logo">Modifier un club</a>
                    <a href="supprimerClub.php?codeClub='.$ligne['code'].'><img src=images/icon-SUPP.png class="logo">Supprimer un club</a>
                </tr>'; -->









