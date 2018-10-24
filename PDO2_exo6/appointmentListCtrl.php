<?php
//Incorporation du modèle
include'../modals/rendez-vous.php';
//Instanciation de la classe appointments qui liste les rendez vous
$appointmentList = NEW appointments();
//Instanciation appointement pour supprimer une ligne de rendez-vous
    $removeAppointmenturl = NEW appointments();
if (isset($_POST['submit'])) {
//Condition de vérification pour l'id
    if (isset($_GET['idRemove'])) {
        $removeAppointmenturl->id = $_GET['idRemove'];
        //Utilisation de la méthode de suppression
        $removeAppointmentRow = $removeAppointmenturl->removeAppointment();
    }
}
//Utilisation de la méthode appointmentList() qui affiche la liste des rendez-vous
$showAppointmentList = $appointmentList->appointmentList();
?>
