<?php
// on instancie une variable $patient pour l'objet patients
$patient = NEW patients();
// on récupére l'id dans la variable
$patient->id = $_GET['id'];
// on instancie une variable $getPatientProfil pour la méthode getPatientProfil
$getPatientProfilByID = $patient->getPatientProfilByID();
// on instancie une variable $changePatientProfil pour la méthode changePatientProfil
$changePatientProfil = $patient->changePatientProfil();

//déclaration de la regex pour les noms
$regexName = '/^[A-Za-zàèìòùÀÈÌÒÙáéíóúýÁÉÍÓÚÝâêîôûÂÊÎÔÛãñõÃÑÕäëïöüÿÄËÏÖÜŸçÇßØøÅåÆæœ° \'\-]+$/';
//regex pour le numéro de téléphone (commençant obligatoirement par un 0 et contenant 10 chiffres)
$regexPhoneNumber = '/^0[1-68][0-9]{8}/';
//regex pour la date de naissance (aaaa-mm-jj)
$regexBirthDate = '/^[0-9]{4}-[0-9]{2}-[0-9]{2}/';
//regex pour l'adresse mail (autorisation chiffres lettres, obligation de l'@ et .)
$regexMail = '/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/';
//déclaration du tableau d'erreur
$formError = array();

if (isset($_POST['update'])) {
    //vérification par double condition
    //Si le parametre existe
         if (isset($_POST['lastname'])) {
             //si le parametre passe la regex
        if (preg_match($regexName, $_POST['lastname'])) {
            // sécurisation par htmlspecialchars du parametre transmis
            $patient->lastname = htmlspecialchars($_POST['lastname']);
        } else {
            //Sinon afficher le message
            $formError['lastname'] = 'La saisie de votre nom est invalide';
        }
    } else {
        //Sinon afficher le message
        $formError['lastname'] = 'Veuillez indiquer votre nom';
    }
    //vérification par double condition
    if (isset($_POST['firstname'])) {
        if (preg_match($regexName, $_POST['firstname'])) {
            $patient->firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formError['firstname'] = 'La saisie de votre prénom est invalide';
        }
    } else {
        $formError['firstname'] = 'Veuillez indiquer votre prénom';
    }
    //vérification par double condition
    if (isset($_POST['birthdate'])) {
        if (preg_match($regexBirthDate, $_POST['birthdate'])) {
            $patient->birthdate = htmlspecialchars($_POST['birthdate']);
        } else {
            $formError['birthdate'] = 'La saisie de votre date de naissance est invalide';
        }
    } else {
        $formError['birthdate'] = 'Veuillez indiquer votre date de naissance';
    }
    //vérification par double condition
    if (isset($_POST['phone'])) {
        if (preg_match($regexPhoneNumber, $_POST['phone'])) {
            $patient->phone = htmlspecialchars($_POST['phone']);
        } else {
            $formError['phone'] = 'La saisie de votre numéro de téléphone est invalide';
        }
    } else {
        $formError['phone'] = 'Veuillez indiquer votre numéro de téléphone';
    }
    //vérification par double condition
     if (isset($_POST['mail'])) {
        if (preg_match($regexMail, $_POST['mail'])) {
            $patient->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formError['mail'] = 'La saisie de votre mail est invalide';
        }
    } else {
        $formError['mail'] = 'Veuillez indiquer votre mail';
    }
    //vérification qu'il n'y a pas d'erreur par la fonction count
    if (count($formError) == 0){
        $patient->id = $_GET['id'];
        // si la méthode ne renvoie pas d'instance afficher le message
        if (!$patient->changePatientProfil()){
            $formError['update'] = 'Il y a eu un problème';
        }
    } 
}
?>
