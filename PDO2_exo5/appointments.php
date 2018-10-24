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
            $this->connexion = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'Fred', '200469');
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

    /**
     * Méthode destruct
     */
    public function __destruct() {
        ;
    }

}

?>
