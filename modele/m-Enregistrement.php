<?php
class Enregistrement
{
    //Déclaration des attributs de la classe
    private $_id;                 //l'identifiant du club
    private $_titre;
    private $_date;
    private $_description;
    private $_url;
    private $_nom;

    //Déclaration du constructeur
    public function __construct($idTuples, $titreTuples,  $descriptionTuple, $urlImage, $nomAuteur, $dateDebut)    // A compléter
    {
        $this->_id = $idTuples;       // Initialisation de l'identifiant de cet objet
        $this->_titre = $titreTuples;
        $this->_description = $descriptionTuple;
        $this->_url = $urlImage;
        $this->_date = $dateDebut;
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
    public function retrieve($id)
    {
        require_once "connexionServBD_local.php";
        //On va devoir faire $this->_trucmuche
        $sql = "SELECT nomAuteur, datePublication, description, urlImage  FROM enregistrement WHERE id ='".$id."'";

        $resultat = $bd->query($sql) or die (print_r($bd->errorInfo(), true));
        $ligne = $resultat->fetch(); // <- important fetch c'est bo ntant que $ligne existe
        // $codeClub = $ligne['code'];
        // $this->_id = $ligne['code'];      
        $this->_url = $ligne["urlImage"];
        $this->_nom = $ligne["nomAuteur"];
        $this->_date = $ligne["datePublication"];
        $this->_description = $ligne["description"];
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

    public function getTitre() {
        return $this->_titre;
    }

    public function getDescription()
        {
            return $this->_description;
        }
    public function getDatePublication()
        {
            return $this->_date;
        }
    public function getNomAuteur()
        {
            return $this->_nom;
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