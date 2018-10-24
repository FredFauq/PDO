<?php
include'database.php';
include'modelPatient.php';
include'modelAppointments.php';
include'controllerGetAppointmentsList.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/styleMe.css" />
        <title>Exercice 6 PDO partie 2</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="list offset-2 col-8 text-center">
                    <div class="firstTest offset-2 col-8 text-center">           
                    <h3>- Liste des rendez-vous -</h3>
                        <table class="col-12 text-center">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Date</th>
                                <th>Heure</th>
                                <th>Id Patient</th>
                                <th>Modification</th>
                                <th>Suppression</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($getAppointmentsList AS $appointmentDetail){ ?>
                                <tr>
                                    <td><?= $appointmentDetail->id ?></td>
                                    <td><?= $appointmentDetail->date ?></td>
                                    <td><?= $appointmentDetail->hour ?></td>
                                    <td><?= $appointmentDetail->idPatients ?></td>
                                    <td><a href="rendezvous.php?id=<?= $appointmentDetail->id ?>"><i class="far fa-calendar-plus"></i></a></td>
                                    <td><a href="liste-rendezvous.php?idRDV=<?= $appointmentDetail->idPatients ?>"><i class="far fa-trash-alt"></i></a></td>
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