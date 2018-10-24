<?php
include'database.php';
include'modelPatient.php';
include'controllerChangePatient.php';
?>
<!DOCTYPE html>
<html>
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
        <title>Modification Patient</title>
    </head>
    <body>
        <!-- si les champs sont remplis et corrects, afficher les variables -->
        <?php if (isset($_POST['update']) && (count($formError) === 0)) { ?> 
            <p id="ok">Les données ont été enregistrées</p>
            <p id="ok"><a href="changePatient.php" title="lien vers modification de patient" alt="modification de patient"><button type="button" class="btn btn-dark">MODIFICATION PATIENT</button></a></p>
            <a href="../PDO_exo1/index.php"><i class="far fa-caret-square-up fa-4x"></i></a>
        <?php } else { ?>   
            <div class="container-fluid">
                <div class="row">
                    <div id="formBox" class="offset-3 col-6 offset-3">
                    <h2>Modification Patient</h2>
                        <form action="changePatient.php" method="POST">
                            <div class="form-group">
                                <label for="lastname">Nom</label>
                                <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $getPatientProfilByID->lastname ?>"/>
                                <?php if(isset($formError['lastname'])){ ?>
                                <p class="text-danger"><?= $formError['lastname']; ?></p>
                                <?php } ?>
                                <label for="firstname">Prénom</label>
                                <input type="text" class="form-control" name="firstname" id="firstname" value="<?= $getPatientProfilByID->firstname ?>"/>
                                <?php if(isset($formError['firstname'])){ ?>
                                <p class="text-danger"><?= $formError['firstname']; ?></p>
                                <?php } ?>
                                <label for="birthDate">Date de naissance</label>
                                <input type="date" class="form-control" name="birthdate" id="birthdate" value="<?= $getPatientProfilByID->birthdate ?>"/>
                                <?php if(isset($formError['birthdate'])){ ?>
                                <p class="text-danger"><?= $formError['birthdate']; ?></p>
                                <?php } ?>
                                <label for="phone">Téléphone</label>
                                <input type="text" class="form-control" name="phone" id="phone"  value="<?= $getPatientProfilByID->phone ?>"/>
                                <?php if(isset($formError['phone'])){ ?>
                                <p class="text-danger"><?= $formError['phone']; ?></p>
                                <?php } ?>
                                <label for="mail">Adresse mail</label>
                                <input type="text" class="form-control" name="mail" id="mail" value="<?= $getPatientProfilByID->mail ?>"/>
                                <?php if(isset($formError['mail'])){ ?>
                                <p class="text-danger"><?= $formError['mail']; ?></p>
                                <?php } ?>
                                <div id="valid">
                                    <input class="btn btn-primary" type="submit" name="update" id="update" value="VALIDATION"/>
                                </div>
                            </div> 
                        <p class="text-danger"><?= isset($formError['update']) ? $formError['update'] : '' ?></p>
                        </form>
                    </div>
                </div>
            </div>
                  <div class="row">
                <div id="box" class="offset-3 col-6 offset-3">
                 <a href="../PDO_exo1/index.php"><i class="fas fa-sign-out-alt fa-4x"></i></a>
                </div>
                </div>
        <?php } ?>
    </body>
</html>

