<?php

//include de la base de donnée
include 'database.php';

class patients extends database {

    //déclaration des attribus
    public $id;
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;

    //déclaration de la méethode addPatient
    public function addPatient() {
        //déclaration de la requete sql
        $request = 'INSERT INTO `patients`(`lastname`,`firstname`,`birthdate`,`phone`,`mail`) '
                . 'VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';
        $insertPatient = $this->db->prepare($request);
//        blind value permet de mettre une valeur a notre marqueur nominatif, il nous protége un minimum des injection sql
//        on utilise un bind value pour chaque clé nominatif
        $insertPatient->bindValue(':lastname', $this->lastname, pdo::PARAM_STR);
        $insertPatient->bindValue(':firstname', $this->firstname, pdo::PARAM_STR);
        $insertPatient->bindValue(':birthdate', $this->birthdate, pdo::PARAM_STR);
        $insertPatient->bindValue(':phone', $this->phone, pdo::PARAM_STR);
        $insertPatient->bindValue(':mail', $this->mail, pdo::PARAM_STR);
        return $insertPatient->execute();
    }
    /**
     * Methode permetant d'afficher la listes des patients  
     * @return type
     */
    public function getPatientsList() {
        $request = 'SELECT `lastname`,`firstname`,`id` FROM `patients`';
        $getAllPatient = $this->db->query($request);
        if (is_object($getAllPatient)) {
            return $getAllPatient->fetchAll(PDO::FETCH_OBJ);
        }
    }
        /**
     * Méthode permettant d'afficher les informations du patient sélctionné
     * @return type
     */
    public function getProfilPatient() {
        $request = 'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :id';
        $profilPatient = $this->db->prepare($request);
        //attribution des valeurs des id avec bindValue
      $profilPatient->bindValue(':id', $this->id, PDO::PARAM_INT);
      $profilPatient->execute();
        if (is_object($profilPatient)) {
            //récupération des infos du patient
            $result = $profilPatient->fetch(PDO::FETCH_OBJ);
        }
        return $result;
    }
}
