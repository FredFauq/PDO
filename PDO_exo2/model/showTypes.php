<?php
/**
 * Création de la classe showTypes
 */
class showTypes{
    //Liste des attributs
    private $connexion;
    public $id;
    /**
     * Méthode construct
     */
    public function __construct(){
        //On test les erreurs avec le try/catch 
        //On essaye de se connecté à la base de donnée
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
    public function getTypeList(){
        // on declare un tableau vide
        $isObjectResult = array();
        $PDOResult=$this->connexion->query('SELECT `type` FROM `showTypes`');
        return $PDOResult->fetchAll(PDO::FETCH_OBJ);
        // si il y a une erreur on renvoie le tableau vide
        if(is_object($PDOResult)){
            $isObjectResult=$PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
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