<?php

class Competition
{
    //Déclaration des attributs de la classe
    private $_id;                 //l'identifiant du club
    private $_titre;
    private $_date;
    private $_nom;

    //Déclaration du constructeur
    public function __construct($idTuples, $titreTuples,  $dateDebutCompetition, $nomAuteur)    // A compléter
    {
        $this->_id = $idTuples;       // Initialisation de l'identifiant de cet objet
        $this->_titre = $titreTuples;
        $this->_date = $dateDebutCompetition;
        $this->_nom = $nomAuteur;
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
    public function read()
    {
        // la fonction ne sert pas ici car on peut directement lire la BD via php par la méthode include......DB
    }

    // Recuperation et affichage d'un club saisis dans un formulaire.
    public function retrieve()//argument $codeClub
    {
        require_once "connexionServBD.php";
        
        // $sql = "SELECT (nom, adresseRue, codePostal, ville, nomPresident, numTelephone) FROM club WHERE code='".$this->_code; 
        //On va devoir faire $this->_trucmuche
        echo "récuperation de la BD ";
        $sql = "SELECT code, nom, adresseRue, codePostal, ville, nomPresident, numTelephone, mail FROM club WHERE code='" . $_GET['codeClub'] . "'";

        $resultat = $bd->query($sql) or die (print_r($bd->errorInfo(), true));
        $ligne = $resultat->fetch(); // <- important fetch c'est bo ntant que $ligne existe
        // $codeClub = $ligne['code'];
        $this->_code = $ligne['code'];      
        $this->_nom = $ligne['nom']; 
        $this->_adresseRue = $ligne['adresseRue'];
        $this->_codePostal = $ligne['codePostal'];
        $this->_ville = $ligne['ville'];
        $this->_nomPresident = $ligne['nomPresident'];
        $this->_numTelephone = $ligne['numTelephone'];
        $this->_mail = $ligne['mail'];
        // echo $ligne['code'];
    }
    public function update($codeClub){
        require_once "connexionServBD.php";
        //il faut envoyer nouvelle données du $POST.
        
        $sql = "UPDATE club SET  nom='".$this->_nom."', adresseRue='".$this->_adresseRue."', codePostal='".$this->_codePostal."', ville='".$this->_ville."', nomPresident='".$this->_nomPresident."', numTelephone='".$this->_numTelephone."', mail='".$this->_mail."'  WHERE code='" .$codeClub. "'";

        $bd->exec($sql) or die (print_r($bd->errorInfo(), true));

    }

    //On va afficher dans formulaire HTML
    public function getId() {
        return $this->_id; //Affichage de données de formulaire
    }  

    public function getTitre() {//argument $codeClub
        return $this->_nom;
    }

    public function getDescription()//argument $codeClub
        {
            return $this->_dateDebut;
        }
    public function getDatePublication()//argument $codeClub
        {
            return $this->_codePostal;
        }
    public function getNomAuteur()//argument $codeClub
        {
            return $this->_ville;
        }
    public function retreive(){

    }
    public function delete($codeClub)
        {
            require_once "connexionServBD.php";
            $sql = "DELETE FROM club WHERE code='$codeClub'";
            $bd->exec($sql) or die (print_r($bd->errorInfo(), true));

        }
}



    

?>