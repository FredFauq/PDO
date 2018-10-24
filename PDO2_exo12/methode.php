<?php

//Déclaration de la méthode findPatientByLastname($search)
public function findPatientByLastname($search)
{   //Déclaration du tableau vide $findPatientList
    $findPatientList = array();
    //Préparation de la requete et intégration dans $findPatient
    $findPatient = $this->connexion->prepare(
            'SELECT `id`, `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`, `phone`, `mail` '
            . 'FROM `patients` '
            . 'WHERE `lastname` LIKE :search OR `firstname` LIKE :search ORDER BY `lastname`');
    //Récupération de la valeur de $search passé en parametre de la méthode dans la fonction bindValue() pour le filtrage, ajout des modulos
    $findPatient->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
    //Si $findPatient est éxécuté
    if ($findPatient->execute())
    {   //Si $findPatient est un objet
        if (is_object($findPatient))
        {   //Récupération du résultat de la requete dans $findPatientList
            $findPatientList = $findPatient->fetchAll(PDO::FETCH_OBJ);
            //Sinon
        } else {
            //Attribuer FALSE a $findPatientList
            $findPatientList = FALSE;
        }
      //Sinon
    } else {
        //Attribuer FALSE a $findPatientList
        $findPatientList = FALSE;
    }
    //Retourner $findPatientList
    return $findPatientList;
}
