<?php

if (isset($_GET['idrdv'])) {
    $deleteAppointment = NEW appointments();
    $deleteAppointment->id = $_GET['idrdv'];
    $deleteAppointmentResult = $deleteAppointment->deleteAppointment();
    if ($deleteAppointmentResult == false) {
        $deleteError = 'le rendez-vous n\'a pas pu être supprimé';
    }
}
$appointment = NEW appointments();
$appointmentList = $appointment->getAppointmentList();
?>
