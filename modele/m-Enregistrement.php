<?php
include_once 'modele/m-Competition.php';

class Enregistrement extends Competition
{
    //Déclaration des attributs de la classe
    private $_idE;                 //l'identifiant du club
    private $_titre;
    private $_dateE;
    private $_description;
    private $_url;
    private $_nomE;

    //Déclaration du constructeur
    public function __construct($idTuples, $titreTuples,  $descriptionTuple, $urlImage, $nomAuteur, $dateDebut)    // A compléter
    {
        $this->_idE = $idTuples;       // Initialisation de l'identifiant de cet objet
        $this->_titre = $titreTuples;
        $this->_description = $descriptionTuple;
        $this->_url = $urlImage;
        $this->_dateE = $dateDebut;
        $this->_nomE = $nomAuteur;
    }
    

    
    //Déclaration de la méthode publique 'create()' qui permet d'ajouter un nouveau club à la BD
    public function create()
    {
        // Sert à la connexion à la base de données 
        require_once "connexionServBD.php";
        // La variable sql permet d'insérer les varaibles dans les attributs qui leur est attribuées.
        $sql = "INSERT INTO club (code, nom, adresseRue, codePostal, ville, nomPresident, numTelephone, mail, urlSiteWeb) 
                VALUES ('".$this->_code."', '".$this->_nom."', '".$this->_adresseRue."', '".$this->_codePostal."', '".$this->_ville."', '".$this->_nomPresident."', '".$this->_numTelephone."', '".$this->_mail."', '".$this->_urlSiteWeb."');";    // A compléter
        // Cette ligne permet d'executer la lecture de la base de donnée.
        $bd->exec($sql) or die(print_r($bd->errorInfo(), true));
        
    }

    //     public function verif($id)
    // {
    //     require "connexionServBD_local4.php";
    //     $sql4 = 'SELECT COUNT(code) FROM competition
    //     INNER JOIN enregistrement ON enregistrement.id= competition.idEnregistrement 
    //     WHERE competition.idEnregistrement ='.$id.' ; ';
    //     $resultat4 = $bd4->query($sql4) or die (print_r($bd4->errorInfo(), true)) ;
    //     return $resultat4->fetchColumn(0);
    // }
        public function verifEFetch()
    {
        require "connexionServBD_local4.php";
        $sql4 = 'SELECT id, nomAuteur, datePublication, description, urlImage  
         FROM enregistrement
        WHERE id NOT IN 
        (SELECT id FROM enregistrement
        INNER JOIN competition ON enregistrement.id= competition.idEnregistrement 
        WHERE competition.idEnregistrement IS NOT NULL);';
        // -- GROUP BY competition.idEnregistrement IN (SELECT code FROM competition
        // -- INNER JOIN enregistrement ON enregistrement.id= competition.idEnregistrement WHERE competition.idEnregistrement IS NOT NULL) ; ;
        $resultat4 = $bd4->query($sql4) or die (print_r($bd4->errorInfo(), true)) ;
        return $resultat4->fetchColumn(0);
    }

    // Recuperation et affichage d'un club saisis dans un formulaire.

