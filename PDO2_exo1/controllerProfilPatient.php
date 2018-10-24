<?php
// on instancie une variable $patient pour l'objet patients
$patient = NEW patients();
if(!empty($_GET['id']) && is_numeric($_GET['id'])){
// on récupére l'id dans la variable
$patient->id = $_GET['id'];
// on instancie une variable $getPatientProfilByID
$getPatientProfilByID = $patient->getPatientProfilByID();
// instanciation de la table appointments dans la variable $getAppointmentByPatient
$getAppointmentsByPatient = NEW appointments();
// instanciation de la récupération de idPatients par le get de l'url
$getAppointmentsByPatient->idPatients = $_GET['id']; 
// instanciation de la méthode appointmentsByPatient
$appointmentsByPatientFound = $getAppointmentsByPatient->appointmentsByPatient();
} else {
    header('Location: liste-patients.php');
    exit;
}
?>
