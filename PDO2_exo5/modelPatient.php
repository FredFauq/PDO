<?php

class patients {

    private $connexion;
    public $id;
    public $lastname;
    public $firstname;
    public $birthdate;
    public $phone;
    public $mail;

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

    public function addPatient() {
        $query = 'INSERT INTO `patients`(`lastname`, `firstname`, `birthdate`, `phone`, `mail`) '
                . 'VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';
        $insertPatient = $this->connexion->prepare($query);
        $insertPatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $insertPatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $insertPatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $insertPatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $insertPatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $insertPatient->execute();
    }
    /**
     * Méthode pour recupérer la liste des patients
     * @return type
     */
    public function getPatientList() {
        // on declare un tableau vide
        $getPatientList = array();
        $query = 'SELECT `id`, `lastname`, `firstname` FROM `patients`';
               $patientList=$this->connexion->query($query);
         // si il y a une erreur on renvoie le tableau vide
        if(is_object($patientList)){
            $getPatientList=$patientList->fetchAll(PDO::FETCH_OBJ);
        }
        // on renvoie le résultat
        return $getPatientList;
    }
    public function getPatientProfilByID() {
           $query = 'SELECT `id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail` FROM `patients` WHERE `id` = :id';
             // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
           $patientProfil=$this->connexion->prepare($query);
         $patientProfil->bindValue(':id', $this->id, PDO::PARAM_INT);
           // on utilise la méthode execute() via un return
       $patientProfil->execute();
            if (is_object($patientProfil)){
                /* On crée la variable $patientProfilByID qui va nous permettre de retourner le resultat 
             * La fonction fetch permet d'afficher la ligne de la requète que je souhaite récupérer
             */
            $getPatientProfilByID = $patientProfil->fetch(PDO::FETCH_OBJ);
            }
           
        return $getPatientProfilByID;
    }
    public function changePatientProfil() {
           // Préparation de la requête d'update de patient dans la BDD.
           $queryUpdatePatient = 'UPDATE `patients` '
                   . 'SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail ' 
                   . 'WHERE `id` = :id';
           $updatePatient = $this->connexion->prepare($queryUpdatePatient);
           // on attribue les valeurs via bindValue et on recupère les attributs de la classe via $this
           $updatePatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
           $updatePatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
           $updatePatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
           $updatePatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
           $updatePatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
           $updatePatient->bindValue(':id', $this->id, PDO::PARAM_INT);
           // On exécute la requête.
           return $updatePatient->execute(); 
          
    }
    
   /*
    * méthode magique destruct et arrêt de la connexion
    */
    public function __destruct(){
        $this->connexion= NULL;
    }
}

?>
