<?php
include 'database.php';
include 'modelPatient.php';
include 'modelAppointments.php';
include 'controllerAddAppointment.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/css/styleMe.css" />
        <title>Prise de Rendez-vous</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="well-block">
                        <div class="well-title">
                            <h2>Inscription rendez-vous</h2>
                        </div>
                        <form action="ajout-rendezvous.php" method="POST">
                            <!-- Form start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label" for="patients">Patient</label>
                                        <select name="patients"  id= "patients">
                                            <option selected disabled>Veuillez selectionner un patient</option> 
                                            <?php foreach ($getPatientList AS $patients) { ?>
                                                <option value="<?= $patients->id ?>"><?= $patients->lastname . ' ' . $patients->firstname ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label" for="date">Date</label>
                                        <input id="date" name="date" type="date" class="form-control input-md"/>
                                        <?php if (isset($formError['date'])) { ?>
                                            <p class="text-danger"><?= isset($formError['date']) ? $formError['date'] : '' ?></p>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="offset-1 col-md-5">
                                    <div class="form-group">
                                        <label class="control-label" for="hour">Heure</label>
                                        <input id="hour" name="hour" type="time" class="form-control input-md" />
                                        <?php if (isset($formError['hour'])) { ?>
                                            <p class="text-danger"><?= isset($formError['hour']) ? $formError['hour'] : '' ?></p>
                                        <?php } ?>
                                    </div>
                                </div>

                                <!-- Button -->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" id="submit" name="submit" class="btn btn-default" value="VALIDATION">Inscrire le rendez-vous</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- form end -->
                    </div>
                </div>
            </div>
            <?php
            if (isset($formError['submit'])) {
                ?>
                <p><?= $formError['submit'] ?></p>
                <?php
            }
            ?>
            <a href="../PDO_exo1/index.php"><i class="fas fa-sign-out-alt fa-4x"></i></a>
        </div>
    </body>
</html>
