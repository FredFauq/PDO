<?php

$removePatient = NEW patients();
if (isset($_POST['submit'])) {
    if (isset($_GET['idRemove'])) {
        $removePatient->id = $_GET['idRemove'];
        $removePatientRow = $removePatient->removePatient();
    }
}

$patients = new patients();
//si $_POST['search'] existe
if (isset($_POST['search'])) {
    //je fait passer $_post['search'] dans l'attribut $search qui lui est placer dans l'instance $patient
    $patients->search = $_POST['search'];
    //j'utilise la methode getSearchProfil pour recherche un patient dans la liste
    $showPatientsList = $patients->getSearchProfil();
    //ou sinon j'affiche la liste des patients
} else {
    //j'utilise la methode getPatientsList pour afficher la liste des patients
    $showPatientsList = $patients->getPatientsList();
}
