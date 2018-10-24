<?php
include '../models/patients.php';
include '../models/appointments.php';
include '../controllers/controllerPatientInfo.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.1.3/minty/bootstrap.min.css" />
        <link rel="stylesheet" href="../assets/css/style.css" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <title>Informations du patient</title>
    </head>
    <body>
        <?php include 'navbar.php' ?>
        <div class="container">
            <?php
            if (isset($_POST['modify']) || isset($_POST['submitModify'])) {
                if (isset($_POST['submitModify']) && (count($formError) == 0)) {
                    ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6">  
                            <form action="#" method="POST">
                                <input class="btn btn-success btn-lg w-100" type="submit" value="Modifier" name="modify" /> 
                            </form>
                            <table class="table table-striped table-light text-center mt-5">
                                <tr>
                                    <th scope="row">Nom</th>
                                    <td><?= $lastname ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Prénom</th>
                                    <td><?= $firstname ?></td>
                                </tr>

                                <tr>
                                    <th scope="row">Date de naissance</th>
                                    <td><?= $birthdate ?></td>
                                </tr>

                                <tr>
                                    <th scope="row">Téléphone</th>
                                    <td><?= $phone ?></td>
                                </tr>

                                <tr>
                                    <th scope="row">Mail</th>
                                    <td><?= $mail ?></td>
                                </tr>

                                <tr>
                                    <th colspan="2" scope="row">Rendez-vous</th>
                                </tr>

                                <?php
                                foreach ($appointmentInfoList AS $appointmentInfoDetail) {
                                    ?>
                                    <tr>
                                        <td colspan="2"> <?= $appointmentInfoDetail->dateHour ?> </td>

                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>  

                            <a href="liste-patients.php" class="btn btn-secondary btn-lg active w-100" role="button" aria-pressed="true">Retour patients</a>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>   
                    <h2><span class="badge badge-pill badge-success">Modifier le patient</span></h2>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="lastname">Nom : </label>
                            <!--stock la saisie dans le champ-->
                            <input type="text" class="form-control is-valid" name="lastname" id="lastname" value="<?= $patientInfoList->lastname ?>" />
                            <!--affiche sous le champs le texte d'erreur-->
                            <?php if (isset($formError['lastname'])) { ?>
                                <p class="text-danger"> <?= $formError['lastname'] ?> </p>
                            <?php } ?>

                            <label for="firstname">Prénom : </label>                           
                            <input type="text" class="form-control is-valid" name="firstname" id="firstname"  value="<?= $patientInfoList->firstname ?>" />
                            <?php if (isset($formError['firstname'])) { ?>
                                <p class="text-danger"> <?= $formError['firstname'] ?> </p>
                            <?php } ?>

                            <label for="birthdate">Date de naissance : </label>
                            <input type="date" class="form-control is-valid" name="birthdate" id="birthdate"  value="<?= $patientInfoList->birthdate ?>" />
                            <?php if (isset($formError['birthdate'])) { ?>
                                <p class="text-danger"> <?= $formError['birthdate'] ?> </p>
                            <?php } ?>

                            <label for="phone">Téléphone : </label>
                            <input type="text" class="form-control is-valid" name="phone" id="phone"  value="<?= $patientInfoList->phone ?>" />
                            <?php if (isset($formError['phone'])) { ?>
                                <p class="text-danger"> <?= $formError['phone'] ?> </p>
                            <?php } ?>

                            <label for="mail">Mail : </label>
                            <input type="mail" class="form-control is-valid" name="mail" id="mail"  value="<?= $patientInfoList->mail ?>" />
                            <?php if (isset($formError['mail'])) { ?>
                                <p class="text-danger"> <?= $formError['mail'] ?> </p>
                            <?php } ?>

                            <input class="btn btn-success btn-lg w-100" type="submit" value="Enregistrer les modification" name="submitModify" />  
                            <p class="text-danger"> <?= isset($formError['submitModify']) ? $formError['submitModify'] : ''; ?></p>
                            <a href="profil-<?= $patientInfoList->id ?>-<?= $patientInfoList->lastname ?>-<?= $patientInfoList->firstname ?>.html" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Annuler</a>
                        </div>                            
                    </form>
                    <?php
                }
            } else {
                ?>
                <div class="row justify-content-center">
                    <div class="col-md-6">  
                        <form action="#" method="POST">
                            <input class="btn btn-success btn-lg w-100" type="submit" value="Modifier" name="modify" /> 
                        </form>
                        <table class="table table-striped table-light text-center mt-5">
                            <tr>
                                <th scope="row">Nom</th>
                                <td><?= $patientInfoList->lastname ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Prénom</th>
                                <td><?= $patientInfoList->firstname ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Date de naissance</th>
                                <td><?= $patientInfoList->birthdate ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Téléphone</th>
                                <td><?= $patientInfoList->phone ?></td>
                            </tr>

                            <tr>
                                <th scope="row">Mail</th>
                                <td><?= $patientInfoList->mail ?></td>
                            </tr>


                            <tr>
                                <th colspan="2" scope="row">Rendez-vous</th>
                            </tr>

                            <?php
                            foreach ($appointmentInfoList AS $appointmentInfoDetail) {
                                ?>
                                <tr>
                                    <td> <?= $appointmentInfoDetail->date ?> </td>
                                    <td> <?= $appointmentInfoDetail->hour ?> </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </table>  

                        <a href="liste-patients.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Retour patients</a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div> 
    </body>
</html>