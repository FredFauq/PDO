<?php
if (isset($_GET['idRDV'])) {
    $deleteAppointment = NEW appointments();
    $deleteAppointment->id = $_GET['idRDV'];
    $deleteAppointmentResult = $deleteAppointment->deleteAppointment();
    if ($deleteAppointmentResult == false) {
        $deleteError = 'le rendez-vous n\'a pas pu être supprimé';
    }
}

//on instancie une variable $patient pour l'objet patients
$patients = NEW patients();
//on instancie une variable $getPatientProfil pour la méthode getPatientProfil
$getPatientList = $patients->getPatientList();
//on instancie la classe appointments
$appointmentList = NEW appointments();
//on instancie une variable $appointments pour la méthode getRDVlist
$getAppointmentsList = $appointmentList->getAppointmentsList();




/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

