<?php 
//on instancie l'objet patient
$patient = NEW patients();
$patient->id = $_GET['id'];
//on appelle notre méthode getprofilByID
$profilList = $patient->getprofilByID();
?>