<?php

//creation de la classe showTypes
class patients {

//liste des attributs/ private = car ne sert que dans le model
    private $connexion;
    public $id;
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;

//méthode construct
    public function __construct() {
//on test les erreur avec try catch
//si tous est bon, on est connecté à la base de données
        try {
            $this->connexion = NEW PDO('mysql:host=localhost;dbname=hospitalE2N;charset=utf8', 'root', 'Tomadam');
        }
//autrement un message d'erreur est affiché
        catch (Exception $e) {
            die($e->getMessage());
        }
    }

//Insertion de données
    public function addPatient() {
        // :xxx = marqueur nominatif (comme un parametre)
        $PDOResult = $this->connexion->prepare('INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`)
         VALUES(:lastname, :firstname, :birthdate, :phone, :mail)');
        //bind value= attribut la valeur = protege des injection sql
        //
        $PDOResult->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $PDOResult->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $PDOResult->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $PDOResult->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $PDOResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $PDOResult->execute();
    }

//récupération de données nom et prénom = affiche la liste des patients
    public function getPatientPageList() {
        $isObjectResult = array();
        $PDOResult = $this->connexion->prepare('SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` ORDER BY `lastname` ASC LIMIT :limite OFFSET :debut');
        $PDOResult->bindValue(':limite', $this->limite, PDO::PARAM_INT);
        $PDOResult->bindValue(':debut', $this->debut, PDO::PARAM_INT);
        $PDOResult->execute();
        // Vérifie que $PDOResult est un objet
        if (is_object($PDOResult)) {
            // Stocke la requête dans $PDOResult / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }

//récupère toute les infos d'un patient
    public function getPatientInfoList() {
        $PDOResult = $this->connexion->prepare('SELECT `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE id = :id');
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->execute();
        if (is_object($PDOResult)) {
            // Stocke la requête dans $PDOResult / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $PDOResult->fetch(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }

    //modif de donnée
    public function updatePatient() {
        $PDOResult = $this->connexion->prepare('UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail WHERE id = :id');
        //bindvalue = attribut la valeur
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $PDOResult->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $PDOResult->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $PDOResult->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $PDOResult->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $PDOResult->execute();
    }

    public function getPatientList() {
        $isObjectResult = array();
        $PDOResult = $this->connexion->query('SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` ORDER BY `lastname` ASC');
        // Vérifie que $PDOResult est un objet
        if (is_object($PDOResult)) {
            // Stocke la requête dans $PDOResult / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }

    //supprime une ligne patients
    public function patientDelete() {
        $PDOResult = $this->connexion->prepare('DELETE FROM `patients` WHERE `id` = :id');
        //bindvalue = attribut la valeur
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->execute();
        return $PDOResult;
    }

    //Affiche la liste des patients commencant par le champs de recherche
    public function getPatientJointList() {
        $isObjectResult = array();
        $PDOResult = $this->connexion->prepare('SELECT `id`, `lastname`, `firstname` FROM `patients` WHERE `lastname` LIKE :a ORDER BY `lastname` ASC');
        $PDOResult->bindValue(':a', $this->a, PDO::PARAM_STR);
        $PDOResult->execute();
        // Vérifie que $PDOResult est un objet
        if (is_object($PDOResult)) {
            // Stocke la requête dans $PDOResult / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }

}

?>
