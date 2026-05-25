<?php
class Competition
{
    //Déclaration des attributs de la classe
    private $_id;                 //l'identifiant du club
    private $_nom;
    private $_ville;
    private $_date;
    private $_club;
    private $_sponsor;

    //Déclaration du constructeur
    public function __construct($idCompet,  $villeCompet,   $nomCompet, $dateDebut, $nomClub, $nomSponsor)    // A compléter
    {
        $this->_id = $idCompet;       // Initialisation de l'identifiant de cet objet
        $this->_date = $dateDebut;
        $this->_ville = $villeCompet;
        $this->_nom = $nomCompet;
        $this->_club = $nomClub;
        $this->_sponsor = $nomSponsor;
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

    // Recuperation et affichage d'un club saisis dans un formulaire.
    public function retrieve($id)
    {
        require "connexionServBD_local.php";
        $sql = "SELECT code, ville, nom, idClub, dateDebut, idSponsor  FROM competition WHERE idEnregistrement ='".$id."'";

        $resultat = $bd->query($sql) or die (print_r($bd->errorInfo(), true));
        $ligne = $resultat->fetch(); // <- important fetch c'est bo ntant que $ligne existe
        $this->_id = $ligne['code'];      
        $this->_ville = $ligne["ville"];
        $this->_nom = $ligne["nom"];
        $this->_club = $ligne["idClub"];
        $this->_date = $ligne["dateDebut"];
        $this->_sponsor = $ligne["idSponsor"];
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


    public function getDateDebut()
        {
            return $this->_date;
        }
    public function getClub()
        {
            return $this->_club;
        }
    public function getNomCompetition()
        {
            return $this->_nom;
        }
    public function getVille()
        {
            return $this->_ville;
        }
    public function getSponsor()
        {
            return $this->_sponsor;
        }
    public function delete($codeClub)
        {
            require_once "connexionServBD.php";
            $sql = "DELETE FROM club WHERE code='$codeClub'";
            $bd->exec($sql) or die (print_r($bd->errorInfo(), true));

        }
}



    

?>