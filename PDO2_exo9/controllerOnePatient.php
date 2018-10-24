<?php

if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
    $patient = new patients();
    $patient->id = $_GET['id'];
    /* Regex */
    $regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
    $regexbirthdate = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}/';
    $regexPhone = '/^0[1-9][0-9]{8}/';
    $regexMail = '/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
    /* Variable form error */
    $formError = array();

    if (isset($_POST['submit'])) {

        /* verification input lastname */
        if (isset($_POST['lastname'])) {
            if (preg_match($regexName, $_POST['lastname'])) {
                $patient->lastname = htmlspecialchars($_POST['lastname']);
            } else {
                $formError['lastname'] = 'Saisie invalide';
            }
        }

        /* verification input firstname */
        if (isset($_POST['firstname'])) {
            if (preg_match($regexName, $_POST['firstname'])) {
                $patient->firstname = htmlspecialchars($_POST['firstname']);
            } else {
                $formError['firstname'] = 'Saisie invalide';
            }
        }

        /* verification input birthdate */
        if (isset($_POST['birthdate'])) {
            if (preg_match($regexbirthdate, $_POST['birthdate'])) {
                $patient->birthdate = htmlspecialchars($_POST['birthdate']);
            } else {
                $formError['birthdate'] = 'Saisie invalide';
            }
        }

        /* verification input phone */
        if (isset($_POST['phone'])) {
            if (preg_match($regexPhone, $_POST['phone'])) {
                $patient->phone = htmlspecialchars($_POST['phone']);
            } else {
                $formError['phone'] = 'Saisie invalide';
            }
        }

        /* verification input mail */
        if (isset($_POST['mail'])) {
            if (preg_match($regexMail, $_POST['mail'])) {
                $patient->mail = htmlspecialchars($_POST['mail']);
            } else {
                $formError['mail'] = 'Saisie invalide';
            }
        }

        if (count($formError) == 0) {
            $updatePatients = $patient->modifyPatient();
        }
    }
    $showOnePatientDetails = $patient->showOnePatient();
    if ($showOnePatientDetails == FALSE) {
        header('Location: liste-patients.php');
        exit;
    }
    $appointment = new appointments();
    $appointment->idPatients = $patient->id;
    $appointmentList = $appointment->getAppointmentByIdPatients();
} else {
    header('Location: liste-patients.php');
    exit;
}
?>
