
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Exercices PDO</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="assets/css/mdb.min.css" rel="stylesheet">
        <!-- Your custom styles (optional) -->
        <link href="assets/css/styleMe.css" rel="stylesheet">
    </head>
    <body>
        <!--Main Navigation-->
        <header>

            <nav class="navbar fixed-top navbar-collapse navbar-expand-lg navbar-dark bg-dark scrolling-navbar">
                <a class="navbar-brand" href="#"><strong>PDO</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                        </li>
                        <!-- Dropdown -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PARTIE 1</a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="view/view1.php">Exercice 1</a>
                                <a class="dropdown-item" href="view/view2.php">Exercice 2</a>
                                <a class="dropdown-item" href="view/view3.php">Exercice 3 </a>
                                <a class="dropdown-item" href="view/view4.php">Exercice 4 </a>
                                <a class="dropdown-item" href="view/view5.php">Exercice 5 </a>
                                <a class="dropdown-item" href="view/view6.php">Exercice 6 </a>
                                <a class="dropdown-item" href="view/view7.php">Exercice 7  </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PARTIE 2 exercices 1 à 7</a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="../PDO2_exo1/AjoutPatient.php">Exercice 1</a>
                                <a class="dropdown-item" href="../PDO2_exo1/liste-patients.php">Exercice 2</a>
                                <a class="dropdown-item" href="../PDO2_exo1/profil-patient.php">Exercice 3 </a>
                                <a class="dropdown-item" href="../PDO2_exo1/changePatient.php">Exercice 4 </a>
                                <a class="dropdown-item" href="../PDO2_exo1/ajout-rendezvous.php">Exercice 5 </a>
                                <a class="dropdown-item" href="../PDO2_exo1/liste-rendezvous.php">Exercice 6 </a>
                                <a class="dropdown-item" href="../PDO2_exo1/changeAppointment.php">Exercice 7  </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PARTIE 2 exercices 8 à 13</a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="../PDO2_exo1/rendezvous.php">Exercice 8 </a>
                                <a class="dropdown-item" href="../PDO2_exo1/profil-patient.php">Exercice 9 </a>
                                <a class="dropdown-item" href="#">Exercice 10 </a>
                                <a class="dropdown-item" href="#">Exercice 11 </a>
                                <a class="dropdown-item" href="#">Exercice 12  </a>
                                <a class="dropdown-item" href="#">Exercice 13  </a>
                            </div>
                        </li>
                                <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PARTIE TP</a>
                            <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#">TP 1</a>
                                <a class="dropdown-item" href="#">TP 2</a>

                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/La-Manu/Exercices-PDO-partie-1"><i class="fab fa-github"></i>PARTIE 1</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/La-Manu/Exercices-PDO-partie-2"><i class="fab fa-github"></i>PARTIE 2</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://github.com/La-Manu/PDO-TP"><i class="fab fa-github"></i>TP</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!--Main Navigation-->
        <!-- Footer -->
        <footer class="page-footer font-small dark bg-dark pt-4 fixed-bottom">
            <!-- Footer Links -->
            <div class="container text-center text-md-left">
                <!-- Grid row -->
                <div class="row d-flex align-items-center">
                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8">
                        <!--Copyright-->
                        <a class="text-center text-md-left" href="https://fredfauq.github.io./">©copyright 2018  -  Frédéric Fauquembert
                        </a>
                    </div>
                    <!-- Grid column -->
                    <!-- Grid column -->
                    <div class="col-md-5 col-lg-4 ml-lg-0">
                        <!-- Social buttons -->
                        <div class="text-center text-md-right">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-li mx-1" href="https://www.linkedin.com/in/frédéric-fauquembert-2bb319105">
                                        <i class="fab fa-linkedin fa-2x"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn-floating btn-li mx-1" href="https://discordapp.com/channels/405280007817003009/452053122714435584/">
                                        <i class="fab fa-discord fa-2x"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
            <!-- Footer Links -->
        </footer>
        <!-- Footer -->
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="assets/js/mdb.min.js"></script>
</body>
</html>
