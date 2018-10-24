<?php
    include'model/clients5.php';
    include'controller/controller5.php';
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="assets/css/styleMe.css" />
        <title>Exercice 5 PDO</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="firstTest offset-4 col-4 text-center">
                    <h3>Liste des clients dont le nom commence par M :</h3>
                    <div class="container">            
            <?php foreach ($listClientsWithM AS $clients) { ?>
                <p><strong>Nom : </strong><?= $clients->lastName ?><br />
                <strong>Prénom : </strong><?= $clients->firstName?></p>
                <?php } ?>            
                    </div>  
                </div>
             </div>
        </div>
    </body>
</html>
