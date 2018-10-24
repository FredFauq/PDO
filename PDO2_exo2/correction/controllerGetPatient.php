<?php
include '../model/modelPatient.php';
$instanceAllPatient = NEW patients();
$allPatient = $instanceAllPatient->getPatientsList();