<?php

//creation de la classe showTypes
class appointments extends database{

//liste des attributs (protected= accessible dans la classe et ses héritiers , private = uniquement ds la classe, public= classe et autres(controller et view)
    public $id;
    public $dateHour;
    public $idPatients;

//méthode construct
    public function __construct() {
        parent::__construct();
    }

    //ajoute des rdv dans la base de données
    public function addAppointment() {
        // :xxx = marqueur nominatif (comme un parametre)
        //prepare = requete préparé = protege des injection sql
        $PDOResult = $this->pdo->prepare('INSERT INTO `appointments`(`dateHour`, `idPatients`)
         VALUES(:dateHour, :idPatients)');
        //bind value= attribut la valeur = protege des injection sql
        //
        $PDOResult->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $PDOResult->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);

        return $PDOResult->execute();
    }

//vérifie que le nouveau rendez vous n'existe pas déja
    public function checkAppointmentExist() {
        $PDOResult = $this->pdo->prepare('SELECT COUNT(`id`) AS "count"
         FROM `appointments`
         WHERE `dateHour` = :dateHour');
        $PDOResult->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        if ($PDOResult->execute()) {
            $isObjectResult = $PDOResult->fetch(PDO::FETCH_OBJ);
            $bool = $isObjectResult->count;
        } else {
            $bool = FALSE;
        }
        return $bool;
        //retourne '1' , '0' ou FALSE
    }

    //affiche la liste des rdv
    public function getAppointmentList() {
        $isObjectResult = array();
        $PDOResult = $this->pdo->query('SELECT `id`, DATE_FORMAT(`dateHour`, "%d/%m/%Y") AS `date`, DATE_FORMAT(`dateHour`, "%Hh%i") AS `hour`, `idPatients`
         FROM `appointments` ORDER BY `dateHour` ASC');
        // Vérifie que $PDOResult est un objet
        if (is_object($PDOResult)) {
            // Stocke la requête dans $PDOResult / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }

    //afficle les infos d'un patient set ses rdv
    public function getAppointmentInfoList() {
        $isObjectResult = array();
        $PDOResult = $this->pdo->prepare('SELECT `id`, DATE_FORMAT(`dateHour`, "%d/%m/%Y") AS `date`, DATE_FORMAT(`dateHour`, "%Hh%i") AS `hour`
         FROM `appointments`
         WHERE idPatients = :idPatients ORDER BY `dateHour` ASC');
        $PDOResult->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $PDOResult->execute();
        if (is_object($PDOResult)) {
            // Stocke la requête dans $PDOResult / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $PDOResult->fetchAll(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }
        public function appointmentForm() {
        $isObjectResult = array();
        $PDOResult = $this->pdo->prepare('SELECT DATE_FORMAT(`dateHour`, "%H:%i") AS `hour`, DATE_FORMAT(`dateHour`, "%Y-%m-%d") AS `dateForm`
         FROM `appointments`
         WHERE id = :id');
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->execute();
        if (is_object($PDOResult)) {
            // Stocke la requête dans $PDOResult / fetchAll = va chercher tous les résultat / FETCH_OBJ = un tableau d'objet
            $isObjectResult = $PDOResult->fetch(PDO::FETCH_OBJ);
        }
        // Retourne $PDOResult
        return $isObjectResult;
    }

    //modif de donnée rdv
    public function updateAppointment() {
        $PDOResult = $this->pdo->prepare('UPDATE `appointments` SET `dateHour` = :dateHour, `idPatients`= :idPatients
         WHERE `id` = :id');
        //bindvalue = attribut la valeur
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        $PDOResult->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $PDOResult->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        $PDOResult->execute();
        return $PDOResult;
    }

    //supprime une ligne rdv
    public function deleteAppointment() {
        $PDOResult = $this->pdo->prepare('DELETE FROM `appointments`
         WHERE `id` = :id');
        //bindvalue = attribut la valeur
        $PDOResult->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $PDOResult->execute();
    }

}
?>
