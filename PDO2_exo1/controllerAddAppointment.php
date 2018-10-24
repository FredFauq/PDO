<?php
//on instancie une variable $patient pour l'objet patients
$patients = NEW patients();
//on instancie une variable $getPatientProfil pour la méthode getPatientProfil
$getPatientList = $patients->getPatientList();
$hour='00:00';
$date='1900-01-01';
//regex pour la date (aaaa-mm-jj)
$regexDate = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}/';
//regex pour l'heure (00:00)
$regexHour = '/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/';
//déclaration du tableau d'erreur
$formError = array();

if (isset($_POST['submit'])) {
    //on instancie la classe appointments
    $appointments = NEW appointments();
    if (!empty($_POST['date'])) {
        if (preg_match($regexDate, $_POST['date'])) {
            $date = htmlspecialchars($_POST['date']);
        } else {
            $formError['date'] = 'La saisie de la date et l\'heure est invalide';
        }
    } else {
        $formError['date'] = 'Veuillez indiquer la date';
    }
    
    if (!empty($_POST['hour'])) {
        if (preg_match($regexHour, $_POST['hour'])) {
            $hour = htmlspecialchars($_POST['hour']);
            
        } else {
            $formError['hour'] = 'La saisie de l\'heure est invalide';
        }
    } else {
        $formError['hour'] = 'Veuillez indiquer l\'heure';
    }
    
    //On test la valeur idPatient l'array $_POST pour savoir si elle existe
    //Si nous attribuons à idPatients la valeur du $_POST
    if (!empty($_POST['patients'])) {
        // OU si le formulaire a été validé mais que il n'y a pas d'élément sélectionné dans le menu déroulant
        // on crée un message d'erreur pour pouvoir l'afficher
        if (!is_nan($_POST['patients'])) {  
            $appointments->idPatients = htmlspecialchars($_POST['patients']);
        } else {
            $formError['patients'] = 'Veuillez sélectionner uniquement un patient de la liste';
        }
    } else {
            $formError['patients'] = 'Veuillez sélectionner un patient';
        }

    
    if (count($formError) == 0) {
    $appointments->dateHour = $date . ' ' . $hour;
    $check =  $appointments->checkFreeAppointment();
        if($check === '0') {
      if(!$appointments->addAppointments()) {
          $formError['submit']= 'Il y a un problème';
        }
      } elseif ($check === FALSE){
          $formError['submit']= 'Il y a un problème';
      } else {
          $formError['submit']= 'Le RDV est déjà pris';
      }
    }
        $formError['submit']= 'Le rendez-vous est enregistré !';
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

