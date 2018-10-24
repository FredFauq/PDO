<?php
include '../model/patients.php';
include '../model/appointments.php';
include '../controler/listsPatientsCtrl.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes"/>
        <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"/> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="../assets/css/style.css"/>
        <title>Hospital E2N - List patient</title>
    </head>
    <body>
        <div class="page">
            <!-- Include Navbar -->
            <?php include '../controler/navbarCtrl.php'; ?>
            <main class="main-block">
                <!-- Content -->
                <div class="container">
                    <div class="row">
                        <table class="table table-bordered text-center table-hover">
                            <thead class="thead-dark">
                                <tr class="title">
                                    <th>Lastname</th>
                                    <th>Firstname</th>
                                    <th class="th-search">
                                        <form class="text-center" method="post" action="#">
                                            <input type="text" class="form-control" name="search" placeholder="Search"/>
                                            <i class="fas fa-search"></i>
                                            <input type="submit" class="form-control" name="searchSubmit"/>
                                        </form>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($showPatientsList as $showPatient) { ?>
                                    <tr class="data">
                                        <td><a href="profil-patient.php?id=<?= $showPatient->id; ?>"><?= $showPatient->lastname ?></a></td>
                                        <td><a href="profil-patient.php?id=<?= $showPatient->id; ?>"><?= $showPatient->firstname ?></a></td>
                                        <td><form method="POST" action="?idRemove=<?= $showPatient->id ?>"><input type="submit" value="Deleted" name="submit" class="btn btn-danger"/></form></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="text-justify text-center rounded col" id="go-create">
                            <p class="font-weight-bold">You dont have an acount?<p>
                                <a class="" href="http://exepdop2/views/add-patient.php" id="redir-add">Click here to create one</a>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Include Footer -->
            <?php include '../controler/footerCtrl.php'; ?>
        </div>
        <!-- Script Bootstrap 4 -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="../assets/js/script.js"></script>
    </body>
</html>
