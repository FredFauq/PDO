<?php
    // class appointments extends database
    class appointments extends database {
   
    public $id;
    public $datehour;
    public $idPatients;
   
    public function __construct() {
         parent::__construct();
    }
  
    public function addAppointments() {
        // on effectue une requête qui écrit les valeurs de dateHour et idPatients
        $query = 'INSERT INTO `appointments`(`dateHour`, `idPatients`) '
                . 'VALUES (:dateHour, :idPatients)';
        $addAppointments = $this->connexion->prepare($query);
        // on attribue les valeurs de dateHour et idPatients aux marqueurs nominatifs respectifs
        $addAppointments->bindValue(':idPatients', $this->idPatients, PDO::PARAM_STR);
        $addAppointments->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
               
        return $addAppointments->execute();
    }
    /*
     * On crée un methode qui vérifie si un rdv existe par rapport au patient
     * @return type BOOLEAN
     */
    public function checkFreeAppointment() {
        // on effectue un requete qui compte le nombre de ligne qui est égale à dateHour et idPatients
        // on place un marqueur nominatif pour récupérer les valeurs de dateHour et de idPatients
        $query = 'SELECT COUNT(`id`) AS `count` FROM `appointments` WHERE `dateHour` = :dateHour';
        $check = $this->connexion->prepare($query);
        // on attribue les valeurs de dateHour aux marqueurs nominatifs respectifs
        $check->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        // on effectue une condition pour donner une valeure booleenne à $result
        if ($check->execute()) {
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
    public function getAppointmentsList() {
        $result = array();
        $query = $this->connexion->query('SELECT `id`, `idPatients`, DATE_FORMAT(`dateHour`, "%d/%m/%Y") AS `date`, DATE_FORMAT(`dateHour`, "%H:%i") AS `hour` '
                . 'FROM `appointments`');
        if (is_object($query)) {
            $result = $query->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

       public function getAppointmentById() {
        // On met notre requète dans la variable $query qui selectionne tous les champs de la table appointments. L'id est egal à :id via marqueur nominatif sur id      
        $query = ('SELECT DATE_FORMAT(`dateHour`, "%d/%m/%Y") AS `date`, DATE_FORMAT(`dateHour`, "%H:%i") AS `hour`, `pts`.`id`, `pts`.`lastname`, `pts`.`firstname`, `pts`.`birthdate`, `pts`.`mail`, `pts`.`phone` ' 
                . 'FROM `appointments` AS `app` '
                . 'LEFT JOIN `patients` AS `pts` '
                . 'ON `app`.`idPatients` = `pts`.`id` ' 
                . 'WHERE `app`.`id`= :id');
         // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
           $appointmentFound = $this->connexion->prepare($query);
         $appointmentFound->bindValue(':id', $this->id, PDO::PARAM_INT);
                  // on utilise la méthode execute() via un return
          $appointmentFound->execute();
            if (is_object($appointmentFound)){
                /* On crée la variable $appointmentFound qui va nous permettre de retourner le resultat 
             * La fonction fetch permet d'afficher la ligne de la requète que je souhaite récupérer
             */
            $result= $appointmentFound->fetch(PDO::FETCH_OBJ);    
            }
        return $result;
    }
     public function updateAppointment() {
         $query = 'UPDATE `appointments` '
                 . 'SET `dateHour` = :dateHour, `idPatients` = :idPatients ' 
                 . 'WHERE `id` = id ';
         $updatePatient = $this->connexion->prepare($query);
        // id en dernier pour l'avoir dans le sens de la requete
        
        $updatePatient->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $updatePatient->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $updatePatient->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $updatePatient->execute();
     } 
      /**
     * Méthode appointmentByPatient permettant d'afficher la liste des rendez-vous du patient sélectionné 
     * @return type
     */
    public function appointmentsByPatient() {
        $result = array();
        $query = 'SELECT `id`, DATE_FORMAT(`dateHour`, "%d/%m/%Y") AS `date`, DATE_FORMAT(`dateHour`, "%H:%i") AS `hour` '
                . 'FROM `appointments` '
                . 'WHERE `idPatients` = :idPatients ';
        $appointmentsByPatient = $this->connexion->prepare($query);
        $appointmentsByPatient->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $appointmentsByPatient->execute();
        if (is_object($appointmentsByPatient)) {
            $result = $appointmentsByPatient->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }
     
    /**
     * Méthode dropAnAppointment permettant de supprimer un rdv
     * @return type
     */
    public function deleteAppointment() {
        $request = 'DELETE FROM `appointments` '
                . 'WHERE `id` = :id';
        $deleteAppointment = $this->connexion->prepare($request);
        $deleteAppointment->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $deleteAppointment->execute();
    }
    
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

