<?php
include'database.php';
include'modelPatient.php';
include'controllerGetPatientsList.php';
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
        <link rel="stylesheet" href="https://bootswatch.com/4/cyborg/bootstrap.min.css" />
        <link rel="stylesheet" href="assets/css/styleMe.css" />
        <title>Exercice 2 PDO partie 2</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="list offset-2 col-8 text-center">
                    <div class="firstTest offset-2 col-8 text-center">           
                        <h3>- Liste des Patients -</h3>
                        <form class="search" method="post" action="liste-patients.php">
                            <input type="text" name="search" placeholder="Recherche..">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                            <?php
                            if (isset($getPatientList)) {
                                if ($getPatientList === false) {
                                    ?>
                                    <p>Il y a eu un problème</p>
                                    <?php
                                } elseif (count($getPatientList) === 0) {
                                    ?>
                                    <p>Il n'y a aucun résultat</p>
                                    <?php
                                } else {
                                    ?>
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Fiche</th>
                                            <th scope="col">Suppression</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($listPatients AS $patient) { ?>
                                            <tr>
                                                <td><?= $patient->id ?></td>
                                                <td><?= $patient->lastname ?></td>
                                                <td><?= $patient->firstname ?></td>
                                                <td><a href="profil-patient.php?id=<?= $patient->id ?>"><i class="far fa-file-alt"></i></a></td>
                                                <td><form method = "POST" action="?id=<?= $patient->id ?>">
                                                        <button type="submit" value="" name="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                }
                                    ?>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                </div>
                <div class="offset-5 col-5">
                    <ul class="pagination">
                        <?php if ($page > 1) { ?>
                            <li class="page-item">
                                <a class="page-link" href="liste-patients.php?page=<?= $page - 1 ?>">&laquo;</a>
                            </li>
                        <?php } ?>
                        <?php for ($i = 1; $i <= $numberOfPages; $i++) { ?>
                            <li class="page-item <?= $_SERVER['PHP_SELF'] == '/liste-patients.php?page=' ?> ? . 'active' : '' ">
                                <a class="page-link" href="liste-patients.php?page=<?= $i ?>"><?= $i ?></a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php if ($page < $numberOfPages) { ?>
                            <li class="page-item">
                                <a class="page-link" href="liste-patients.php?page=<?= $page + 1 ?>">&raquo;</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>

                <a href="../PDO_exo1/index.php"><i class="fas fa-sign-out-alt fa-4x"></i></a>
            </div>
            <?= $_SERVER['PHP_SELF'] ?>
    </body>
</html>