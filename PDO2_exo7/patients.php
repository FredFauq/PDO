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
            $this->connexion = NEW PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'maxiZor', '1250maxibobeponge');
        }
//Autrement, un message d'erreur est affiché
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

// exercice 1
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

    // exercice 2
    public function getShowPatientsList() {
        $isObjectResult = array();
        $PDOResult = $this->connexion->query('SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients`');
        if (is_object($PDOResult)) {
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $isObjectResult;
    }

    // exercice 3
    public function getPatientProfil() {
        $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :id ';
        $profilPatient = $this->connexion->prepare($query);
        $profilPatient->bindValue(':id', $this->id, PDO::PARAM_INT);
        $profilPatient->execute();
        if (is_object($profilPatient)) {
            $getPatientProfil = $profilPatient->fetch(PDO::FETCH_OBJ);
            // fetch uniquement pour le select
        }
        return $getPatientProfil;
    }

    // exercice 4 
    public function updatePatientProfil() {
        var_dump($this->id);
        $query = 'UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail WHERE `id` = :id';
        $updatePatient = $this->connexion->prepare($query);
        // id en dernier pour l'avoir dans le sens de la requete
        $updatePatient->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updatePatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $updatePatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $updatePatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $updatePatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $updatePatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $updatePatient->execute();
    }

    public function __destruct() {
        $this->connexion = NULL;
    }

}

?>