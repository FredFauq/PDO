<?php
include'../model/clients.php';
include'../controller/controller7.php';
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
        <link rel="stylesheet" href="../assets/css/style.css" />
        <title>Exercice PDO</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="list offset-4 col-4 text-center">
                    <h3>Liste des clients :</h3>
                    <div class="container">            
                        <?php foreach ($clientList AS $clients) { ?>
                            <p><strong>Nom : </strong><?= $clients->lastName ?><br />
                                <strong>Prénom : </strong><?= $clients->firstName ?><br />
                                <strong>Date de naissance : </strong><?= $clients->birthDate ?><br />
                                <strong>Carte de fidélité : </strong><?= $clients->case ?><br />
                                <?php if ($clients->case == 'OUI') { ?>
                                    <strong>N° de Carte : </strong><?= $clients->cardNumber ?>
                                </p>
                                <?php
                            }
                        }
                        ?>            
                    </div>  
                </div>
            </div>
            <a href="../index.php"><i class="fas fa-sign-out-alt fa-4x"></i></a>
        </div>
    </body>
</html>