<?php
// session_start();
include 'modele/m-Enregistrement.php';
 ?>
          <?php

          //navigation des news, par défaut valeur de l'id à 1.
          // if (!isset($_GET['id'])||($_GET['id']<=0)){
          //   $_GET['id'] = 1;
          //   // $_SESSION['id']=1;
          // }
          // $id  = $_GET['id'];
          // $sql = "SELECT nomAuteur, datePublication, description, urlImage  FROM enregistrement WHERE id ='".$_GET['id']."'";    
          include "connexionServBD_local2.php"; //la méthode include sert uniquement pour cette page php en dehors de la classe pour lire directment la BD
          $consulterTuple = new Enregistrement(NULL, NULL, NULL, NULL, NULL, NULL);
          

                            $consulterTuple->retrieve();


        //   if (isset($consulterT<uple->verifCFetch())){
        if ($consulterTuple->getIdC()==NULL){

            echo "<h1>Partie competition</h1>";
            echo " <table>
                <tr>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Adresse Rue</th>
                    <th>Président</th>
                    <th>Téléphone</th>
                    <th>Mail</th>
                </tr>";
                    // var_dump($consulterTuple->getId());

                echo " <tr>
                    <td>".$consulterTuple->getId()."</td>
                    <td>".$consulterTuple->getTitre()."</td>
                    <td>".$consulterTuple->getDescription()."</td>
                    <td>".$consulterTuple->getVille()."</td>
                    <td>".$consulterTuple->getSponsor()."</td>
                    <td>".$consulterTuple->getDateDebut()."</td>
                    <td>".$consulterTuple->getNomAuteur()."</td>
                    <td>".$consulterTuple->getDatePublication()."</td>
                </tr>";
                echo"<td colspan='10'><a href=formAjoutClub.html><img src=images/icon-AJOUT.png class='logo'>Ajouteur une news</a></td>";
                echo"</table>";
        //   }
        // if (isset($consulterTuple->verifEFetch())){
        }
          $consulterTuple->fetchAll();

        if ($consulterTuple->getIdC()!=NULL){
            echo "<h1>Partie news</h1>";
            echo " <table>
                <tr>
                    <th>Id</th>
                    <th>NomCompétition</th>
                    <th>Ville</th>
                    <th>Sponsor</th>
                    <th>Date</th>
                </tr>";

                echo " <tr>
                    <td>".$consulterTuple->getIdC()."</td>
                    <td>".$consulterTuple->getNomCompetition()."</td>
                    <td>".$consulterTuple->getVille()."</td>
                    <td>".$consulterTuple->getSponsor()."</td>
                    <td>".$consulterTuple->getDateDebut()."</td>
                </tr>";
                echo"</table>";
                echo"<td colspan='10'><a href=formAjoutClub.html><img src=images/icon-AJOUT.png class='logo'>Ajouteur une competition</a></td>";

                            // var_dump($_GET['id']);
                            // var_dump($idMax);

          } 
          include "footer.html";

      ?> 









