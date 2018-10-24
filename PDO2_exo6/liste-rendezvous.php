<?php
include'../controllers/appointmentListCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../assets/css/style.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <title>Exercices PDO Partie 2</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <!--Incorporation du header-->
                <?php include'../includeFilesPHP/header.php'; ?>
                <!--Incorporation de la barre de navigation-->
                <?php include'../includeFilesPHP/nav.php' ?>
                <!--Block de liste des patients-->
                <section id="patientList" class="col-xl-9 col-lg-9 col-md-9 col-sm-9 col-xs-12 p-0 text-center">
                    <h1>Liste des rendez-vous</h1>
                    <p><a href="ajout-rendezvous.php">Création de rendez-vous</a></p>
                    <?php
                    //Condition pour afficher les patients avec foreach
                    foreach ($showAppointmentList as $displayAppointmentList) {
                        ?>
                        <div class="listAppointment text-center col-12">
                            <a href="rendez-vous.php?id=<?=$displayAppointmentList->id?>" class="aListLink">
                                <p><?=$displayAppointmentList->date?> à <?=$displayAppointmentList->hour?></p>
                            </a>
                            <form method="POST" action="?idRemove=<?= $displayAppointmentList->id ?>">
                                <input type="submit" value="supprimer" name="submit" />
                            </form>
                        </div>
                    <?php } ?>
                </section>
            </div>    
        </div>
    </body>
</html>