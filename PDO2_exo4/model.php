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
            $this->connexion = NEW PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'non-root', '123');
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
    /* method permettant d'afficher la liste des patients
    */
    public function listPatient(){
    $query = $this->connexion->query('SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients`');
      return $query->fetchAll(PDO::FETCH_OBJ);
    }
    /* method permettant d'afficher un patient
    */
    public function getOncePatient(){
    $result = array();
    $patientUnique = $this->connexion->prepare('SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :id');
    $patientUnique->bindValue(':id', $this->id, PDO::PARAM_INT);
    if($patientUnique->execute()){
      $result = $patientUnique->fetch(PDO::FETCH_OBJ);
    }
      return $result;
    }

public function modifyPatient(){
  $patientUnique = $this->connexion->prepare('UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate,`phone` = :phone, `mail` = :mail WHERE `id` = :id');
  $patientUnique->bindValue(':id', $this->id, PDO::PARAM_INT);
  $patientUnique->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
  $patientUnique->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
  $patientUnique->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
  $patientUnique->bindValue(':phone', $this->phone, PDO::PARAM_STR);
  $patientUnique->bindValue(':mail', $this->mail, PDO::PARAM_STR);
  return $patientUnique->execute();
}
}
