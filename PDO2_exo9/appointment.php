<?php

/**
 * Création de la classe appointments
 */
class appointments {

    //Liste des attributs
    private $connexion;
    public $id;
    public $dateHour;
    public $idPatients;

    /**
     * Méthode construct
     */
    public function __construct() {
        //On test les erreurs avec le try/catch 
        //Si tout est bon, on est connecté à la base de donnée
        try {
            $this->connexion = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', 'c8fdezdzedzdwdxwh');
        }
        //Autrement, un message d'erreur est affiché
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Méthode  addAppointment pour récupérer le résultat de la requête
     * @return type
     */
    public function addAppointment() {
        $query ='INSERT INTO `appointments`(`dateHour`, `idPatients`) '
                . 'VALUES (:dateHour, :idPatients)';
        $insertRendezVous = $this->connexion->prepare($query);
        $insertRendezVous->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $insertRendezVous->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $insertRendezVous->execute();
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
   public function appointmentList() {
        $result = array();
        $PDOResult = $this->connexion->query('SELECT `id`, DATE_FORMAT(dateHour, \'%d/%m/%Y\') AS date, DATE_FORMAT (dateHour, \'%H:%i\') AS hour, idPatients FROM appointments');
        if (is_object($PDOResult)) {
            $result = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * Méthode getRendezVousInfo pour récupérer le résultat de la requête
     * @return type
     */
    public function getAppointmentByIdPatients() {
        $result = array();
        $appointment = $this->connexion->prepare('SELECT `appointments`.`id`,DATE_FORMAT(dateHour, \'%d/%m/%Y\') AS date, DATE_FORMAT (dateHour, \'%H:%i\') AS hour'
                . ' FROM `appointments` '
                . ' WHERE `idPatients` = :idPatients');
        $appointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        if ($appointment->execute()) {
            $result = $appointment->fetchAll(PDO::FETCH_OBJ);
        }else{
            $result = FALSE;
        }
        return $result;
    }
    public function deleteAppointment() {
        $delete = $this->connexion->prepare('DELETE FROM `appointments` WHERE `id` =  :id ');
        $delete->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $delete->execute();
    }
    /**
     * Méthode destruct
     */
    public function __destruct() {
        ;
    }

}

?>