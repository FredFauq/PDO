<?php
include'database.php';
include'modelAppointments.php';
include'modelPatient.php';
include'controllerProfilPatient.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/styleMe.css" />
        <title>Exercice 3 PDO partie 2</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="list offset-2 col-8 text-center">
                    <div class="firstTest offset-1 col-9 text-center">           
                    <h3> - Profil Patient - </h3>
                    <?php
                    if($getAppointmentsByPatient == false) {
                    ?>
                    <p>Il y a eu un probleme</p>
                    <?php   
                    }
                    ?>
                        <table class="col-12 text-center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date de naissance</th>
                                <th>Téléphone</th>
                                <th>Courriel</th>
                                <th>Modif</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr>
                                    <td><?= $getPatientProfilByID->id ?></td>
                                    <td><?= $getPatientProfilByID->lastname ?></td>
                                    <td><?= $getPatientProfilByID->firstname ?></td>
                                    <td><?= $getPatientProfilByID->birthdate ?></td>
                                    <td><?= $getPatientProfilByID->phone ?></td>
                                    <td><?= $getPatientProfilByID->mail ?></td>
                                    <td><a href="changePatient.php?id=<?= $patient->id ?>"><i class="far fa-address-book"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>  
                </div>
            </div>
             <div class="row">
                <div class="list offset-2 col-8 text-center">
                    <div class="firstTest offset-1 col-9 text-center">           
                    <h3> - Rendez-vous du Patient - </h3>
                        <table class="col-12 text-center">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Modif</th>
                            </tr>
                        </thead>
                        <tbody>
                               <?php foreach ($appointmentsByPatientFound AS $appointment) { ?>
                                            <tr>
                                                <td><?= $appointment->date ?></td>
                                                <td><?= $appointment->hour ?></td>
                                                <td><a href="rendezvous.php?id=<?= $appointment->id ?>"><i class="far fa-calendar-plus"></i></i></a></td>                                        
                                            </tr>
                                <?php } ?>
                        </tbody>
                        </table>
                    </div>  
                </div>
            </div>
            <a href="../PDO_exo1/index.php"><i class="fas fa-sign-out-alt fa-4x"></i></a>
        </div>
    </body>
</html>

