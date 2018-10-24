<?php
include 'controllers/controllerPatientList.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>Accueil</title>
       <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/css/mdb.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet"> 
        <link rel="stylesheet" href="assets/css/style.css" />
    </head>
    <body class="image">

           <table class="table table-bordered">
  <thead class="aqua-gradient lighten-2 white-text">
            <h1>Liste patients</h1>
            <!--création d'un tableau pour afficher la liste des clients-->
            <div class="content">
                <div class="row">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Profil</th>
                    </tr>
                </div>
            </div>
        </div>
         
        <!-- Boucle foreach pour lire le tableau ligne par ligne -->
        <?php foreach ($profilList AS $onePatient) { ?>
            <tr>
                <td><?= $onePatient->lastname ?></td>
                <td><?= $onePatient->firstname ?></td> 
                <td> <a href="profil-patient.php?id=<?= $onePatient->id ?>">Profil patients</a></td>
            </tr>     
        <?php } ?>  
    </table> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
</body>
</html>

