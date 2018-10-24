<?php
/**
 * Création de la classe clients
 */
class clients{
    //Liste des attributs
    private $connexion;
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
            $this->connexion = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'Fred', '200469');
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
    public function getClientsList(){
        // on instancie la variable $isObjectResult dans un tableau vide
        $isObjectResult = array();
        $PDOResult = $this->connexion->query('SELECT `lastName`, `firstName` FROM `clients` LIMIT 20');
         // si il y a une erreur on renvoie le tableau vide
        if(is_object($PDOResult)){
            $isObjectResult=$PDOResult->fetchAll(PDO::FETCH_OBJ);
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