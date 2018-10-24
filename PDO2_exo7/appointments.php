<?php

class appointments {

    private $connexion;
    public $id;
    public $dateHour;
    public $idPatients;

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

// exercice 5
    public function addAppointment() {
        $query = 'INSERT INTO `appointments`(`dateHour`, `idPatients`) '
                . 'VALUES (:dateHour, :idPatients)';
        $insertAppointment = $this->connexion->prepare($query);
        $insertAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $insertAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_STR);
        return $insertAppointment->execute();
    }
    public function checkIfAppointmentExist(){
        $query = 'SELECT COUNT(`id`) AS `count` FROM `appointments` WHERE `dateHour` = :dateHour ';
        $check = $this->connexion->prepare($query);
        $check->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        if ($check->execute()){
            $result = $check->fetch(PDO::FETCH_OBJ);
            $bool = $result->count;
        } else {
            $bool = FALSE;
        }
        return $bool;
    }
    /**
     * Méthode  getRendezVousList pour récupérer le résultat de la requête
     * @return type
     */
    public function getRendezVousList() {
        $result = array();
        $PDOResult = $this->connexion->query('SELECT `id`, `idPatients`, `dateHour` FROM `appointments`');
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
    /**
     * Méthode getRendezVousInfo pour récupérer le résultat de la requête
     * @return type
     */
    public function getRendezVousInfo() {
        $result = array();
        $infoRendezVous = $this->connexion->prepare('SELECT `appointments`.`id`, `patients`.`firstName`, `patients`.`lastName`, `appointments`.`dateHour` FROM `appointments` LEFT JOIN `patients` ON `patients`.`id` = `appointments`.`idPatients` WHERE `id` = :id');
        $infoRendezVous->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($infoRendezVous->execute()) {
            $result = $infoRendezVous->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }

    // exercice 6
    public function getShowAppointmentsList() {
        $isObjectResult = array();
        $PDOResult = $this->connexion->query('SELECT `appointments`.`id`, `appointments`.`dateHour`, `patients`.`lastname`, `patients`.`firstname`, `appointments`.`idPatients` FROM `appointments` INNER JOIN `patients` ON `appointments`.`idPatients` = `patients`.`id`');
        if (is_object($PDOResult)) {
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $isObjectResult;
    }
    // exercice 7
    public function getAppointmentById() {
        $query = 'SELECT DATE_FORMAT(`appointments`.`dateHour`, \'%Y-%m-%d\') AS `date`, DATE_FORMAT(`appointments`.`dateHour`, \'%H:%i\') AS `hour`, `appointments`.`idPatients` '
                . 'FROM `appointments` '
                . 'WHERE `appointments`.`id` = :id ';
        $AppointmentDetails = $this->connexion->prepare($query);
        $AppointmentDetails->bindValue(':id', $this->id, PDO::PARAM_INT);
        $AppointmentDetails->execute();
        if (is_object($AppointmentDetails)) {
            $getAppointmentsDetails = $AppointmentDetails->fetch(PDO::FETCH_OBJ);
            // fetch uniquement pour le select
        }
        return $getAppointmentsDetails;
    }
    // exercice 8
    public function updateAppointment() {
        $query = 'UPDATE `appointments` '
                . 'SET `dateHour` = :dateHour, `idPatients` = :idPatients '
                . 'WHERE `id` = :id';
        $updatePatient = $this->connexion->prepare($query);
        // id en dernier pour l'avoir dans le sens de la requete

        $updatePatient->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $updatePatient->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $updatePatient->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $updatePatient->execute();
    }
    public function __destruct() {
        $this->connexion = NULL;
    }

}

?>
