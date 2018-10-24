<?php
//on instancie l'objet patients
$patientInfo = NEW patients();

$patientInfo->id = $_GET['id'];



$appointmentInfo = NEW appointments();

$appointmentInfo->idPatients = $_GET['id'];
$appointmentInfoList = $appointmentInfo->getAppointmentInfoList();


//regex nom, prénom
$regexNameFirstname = '/^[a-zA-Z\-éèêëïîôöâäç]+$/';
//regex téléphone
$regexPhone = '/^0[0-9]{9}$/';
//tableau d'erreur
$formError = array();
//Si LastName existe , la passer au test regex , si elle passe la stocker dans $lastName sinon c'est vide
if (isset($_POST['submitModify'])) {
    $modifPatient = NEW patients();
    $modifPatient->id = $_GET['id'];

    if (!empty($_POST['lastname'])) {
        if (preg_match($regexNameFirstname, $_POST['lastname'])) {
            $lastname = htmlspecialchars($_POST['lastname']);
            $modifPatient->lastname = $lastname;
        } else {
            $formError['lastname'] = 'Saisie invalide';
        }
    } else {
        $formError['lastname'] = 'Champs obligatoire';
    }

    if (!empty($_POST['firstname'])) {
        if (preg_match($regexNameFirstname, $_POST['firstname'])) {
            $firstname = htmlspecialchars($_POST['firstname']);
            $modifPatient->firstname = $firstname;
        } else {
            $formError['firstname'] = 'Saisie invalide';
        }
    } else {
        $formError['firstname'] = 'Champs obligatoire';
    }

    if (!empty($_POST['birthdate'])) {
        $birthdate = htmlspecialchars($_POST['birthdate']);
        $modifPatient->birthdate = $birthdate;
    } else {
        $formError['birthdate'] = 'Champs obligatoire';
    }

    if (!empty($_POST['phone'])) {
        if (preg_match($regexPhone, $_POST['phone'])) {
            $phone = htmlspecialchars($_POST['phone']);
            $modifPatient->phone = $phone;
        } else {
            $formError['phone'] = 'Saisie invalide';
        }
    } else {
        $formError['phone'] = 'Champs obligatoire';
    }

    if (!empty($_POST['mail'])) {
        if (FILTER_VAR($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $mail = htmlspecialchars($_POST['mail']);
            $modifPatient->mail = $mail;
        } else {
            $formError['mail'] = 'Saisie invalide';
        }
    } else {
        $formError['mail'] = 'Champs obligatoire';
    }

    if (count($formError) == 0) {
        if (!$modifPatient->updatePatient()) {
            $formError['submitModify'] = 'Il y a eu un problème';
        }
    }
}
//on appelle la méthode
$patientInfoList = $patientInfo->getPatientInfoList();
?>

