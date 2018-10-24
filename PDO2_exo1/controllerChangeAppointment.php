<?php
// nouvel objet pour faire l'update
if (isset($_POST['submit'])) {
    $updateAppointment = NEW appointments();
    $updateAppointment->id = $_GET['id'];
    // on initialise le tableau $formError
    $formError = array();
    //regex pour la date (aaaa-mm-jj)
    $regexDate = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}/';
    //regex pour l'heure (00:00)
    $regexHour = '/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/';

    if (!empty($_POST['date'])){
        if(preg_match($regexDate, $_POST['date'])) {
           $date = $_POST['date'];
        } else {
            $formError['date'] = 'La date n\'est pas valide';
        }
    } else {
        $formError['date'] = 'La date est obligatoire';
    }
    
     if (!empty($_POST['hour'])){
        if(preg_match($regexHour, $_POST['hour'])) {
           $hour = $_POST['hour'];
        } else {
            $formError['hour'] = 'L\'heure n\'est pas valide';
        }
    } else {
        $formError['hour'] = 'L\'heure est obligatoire';
    }
     if (!empty($_POST['patient'])) {
        if (is_numeric($_POS['patient'])) {
            $updateAppointment->idPatients = $_POST['patient'];
        } else {
            $formError['patient'] = 'Le patient est invvalide';
        }
    } else {
        $formError['patient'] = 'Le patient est obligatoire';
    }
    
    if (count($formError) == 0) {
        $updateAppointment->dateHour = $date . ' ' . $hour;
        $updateAppointment->updateAppointment();
    }
}
$appointment = NEW appointments();
$appointment->id = $_GET['id'];
$appointmentFound = $appointment->getAppointmentById();
// si le RDV n'existe pas
if ($appointmentFound == false) {
    header('Location: ajout-rendezvous.php');
    exit;
}
$patient = NEW patients();
$getPatientList = $patient->getPatientList();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

