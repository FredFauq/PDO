<?php
class appointments {

    private $connexion;
    public $id;
    public $datehour;
    public $idPatients;
   
    public function __construct() {
//On test les erreurs avec le try/catch 
//Si tout est bon, on est connecté à la base de donnée
        try {
            $this->connexion = NEW PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'Fred', '200469');
        }
//Autrement, un message d'erreur est affiché
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addAppointments() {
        $query = 'INSERT INTO `appointments`(`lastname`, `firstname`, `datehour`) '
                . 'VALUES (:lastname, :firstname, :datehour,)' 
                . 'WHERE `idPatients` = :idPatients';
                
        $insertAppointment = $this->connexion->prepare($query);
        $insertAppointment->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $insertAppointment->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $insertAppointment->bindValue(':datehour', $this->datehour, PDO::PARAM_STR);
        
        return $insertAppointment->execute();
    }
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

