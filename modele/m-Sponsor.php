<?php
class Competition
{
    //Déclaration des attributs de la classe
    protected $_idS;                 //l'identifiant du club
    protected $_nomSp;                 //l'identifiant du club
    protected $_chemin;
    protected $_idComp;

    //Déclaration du constructeur
    public function __construct($idSponsor,  $nomSponsor,  $cheminLogo, $idCompetition)    // A compléter
    {
        $this->_idS = $idSponsor;       // Initialisation de l'identifiant de cet objet
        $this->_nomSp = $nomSponsor;
        $this->_chemin = $cheminLogo;
        $this->_idComp = $idCompetition;
    }
    

    
    //Déclaration de la méthode publique 'create()' qui permet d'ajouter un nouveau club à la BD
    public function create($idSponsor, $nomSponsor, $cheminLogo, $idCompetition)
    {
        // Sert à la connexion à la base de données 
        require_once "connexionServBD.php";
        // La variable sql permet d'insérer les varaibles dans les attributs qui leur est attribuées.
        $sql = "INSERT INTO competition (code, nom, ville, idEnregistrement, idClub, idClub, idSponsor, dateDebut) 
                VALUES ('".$this->_idS."', '".$this->_nomSp."', '".$this->_chemin."', '".$this->_idComp."', );";    // A compléter
        // Cette ligne permet d'executer la lecture de la base de donnée.
        $bd->exec($sql) or die(print_r($bd->errorInfo(), true));
        
    }
        public function verifCFetch()
    {
        require "connexionServBD_local4.php";
        $sql4 = 'SELECT code, ville, nom, idClub, dateDebut, idSponsor  FROM enregistrement
        INNER JOIN competition ON enregistrement.id= competition.idEnregistrement 
        WHERE competition.idEnregistrement IS NOT NULL;';
        // -- GROUP BY competition.idEnregistrement IN (SELECT code FROM competition
        // -- INNER JOIN enregistrement ON enregistrement.id= competition.idEnregistrement WHERE competition.idEnregistrement IS NOT NULL) ; ;
        $resultat4 = $bd4->query($sql4) or die (print_r($bd4->errorInfo(), true)) ;
        return $resultat4->fetchColumn(0);
    }

    // Recuperation et affichage d'un club saisis dans un formulaire.
    public function fetchAll()
    {
        require "connexionServBD_local4.php";
        $sql4 = 'SELECT code, ville, nom, idClub, dateDebut, idSponsor  FROM enregistrement
        INNER JOIN competition ON enregistrement.id = competition.idEnregistrement 
        WHERE competition.idEnregistrement IS NOT NULL;';
        // -- GROUP BY competition.idEnregistrement IN (SELECT code FROM competition
        // -- INNER JOIN enregistrement ON enregistrement.id= competition.idEnregistrement WHERE competition.idEnregistrement IS NOT NULL) ; ;
        $resultat4 = $bd4->query($sql4) or die (print_r($bd4->errorInfo(), true)) ;
        $ligne = $resultat4->fetch(); // <- important fetch c'est bo ntant que $ligne existe
        $this->_idC = $ligne['code'];      
        $this->_ville = $ligne["ville"];
        $this->_nomC = $ligne["nom"];
        $this->_club = $ligne["idClub"];
        $this->_dateC = $ligne["dateDebut"];
        $this->_sponsor = $ligne["idSponsor"];

        }
    
    
    public function update($codeClub){
        require_once "connexionServBD.php";
        //il faut envoyer nouvelle données du $POST.
        
        $sql = "UPDATE club SET  nom='".$this->_nom."', adresseRue='".$this->_adresseRue."', codePostal='".$this->_codePostal."', ville='".$this->_ville."', nomPresident='".$this->_nomPresident."', numTelephone='".$this->_numTelephone."', mail='".$this->_mail."'  WHERE code='" .$codeClub. "'";

        $bd->exec($sql) or die (print_r($bd->errorInfo(), true));

    }

    //On va afficher dans formulaire HTML
    public function getIdC() {
        return $this->_idC; //Affichage de données de formulaire
    }  


    public function getDateDebut()
        {
            return $this->_dateC;
        }
    public function getClub()
        {
            return $this->_club;
        }
    public function getNomCompetition()
        {
            return $this->_nomC;
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