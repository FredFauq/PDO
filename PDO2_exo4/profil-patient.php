<?php
include 'model/model.php';
include 'controller/controllerProfilPatient.php';
include 'controller/controllerFormModifyPatient.php';
?>
<!DOCTYPE html>
<html lang="fr" >
    <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="assets/css/style.css" />
        <meta charset="utf-8" />
        <title>Patient:</title>
    </head>
    <body id="list-patients">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li>
              <a class="nav-link" href="ajout-patients.php">Ajouter un patient</a></li>
              <a class="nav-link" href="liste-patients.php">Liste des patients</a></li>
                          <a class="nav-link" href="liste-rendezvous.php">Liste des rendez-vous</a>
            </li>
          </ul>
        </div>
      </nav>
                <div >
              <h1>PATIENTS</h1>
              <form action="profil-patient.php?id=<?= $patientUnique->id ?>" method="POST">
                  <div class="form-group">
                      <label for="lastname">Nom</label>
                      <input type="text" class="form-control" name="lastname" id="lastname" value="<?= $patientUnique->lastname ?>"  />
                      <?php if(isset($formError['lastname'])){ ?>
                      <p class="text-danger"><?= $formError['lastname']; ?></p>
                      <?php } ?>
                      <label for="firstname">Prénom</label>
                      <input type="text" class="form-control" name="firstname" id="firstname"  value="<?= $patientUnique->firstname ?>"/>
                      <?php if(isset($formError['firstname'])){ ?>
                      <p class="text-danger"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?></p>
                      <?php } ?>
                      <label for="birthDate">Date de naissance</label>
                      <input type="date" class="form-control" name="birthdate" id="birthdate" value="<?= $patientUnique->birthdate ?>"/>
                      <?php if(isset($formError['birthdate'])){ ?>
                      <p class="text-danger"><?= isset($formError['birthdate']) ? $formError['birthdate'] : '' ?></p>
                      <?php } ?>
                      <label for="mail">Adresse mail</label>
                      <input type="text" class="form-control" name="mail" id="mail" value="<?= $patientUnique->mail ?>"/>
                      <?php if(isset($formError['mail'])){ ?>
                      <p class="text-danger"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></p>
                      <?php } ?>
                      <label for="phone">Téléphone</label>
                      <input type="text" class="form-control" name="phone" id="phone" value="<?= $patientUnique->phone ?>"/>
                      <?php if(isset($formError['mail'])){ ?>
                      <p class="text-danger"><?= isset($formError['phone']) ? $formError['phone'] : '' ?></p>
                      <?php } ?>
                      <input type="submit" name="submit" id="submit" value="VALIDATION"/>
                  </div>
              </form>
              <p class="text-danger"><?= isset($formError['submit']) ? $formError['submit'] : '' ?></p>
  </div>
            </div>
        </div>
    </body>
</html>
