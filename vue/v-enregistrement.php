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
          $id  = $_GET['id'];
          // $sql = "SELECT nomAuteur, datePublication, description, urlImage  FROM enregistrement WHERE id ='".$_GET['id']."'";    
          include "connexionServBD_local2.php"; //la méthode include sert uniquement pour cette page php en dehors de la classe pour lire directment la BD
          $sqlCount = "SELECT COUNT(*) FROM enregistrement";    
          $resultat2 = $bd2->query($sqlCount) or die (print_r($bd2->errorInfo(), true)) ;
      
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
            <img src="img/FG.png" width="250" height="300">
            
          </a>
          </th>
          <th>';
if ($consulterTuple->getCode()!=NULL){
          echo '       
            <div class="card bg-transparent" data-aos="zoom-in-up">
              <div class="bg-dark shadow rounded-5 p-0">

                        <img src="'.$consulterTuple->getUrlImage().'" width="582" height="327" alt="abstract image" class="img-fluid rounded-5 no-bottom-radius" loading="lazy">
                        <div class="p-5">
                          <h3 class="fw-lighter"> Le nom de la compétition est : '.$consulterTuple->getNom().'</h3>
                          <h4 class="fw-lighter"> '.$consulterTuple->getDescription().'</h3>
                          <h5 class="fw-lighter"> L évènement se déroulera le '.$consulterTuple->getVille().'</h3>
                          <h5 class="fw-lighter"> Notre partenaire (s il y en a) est : '.$consulterTuple->getSponsor().'</h3>
                          <h5 class="fw-lighter"> L évènement débutera le '.$consulterTuple->getDateDebut().'</h3>
                          <p class="pb-4 text-secondary">
                                      Posté par : '.$consulterTuple->getNomAuteur().' le '.$consulterTuple->getDatePublication().'</p>
                                                
                
                
              </div>
            </div>
          </div>
          </th>';

    //Pas faire de var_dump car risque d'altération des données.
    // var_dump($resultat2->fetchColumn(0));

    $idMax =  $resultat2->fetchColumn(0);
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

    if ($id >= $idMax) {
        $idLien = $idMax;
    } else {
        $idLien = $id + 1;
    }

      echo '<th><a href="index.php?id=' . $idLien . '">';        
        
      echo '<img src="img/FD.png" width="250" height="300">

            
          </a></th>
          </table>';  
                            // var_dump($_GET['id']);
                            // var_dump($idMax);

          }else{
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

              //Pas faire de var_dump car risque d'altération des données.
              // var_dump($resultat2->fetchColumn(0));

              $idMax =  $resultat2->fetchColumn(0);
              $id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

              if ($id >= $idMax) {
                  $idLien = $idMax;
              } else {
                  $idLien = $id + 1;
              }

                echo '<th><a href="index.php?id=' . $idLien . '">';        
                  
                echo '<img src="img/FD.png" width="250" height="300">

                      
                    </a></th>
                    </table>';  

                    }
                    include "footer.html";

      ?> 
      <!-- Le reste sera pour les privilèges utilsiateurs -->
                    <!-- '.$ligne["nom"].'
                    
                   
                   
                    <a href="consulterClub.php?codeClub='.$ligne['code'].'><img src=images/icon-MODIF.png class="logo"></a>
                    <a href="supprimerClub.php?codeClub='.$ligne['code'].'><img src=images/icon-SUPP.png class="logo">Supprimer un club</a>
                </tr>'; -->









