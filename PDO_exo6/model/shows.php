<?php
/* On crée une class shows qui hérite de la classe database via extends
 * La classe shows va nous permettre d'accéder à la table shows et afficher les élements
 */
class shows{
    
    // Création d'attributs qui correspondent à chacun des champs de la table showTypes que nous allons utiliser
    // et on les initialise par rapport à leurs types.
    private $database;
    public $id = 0;
    public $title = '';
    public $performer = '';
    public $date = 01/01/2018;
    public $showTypesId = 0;
    public $firstGenresId = 0;
    public $secondGenresId = 0;
    public $duration = '00:00:00';
    public $startTime = '00:00:00';
    // on crée une methode magique __construct()
    public function __construct() {
         //On test les erreurs avec le try/catch 
        //Si tout est bon, on est connecté à la base de donnée
        try{
            $this->database = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'Fred', '200469');
        }
        //Autrement, un message d'erreur est affiché
        catch(Exception $e){
            die($e->getMessage());
        }
    }
    /**
     * On crée un methode qui retourne tous par ordre alphabetique les titres de tous les spectacles ainsi que les artistes, les dates et les heures.
     * @return type ARRAY
     */
    public function getShowsList(){
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table shows
        $PDOresult = 'SELECT `title`, `performer` , DATE_FORMAT(`date`,"%d/%m/%Y") AS `date`, TIME_FORMAT(`startTime`,"%Hh%i") AS `startTime` FROM `shows` ORDER BY `title`';
        // On crée un objet $result qui exécute la méthode $PDOresult() avec comme paramètre $query
        $result = $this->database->query($PDOresult);
        // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet via le paramètre (PDO::FETCH_OBJ)
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
    }
    /**
     * Méthode destruct
     */
    public function __destruct(){
        $this->dataBase = NULL;
    }
}