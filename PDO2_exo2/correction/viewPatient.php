<?php include '../controllers/controllerGetPatient.php' ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Chicle|Spirax" rel="stylesheet" /> 
        <link href="https://fonts.googleapis.com/css?family=Unlock" rel="stylesheet" /> 
        <link rel="stylesheet" href="../assets/css/style.css" />
        <title>Exercice 7 PDO</title>
    </head>
    <body>
        <div  id="container-fluid">
        <?php include 'navbar.php' ?>      
                <h1>listes des patients</h1>
                <table>
                    <thead>
                    <th>id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Infos</th>
                    </thead>
                    <tbody>
                        <?php foreach ($allPatient as $patient) { ?>
                        <tr class="banana">
                                <td><?= $patient->id ?></td>
                                <td><?= $patient->lastname ?></td>
                                <td> <?= $patient->firstname ?></td>
                                <td><a href="profil-patient.php?id=<?= $patient->id ?>">Cliquez ici</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
        </table>
    </div>
</body>
</html>