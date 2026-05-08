<?php

class TriathleteManager{    //Déclaration des attributs de la classe
    private $_label;
    private $_licence;
    private $_nom;
    private $_prenom;
    private $_genre;
    private $_rue;
    private $_codePostal;
    private $_ville;
    private $_dateNaissance;
    private $_mail;
    private $_club;
    private $_categorieAge;


    

    //Déclaration du constructeur
    public function __construct($licenceTria, $nomTria, $prenomTria, $genreTria, $rueTria, $codePostalTria, $villeTria, $naissTria, $mailTria, $clubTria, $categorieAgeTria)    // A compléter
    {
        $this->_licence = $licenceTria;
        $this->_nom = $nomTria;
        $this->_prenom = $prenomTria;
        $this->_genre = $genreTria;
        $this->_rue = $rueTria;
        $this->_codePostal = $codePostalTria;
        $this->_ville = $villeTria;
        $this->_dateNaissance = $naissTria;
        $this->_mail = $mailTria;
        $this->_club = $clubTria;
        $this->_categorieAge = $categorieAgeTria;
    }
    

    
    //Déclaration de la méthode publique 'create()' qui permet d'ajouter un nouveau club à la BD
    public function create()
    {
        // Sert à la connexion à la base de données 
        require_once "connexionServBD.php";
        // La variable sql permet d'insérer les varaibles dans les attributs qui leur est attribuées.
        $sql = "INSERT INTO triathlete (numLicence, nom, prenom, genre, adresseRue, codePostal, ville, dateNaissance, mail, codeClub, codeCategorie) 
                VALUES ('".$this->_label."', '".$this->_nom."', '".$this->_prenom."', '".$this->_genre."', '".$this->_rue."', '".$this->_codePostal."', '".$this->_ville."', '".$this->_dateNaissance."', '".$this->_mail."', '".$this->_club."', '".$this->_categorieAge."');";    // A compléter
        // Cette ligne permet d'executer la lecture de la base de donnée.
        $bd->exec($sql) or die(print_r($bd->errorInfo(), true));
        
    }
    public function read()
    {
        // la fonction ne sert pas ici car on peut directement lire la BD via php par la méthode include......BD
    }
    public function retrieve($licenceTria)
    {
        // Algo : print(codeClub) 
        require_once "connexionServBD.php";
        $sql = "SELECT numLicence, nom, prenom, genre, adresseRue, codePostal, ville, dateNaissance, mail, codeClub, codeCategorie FROM triathlete  WHERE numLicence = `" . $_GET['numLicence'] . "`";
        // -- WHERE numLicence='".$_GET['numLicence']."'"; // #retrun printstring
        $resultat = $bd->query($sql) or die (print_r($bd->errorInfo(), true));
        $ligne = $resultat->fetch(); // <- important fetch c'est bo ntant que $ligne existe
        
        $this->_licence = $ligne['numLicence'];
        $this->_nom = $ligne['nom'];
        $this->_prenom = $ligne['prenom'];
        $this->_genre = $ligne['genre'];
        $this->_rue = $ligne['adresseRue'];
        $this->_codePostal = $ligne['codePostal'];
        $this->_ville = $ligne['ville'];
        $this->_dateNaissance = $ligne['dateNaissance'];
        $this->_mail = $ligne['mail'];
        $this->_club = $ligne['codeClub'];
        $this->_categorieAge = $ligne['codeCategorie'];
        
        $this->$licencetria =$_GET['numLicence'];
    }

 
    public function get_licence(){
        return  $this->_licence;
    }    
    public function get_nom()
    {
        return $this->_nom;
    }   
     public function get_prenom()
    {
        return $this->_prenom;
    }   
     public function get_genre()
    {
        return $this->_genre;
    }   
     public function get_adresseRue()
    {
        return $this->_rue;
    }   
     public function get_codePostal()
    {
        return $this->_codePostal;
    }   
     public function get_ville()
    {
        return $this->_ville;
    }    
    public function get_dateNaissance()
    {
        return $this->_dateNaissance;
    }
    public function get_mail()
    {
        return  $this->_mail;
    }
    public function get_codeClub()
    {
        return $this->_club;
    }
    public function get_codeCategorie(){

        return $this->_categorieAge;
    }
}










    


?>