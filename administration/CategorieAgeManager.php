<?php

class CategorieAgeManager{    //Déclaration des attributs de la classe
    private $_categorieAge;
    private $_licence;
    private $_AgeDebut;
    private $_AgeFin;


    

    //Déclaration du constructeur
    public function __construct($categorieAgeTria, $licenceTria, $ageDebutCateg, $ageFinCateg)    // A compléter
    {
        $this->_categorieAge = $categorieAgeTria;
        $this->_licence = $licenceTria;
        $this->_AgeDebut = $ageDebutCateg;
        $this->_AgeFin = $ageFinCateg;
        

       
    }
    

    
    //Déclaration de la méthode publique 'create()' qui permet d'ajouter un nouveau club à la BD
    public function create()
    {
        // Sert à la connexion à la base de données 
        require_once "connexionServBD.php";
        // La variable sql permet d'insérer les varaibles dans les attributs qui leur est attribuées.
        $sql = "INSERT INTO categorieAge (code, libelle, ageDebut, ageFin) 
                VALUES ('".$this->_categorieAge."', '".$this->_licence."', '".$this->_AgeDebut."', '".$this->_AgeFin."');";    // A compléter
        // Cette ligne permet d'executer la lecture de la base de donnée.
        $bd->exec($sql) or die(print_r($bd->errorInfo(), true));
        
    }
    public function read()
    {
        // la fonction ne sert pas ici car on peut directement lire la BD via php par la méthode include......BD
    }
    public function retrieve()
    {
        // Algo : print(codeClub) 
        require_once "connexionServBD.php";
                

    }

}




    


?>