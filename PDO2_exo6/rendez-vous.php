<?php

/**
 * Création de la classe appointment
 */
class appointments {

    //Listing des attributs
    private $connexion;
    public $id;
    public $dateHour;
    public $idPatients;

    //Déclaration de la méthode constructeur
    public function __construct() {
        try {
            $this->connexion = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'fabienlamotte', 'Platinum#00');
        }
        //Autrement, un message d'erreur est affiché
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Méthode pour créer un rendez-vous (création de rendez-vous)
     * @return string
     */
    public function insertAppointment() {
        //Préparation de la requête SQL
            $addAppointment = $this->connexion->prepare('INSERT INTO `appointments`(`dateHour`, `idPatients`) VALUES(:dateHour, :idPatients)');
        //Récupération de l'entrée $date et $hour dans le marqueur nominatif $dateHour
            $addAppointment->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        //Récupération de l'entrée $patients dans le marqueur nominatif $idPatients
            $addAppointment->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        //Exécution de la requête SQL
            return $addAppointment->execute();
    }
    
    /**
     * Méthode pour éviter d'avoir deux rendez-vous en même temps
     */
    public function notSameAppointments(){
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
     * Méthode pour afficher la liste des rendez-vous (Affichage liste rendez-vous)
     * @return string
     */
    public function appointmentList(){
        //préparation de la requête SQL 
        //Première solution avec DATE_FORMAT simple
            //$query = 'SELECT `id`, DATE_FORMAT(`dateHour`, \'Le %d/%m/%Y à %Hh%i\') AS `dateHour`, `idPatients` FROM `appointments`';
        //Seconde solution avec DATE_FORMAT éclaté
            $query = 'SELECT `id`, DATE_FORMAT(`dateHour`, \'%d/%m/%Y\') AS `date`, DATE_FORMAT (`dateHour`, \'%Hh%i\') AS `hour`, `idPatients` FROM `appointments`';
        //On appelle la requête pour la plasser dans une variable $listAppointments
            $listAppointments = $this->connexion->query($query);
        //Création d'un tableau $isObjectResult qui servira pour la vérification qui va suivre
            $isObjectResult = array();
        //Condition pour vérifier que la variable est bien un objet
            if (is_object($listAppointments)) {
                //On affiche tout le contenu du résulat de la requête avec fetchAll
                $isObjectResult = $listAppointments->fetchAll(PDO::FETCH_OBJ);
            }
        //On retourne le résultat
        return $isObjectResult;
    }
    
    public function appointmentListById() {
        //Création de la requête et instaurationd dans la variable $query
            $query = 'SELECT `ap`.`id`, `ap`.`dateHour`, `ap`.`idPatients` '
                    . 'FROM `appointments` AS `ap`'
                    . 'LEFT JOIN `patients` AS `pt`'
                    . 'ON `ap`.`idPatients` = `pt`.`id`'
                    . 'WHERE `ap`.`idPatients` = :id';
        //Préparation de la requête
            $listAppointments = $this->connexion->prepare($query);
        //On attribue la valeur de l'entrée id du patients dans le marqueur nominatif id
            $listAppointments->bindValue(':id', $this->id, PDO::PARAM_INT);
        //On exécute la requête avec les entrées préparées
            $listAppointments->execute();
        //Création d'un tableau $isObjectResult
            $isObjectResult = array();
        //Condition pour vérifier que $listAppointments est un objet
            if (is_object($listAppointments)) {
                $isObjectResult = $listAppointments->fetchAll(PDO::FETCH_OBJ);
            }
        //On retourne le résultat
        return $isObjectResult;
    }

    /**
     * Méthode pour afficher le contenu complet du patient du rendez-vous sélectionné (affichage rendez-vous)
     * @return string
     */
    public function appointmentProfile() {
        $query = 'SELECT `ap`.`id`, `ap`.`dateHour`, `ap`.`idPatients`, `pt`.`id`, `pt`.`lastName`, `pt`.`firstName`, `pt`.`birthDate`, `pt`.`phone`, `pt`.`mail` '
                . 'FROM `appointments` AS `ap`'
                . 'LEFT JOIN `patients` AS `pt`'
                . 'ON `ap`.`idPatients` = `pt`.`id`'
                . 'WHERE `ap`.`id` = :id ';
        $appointmentContent = $this->connexion->prepare($query);
        $appointmentContent->bindValue(':id', $this->id, PDO::PARAM_INT);
        $appointmentContent->execute();
        if (is_object($appointmentContent)) {
            $isObjectResult = $appointmentContent->fetch(PDO::FETCH_OBJ);
        }
        //On retourne le résultat
        return $isObjectResult;
    }

    /**
     * Méthode pour modifier un rendez-vous (modification rendez-vous)
     * @return string
     */
    public function ChangeAppointmentContent() {
        $change = $this->connexion->prepare('
            UPDATE 
                `appointments`
            SET
                `dateHour` = :dateHour
            WHERE
                `id` = :id
            ');
        $change->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $change->bindValue(':id', $this->id, PDO::PARAM_INT);
        $change->execute();
        if (is_object($change)) {
            $isObjectResult = $change->fetch(PDO::FETCH_OBJ);
        }
        //On retourne le résultat
        return $isObjectResult;
    }

    /**
     * Méthode pour supprimer un rendez-vous (suppression rendez-vous)
     * @return string
     */
    public function removeAppointment() {
        $remove = $this->connexion->prepare(''
                . 'DELETE FROM `appointments`'
                . 'WHERE `id` =  :idRemove ');
        $remove->bindValue(':idRemove', $this->id, PDO::PARAM_INT);
        return $remove->execute();
    }
    //Déclaration de la méthode destructeur
    public function __destruct() {
        ;
    }

}

?>