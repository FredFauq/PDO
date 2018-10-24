<?php
/**
 * Création de la classe clients
 */
class clients{
    //Liste des attributs
    private $database;
    public $id;
    public $lastName;
    public $firstName;
    public $birthDate;
    public $card;
    public $cardNumber;
    /**
     * Méthode construct
     */
    public function __construct(){
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
     * Méthode getClientsList pour récupérer le résultat de la requête
     * @return type
     */
    public function getClientsListAll(){
        $PDOResult = $this->database->query('SELECT `lastName`, `firstName` FROM `clients` LEFT JOIN `cards` ON `clients`.`cardNumber` = `cards`.`cardNumber`');
        return $PDOResult->fetchAll(PDO::FETCH_OBJ);
    }
    /**
     * Méthode getClientsList pour récupérer le résultat de la requête
     * @return type
     */
    public function getTypeList(){
        // on declare un tableau vide
        $isObjectResult = array();
        $PDOResult=$this->database->query('SELECT `type` FROM `showTypes`');
        // si il y a une erreur on renvoie le tableau vide
        if(is_object($PDOResult)){
            $isObjectResult=$PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $isObjectResult;
    }
    /**
     * Méthode getClientsList pour récupérer le résultat de la requête
     * @return type
     */
    public function getClientsTwentyList(){
        // on instancie la variable $isObjectResult dans un tableau vide
        $isObjectResult = array();
        $PDOResult = $this->database->query('SELECT `lastName`, `firstName` FROM `clients` LIMIT 20');
         // si il y a une erreur on renvoie le tableau vide
        if(is_object($PDOResult)){
            $isObjectResult=$PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        // on renvoie le résultat
        return $isObjectResult;
          }
    /**
     * Méthode getClientsList pour récupérer le résultat de la requête
     * @return type
     */
    public function getClientsCardList(){
        $PDOResult = $this->database->query('SELECT `lastName`, `firstName`, `card`, `cardNumber`  FROM `clients` WHERE `card` = 1');
        return $PDOResult->fetchAll(PDO::FETCH_OBJ);
    }
           /**
     * On crée un methode qui retourne la liste qui trie par ordre croissant les clients qui ont un nom commencant par M de la table clients
     * @return type ARRAY
     */
    public function getClientsWithM_list() {
        // On met notre requète dans la variable $PDOresult qui selectionne tous les champs de la table clients
        $PDOresult = 'SELECT `id`, `lastName`, `firstName`, `card`, `cardNumber` FROM `clients` WHERE `lastName` LIKE \'M%\' ORDER BY `lastName`';
        // On crée un objet $result qui exécute la méthode $PDOresult() avec comme paramètre $query
        $result = $this->database->query($PDOresult);
        // On crée un objet $resultList qui est un tableau.
        // La fonction fetchAll permet d'afficher toutes les données de la requète dans un tableau d'objet par le paramètre (PDO::FETCH_OBJ)
        $resultList = $result->fetchAll(PDO::FETCH_OBJ);
        // On retourne le resultat
        return $resultList;
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
     * Méthode getClientsList pour récupérer le résultat de la requête
     * @return type
     */
    public function getClientsList() {
        // on instancie la variable $isObjectResult dans un tableau vide
        $isObjectResult = array();
        $PDOResult = $this->database->query('SELECT `lastName`, `firstName`, DATE_FORMAT(`birthDate`, "%d/%m/%Y") AS `birthDate`, `clients`.`cardNumber`, `card`, (CASE WHEN `cardTypesId`= 1 THEN "OUI" ELSE "NON" END) AS `case` FROM `clients` LEFT JOIN `cards` ON `clients`.`cardNumber`=`cards`.`cardNumber` ORDER BY `lastName` ASC');
        // si il y a une erreur on renvoie le tableau vide
        if (is_object($PDOResult)) {
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        // on renvoie le résultat
        return $isObjectResult;
    }
    /**
     * Méthode destruct
     */
    public function __destruct(){
        ;
    }
}
?>