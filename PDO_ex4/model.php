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
            $this->connexion = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'dezferfergtrh');
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
        $isObjectResult = array();
        $PDOResult = $this->connexion->query('SELECT `clients`.`firstName`, `clients`.`lastName`, `cards`.`cardTypesId`, `clients`.`id`'
                . ' FROM `clients` '
                . 'INNER JOIN `cards` '
                . 'ON `clients`.`cardNumber` = `cards`.`cardNumber` '
                . 'WHERE `cards`.`cardTypesId` = 1');
        // Vérifie que $PDOResult est un objet
        if (is_object($PDOResult)) {
          // Stocke la requête dans $PDOResult
          $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
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