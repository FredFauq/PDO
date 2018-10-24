<?php
include 'models/patients.php';
include 'controllers/Ctl1patient.php';
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

        <table class="table">
            <thead class=" aqua-gradient white-text">
            <h1>Liste de tout les patients</h1>
            <!--création d'un tableau pour afficher la liste des clients-->
            <div class="content">
                <div class="row">
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col" >Prénom</th>
                        <th scope="col" >Date de naissance</th>
                        <th scope="col">Numéro de téléphone</th>
                        <th scope="col">Email</th>
                        <th scope="col">id</th>
                    </tr>
                </div>
            </div>
        </div>
        
      
            <tr>
                <td><?= $profilList->lastname ?></td>
                <td><?= $profilList->firstname ?></td>
                <td><?= $profilList->birthdate ?></td>
                <td><?= $profilList->phone ?></td>
                <td><?= $profilList->mail ?></td>
                <td><?= $profilList->id ?></td>
        
            </tr> 
                   
    </table> 

</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.11/js/mdb.min.js"></script></body>
</html>