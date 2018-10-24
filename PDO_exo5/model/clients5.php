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
     * Méthode destruct
     */
    public function __destruct(){
        $this->dataBase = NULL;
    }
}
?>