    public function retrieve($id = null)
    {
        if($id!=NULL){
            require "connexionServBD_local4.php";
            //Etape de verification des news si c'est une compettion ou news classique.
            $sql4 = 'SELECT COUNT(code) FROM competition
            INNER JOIN enregistrement ON enregistrement.id= competition.idEnregistrement 
            WHERE competition.idEnregistrement ='.$id.' ; ';
            $resultat4 = $bd4->query($sql4) or die (print_r($bd4->errorInfo(), true)) ;
            
            if ($resultat4->fetchColumn(0) == 1){
                require "connexionServBD_local.php";
                $consulterCompet = new Competition($id, NULL, NULL, NULL, NULL, NULL);

                $sql = "SELECT competition.code, competition.ville, competition.nom, competition.dateDebut, competition.idSponsor, enregistrement.nomAuteur,  enregistrement.datePublication,  enregistrement.description,  enregistrement.urlImage 
                FROM enregistrement 
                INNER JOIN competition ON enregistrement.id= competition.idEnregistrement 
                WHERE id ='".$id."';";
                        

                $resultat = $bd->query($sql) or die (print_r($bd->errorInfo(), true));
                $ligne = $resultat->fetch(); // <- important fetch c'est bo ntant que $ligne existe
                $this->_idC = $ligne['code'];      
                $this->_ville = $ligne["ville"];
                $this->_nomC = $ligne["nom"];
                $this->_dateC = $ligne["dateDebut"];
                $this->_sponsor = $ligne["idSponsor"];
                $this->_url = $ligne["urlImage"];
                $this->_nomE = $ligne["nomAuteur"];
                $this->_dateE = $ligne["datePublication"];
                $this->_description = $ligne["description"];
                
                        $sql = "SELECT code, ville, nom, idClub, dateDebut, idSponsor  FROM competition WHERE idEnregistrement ='".$id."'";

                        $resultat = $bd->query($sql) or die (print_r($bd->errorInfo(), true));
                        $ligne = $resultat->fetch(); // <- important fetch c'est bo ntant que $ligne existe
                                    $consulterTuple = new Enregistrement($id, NULL, NULL, NULL, NULL, NULL);

                // $consulterCompet->retrieve($id);

                        //    foreach ($ligne as $data){
                        //     return $ligne[$data];
                        // }
            }else if ($resultat4->fetchColumn(0) == 0){
                require "connexionServBD_local.php";
                //On va devoir faire $this->_trucmuche
                $sql = "SELECT id, nomAuteur, datePublication, description, urlImage  FROM enregistrement WHERE id ='".$id."'";

                $resultat = $bd->query($sql) or die (print_r($bd->errorInfo(), true));
                $ligne = $resultat->fetch(); // <- important fetch c'est bo ntant que $ligne existe
                // $codeClub = $ligne['code'];
                // $this->_id = $ligne['code'];
                $this->_idC = NULL;      
                $this->_ville = NULL;
                $this->_nomC = NULL;
                $this->_dateC = NULL;
                $this->_sponsor = NULL;      
                $this->_url = $ligne["urlImage"];
                $this->_nomE = $ligne["nomAuteur"];
                $this->_dateE = $ligne["datePublication"];
                $this->_description = $ligne["description"];
            }
        }else if ($id == NULL){
            require "connexionServBD_local2.php";
            $sql2 = 'SELECT id, nomAuteur, datePublication, description, urlImage  
         FROM enregistrement
        WHERE id NOT IN 
        (SELECT id FROM enregistrement
        INNER JOIN competition ON enregistrement.id= competition.idEnregistrement 
        WHERE competition.idEnregistrement IS NOT NULL)';
            $resultat2 = $bd2->query($sql2) or die (print_r($bd2->errorInfo(), true)) ;
            $ligne = $resultat2->fetch(); // <- important fetch c'est bo ntant que $ligne existe

            $this->_url = $ligne["urlImage"];
            $this->_nomE = $ligne["nomAuteur"];
            $this->_dateE = $ligne["datePublication"];
            $this->_description = $ligne["description"];
        }
    }
    
    public function update($codeClub){
        require_once "connexionServBD.php";
        //il faut envoyer nouvelle données du $POST.
        
        $sql = "UPDATE club SET  nom='".$this->_nom."', adresseRue='".$this->_adresseRue."', codePostal='".$this->_codePostal."', ville='".$this->_ville."', nomPresident='".$this->_nomPresident."', numTelephone='".$this->_numTelephone."', mail='".$this->_mail."'  WHERE code='" .$codeClub. "'";

        $bd->exec($sql) or die (print_r($bd->errorInfo(), true));

    }

    //On va afficher dans formulaire HTML
    public function getId() {
        return $this->_idE; //Affichage de données de formulaire
    }  

    public function getTitre() {
        return $this->_titre;
    }

    public function getDescription()
        {
            return $this->_description;
        }
    public function getDatePublication()
        {
            return $this->_dateE;
        }
    public function getNomAuteur()
        {
            return $this->_nomE;
        }
    public function getUrlImage()
        {
            return $this->_url;
        }
    public function delete($codeClub)
        {
            require_once "connexionServBD.php";
            $sql = "DELETE FROM club WHERE code='$codeClub'";
            $bd->exec($sql) or die (print_r($bd->errorInfo(), true));

        }
}



    

?>