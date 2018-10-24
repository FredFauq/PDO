<?php

/**
 * Création de la classe patients
 */
class patients {

    //Liste des attributs
    private $connexion;
    public $id;
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;
    public $search;

    /**
     * Méthode construct
     */
    public function __construct() {
        //On test les erreurs avec le try/catch 
        //Si tout est bon, on est connecté à la base de donnée
        try {
            $this->connexion = new PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'quentindll', 'first');
        }
        //Autrement, un message d'erreur est affiché
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

    /**
     * Méthode pour ajouter un patients
     * @return type
     */
    public function addPatients() {
        $query = 'INSERT INTO `patients` (`lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES (:lastname, :firstname, :birthdate, :phone, :mail);';
        $result = $this->connexion->prepare($query);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $result->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Méthode pour récupérer la liste des patients
     * @return type
     */
    public function getPatientsList() {
        $isObjectResult = array();
        $result = $this->connexion->query('SELECT `id`, `lastname`, `firstname` FROM `patients`;');
        if (is_object($result)) {
            $isObjectResult = $result->fetchAll(PDO::FETCH_OBJ);
        }
        return $isObjectResult;
    }

    /**
     * Méthode pour récupérer le patients selectionner patients
     * @return type
     */
    public function getEachPatients() {
        $isObjectResult = array();
        $PDOResult = $this->connexion->prepare('SELECT `id`, `lastname`, `firstname`, `birthdate` AS `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :id ');
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        if ($PDOResult->execute()) {
            $isObjectResult = $PDOResult->fetch(PDO::FETCH_OBJ);
        }
        return $isObjectResult;
    }

    /**
     * Méthode pour modifier le patients selectionner
     * @return type
     */
    public function updatePatients() {
        $result = $this->connexion->prepare('UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail WHERE `id` = :id;');
        $result->bindValue(':id', $this->id, PDO::PARAM_STR);
        $result->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $result->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $result->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $result->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $result->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * Méthode pour supprimer un patients et son rendez-vous (suppression patients)
     * @return string
     */
    public function removePatient() {
        $remove = $this->connexion->prepare(''
                . 'DELETE FROM `patients`'
                . 'WHERE `id` =  :idRemove ');
        $remove->bindValue(':idRemove', $this->id, PDO::PARAM_INT);
        return $remove->execute();
    }

    /**
     * Méthode getSearchProfil pour rechercher un profil dans une longue liste. 
     * @return type
     */
    public function getSearchProfil() {
        $result = array();
        $searchProfil = $this->connexion->prepare('SELECT `id`, `lastname`, `firstname` FROM `patients` WHERE `lastname` LIKE :lastname');
        //integrer la valeur de l'attribut $search dans le marqueur nominatif :lastname avec la fonction bindvalue.
        $searchProfil->bindValue(':lastname', '%' . $this->search . '%', PDO::PARAM_STR);
        if ($searchProfil->execute()) {
            $result = $searchProfil->fetchAll(PDO::FETCH_OBJ);
        }
        return $result;
    }

    /**
     * Méthode destruct
     */
    public function __destruct() {
        $this->connexion = NULL;
    }

}
