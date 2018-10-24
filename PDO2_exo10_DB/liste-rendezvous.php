<?php
//si plusieurs includes n'en prend qu'un en compte.
include_once '../models/database.php';
include '../models/appointments.php';
include '../controllers/controllerRendezvous.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/minty/bootstrap.min.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" />
        <link rel="stylesheet" href="../assets/css/style.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <title>Liste des patients</title>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php if (isset($deleteError)) { ?>
                        <p> <?= $deleteError ?> </p>
                    <?php } ?>
                    <table class="table table-striped table-light text-center mt-5">
                        <thead>
                        <th colspan="4">Liste des rendez-vous</th>
                        <tr>
                            <th></th>
                            <th>Dates</th>
                            <th>Heures</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($appointmentList as $appointmentDetail) { ?>
                                <tr>
                                    <td> <a href="liste-rendezvous.php?idrdv=<?= $appointmentDetail->id ?>" class="btn btn-danger" role="button" aria-pressed="true"><i class="far fa-trash-alt"></i></a></td>
                                    <td> <?= $appointmentDetail->date ?> </td>
                                    <td> <?= $appointmentDetail->hour ?> </td>
                                    <td> <a href="rendezvous.php?id=<?= $appointmentDetail->idPatients ?>" class="btn btn-secondary" role="button" aria-pressed="true">+ d'infos</a> </td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                    <a href="ajout-rendezvous.php" class="btn btn-primary btn-lg active w-100" role="button" aria-pressed="true">Nouveau rendez-vous</a>
                </div>
            </div>
        </div>
    </body>
</html>
