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
          $consulterTuple = new Enregistrement(NULL, NULL, NULL, NULL, NULL, NULL);
          

            include 'modele/m-Competition.php';

            $consulterCompet = new Competition(NULL, NULL, NULL, NULL, NULL, NULL);
            $consulterCompet->retrieve($id);


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
    
            while ($consulterTuple->retrieve($id)()) 
                {
                echo " <tr>
                    <td>".$consulterTuple->getUrlImage()."</td>
                    <td>".$consulterCompet->getNomCompetition()."</td>
                    <td>".$consulterTuple->getDescription()."</td>
                    <td>".$consulterCompet->getVille()."</td>
                    <td>".$consulterCompet->getSponsor()."</td>
                    <td>".$consulterCompet->getDateDebut()."</td>
                    <td>".$consulterTuple->getNomAuteur()."</td>
                    <td>".$consulterTuple->getDatePublication()."</td>
                    <td><a href='consulterClub.php?codeClub=".$consulterTuple->getId()."'><img src=images/icon-MODIF.png class='logo'>Modifier un club</a></td>
                    <td><a href='supprimerClub.php?codeClub=".$consulterTuple->getId()."'><img src=images/icon-SUPP.png class='logo'>Supprimer un club</a></td>
                </tr>";
              } 
                echo"<td colspan='10'><a href=formAjoutClub.html><img src=images/icon-AJOUT.png class='logo'>Ajouteur un club</a></td>";
                echo"</table>";
                            // var_dump($_GET['id']);
                            // var_dump($idMax);

          // } 
          include "footer.html";

      ?> 
      <!-- Le reste sera pour les privilèges utilsiateurs -->
                    <!-- '.$ligne["nom"].'
                    
                   
                   
                    <a href="consulterClub.php?codeClub='.$ligne['code'].'><img src=images/icon-MODIF.png class="logo"></a>
                    <a href="supprimerClub.php?codeClub='.$ligne['code'].'><img src=images/icon-SUPP.png class="logo">Supprimer un club</a>
                </tr>'; -->









