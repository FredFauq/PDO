<?php
// je décide de limiter mes résultats à 5
$limit = 5;
// on recupère le numéro de la page s'il n'y a pas de numéro on lui attribut 1  

//instanciation de l'objet patients 
$patients = new patients();
// On récupére le nombre de patients 
$numberOfResults = $patients->numberOfResults();
// on calcule le nombre de pages et on arrondit au nombre supérieur 
$numberOfPages = ceil($numberOfResults->countResults / $limit);
if(!empty($_GET['page'])){
    if(!is_numeric($_GET['page']) || $_GET['page'] > $numberOfPages || $_GET['page'] <= 0){
        $page = 1;
    } else {
        $page = $_GET['page']; 
    }
} else {
    $page = 1;
}
// On calcule le nombre de resultat qu'on ne prend pas en compte 
$offset = ($page - 1) * $limit;
$listPatients = $patients->getPatientsListByFive($limit, $offset);