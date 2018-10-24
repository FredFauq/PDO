<?php

class patients {

private $connexion;
public $id;
public $lastname;
public $firstname;
public $birthdate;
public $phone;
public $mail;

public function __construct() {
//On test les erreurs avec le try/catch 
//Si tout est bon, on est connecté à la base de donnée
try {
$this->connexion = NEW PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'isabelnzi', 'Elio1905');
}
//Autrement, un message d'erreur est affiché
catch (Exception $e) {
die($e->getMessage());
}
}

public function addPatient() {
$query = 'INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) '
. 'VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';
$insertPatient = $this->connexion->prepare($query);
$insertPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
$insertPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
$insertPatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
$insertPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
$insertPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
return $insertPatient->execute();
}
public function getPatientList(){
$result = array();
$PDOResult = $this->connexion->query('SELECT `id`, `lastname`, `firstname` FROM `patients`');
if(is_object($PDOResult)){
$result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
}
return $result;
}

public function getprofilById(){
   
$query = ('SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` '
        . 'FROM `patients` '
        . 'WHERE `id` = :id');
  $profilById = $this->connexion->prepare($query);
        // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
        $profilById->bindValue(':id', $this->id, PDO::PARAM_INT);
        // on utilise la méthode execute() via un return
        $profilById->execute();
        if(is_object( $profilById)){
            /* On crée la variable $result qui va nous permettre de retourner le resultat 
             * La fonction fetch permet d'afficher la ligne de la requète que je souhaite récupérer
             */
            $result = $profilById->fetch(PDO::FETCH_OBJ);
        }
     return $result;
    }
    public function __destruct() {
        $this->connexion=NULL;
        
    }
}






