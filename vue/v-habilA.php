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
                    <th>code Postal</th>
                    <th>Ville</th>
                    <th>Président</th>
                    <th>Téléphone</th>
                    <th>Mail</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>";
                    // var_dump($consulterTuple->getId());

                echo " <tr>
                    <td>".$consulterTuple->getIdC()."</td>
                    <td>".$consulterTuple->getNomCompetition()."</td>
                    <td>".$consulterTuple->getDescription()."</td>
                    <td>".$consulterTuple->getVille()."</td>
                    <td>".$consulterTuple->getSponsor()."</td>
                    <td>".$consulterTuple->getDateDebut()."</td>
                    <td>".$consulterTuple->getNomAuteur()."</td>
                    <td>".$consulterTuple->getDatePublication()."</td>
                    <td><a href='consulterClub.php?codeClub=".$consulterTuple->getId()."'><img src=images/icon-MODIF.png class='logo'>Modifier une news</a></td>
                    <td><a href='supprimerClub.php?codeClub=".$consulterTuple->getId()."'><img src=images/icon-SUPP.png class='logo'>Supprimer une news</a></td>
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
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>";

                echo " <tr>
                    <td>".$consulterTuple->getIdC()."</td>
                    <td>".$consulterTuple->getNomCompetition()."</td>
                    <td>".$consulterTuple->getVille()."</td>
                    <td>".$consulterTuple->getSponsor()."</td>
                    <td>".$consulterTuple->getDateDebut()."</td>
                    <td><a href='index.php?action='modifN'&id=".$consulterTuple->getId()."'><img src=images/icon-MODIF.png class='logo'>Modifier une competition</a></td>
                    <td><a href='supprimerClub.php?action='modifN'&id=".$consulterTuple->getId()."'><img src=images/icon-SUPP.png class='logo'>Supprimer une competition</a></td>
                </tr>";
                echo"<td colspan='10'><a href=formAjoutClub.html><img src=images/icon-AJOUT.png class='logo'>Modifier une compétition</a></td>";
                echo"</table>";
                            // var_dump($_GET['id']);
                            // var_dump($idMax);

          } 
          include "footer.html";

      ?> 









