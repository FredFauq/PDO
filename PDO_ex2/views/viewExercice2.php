<?php
include '../controllers/controllerExercice2.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr" />
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../assets/css/style.css" />
  <title>Exercice 2 PDO</title>
</head>
<body>
  <h1>Liste des types de show</h1>
  <select>
    <?php foreach($showTypesList as $showTypesDetail){ ?>
      <option value="<?= $showTypesDetail->id ?>"><?= $showTypesDetail->type ?></option>
    <?php } ?>
  </select>
  <!--Création d'un tableau qui affichera les types de show-->
  <table>
    <thead>
      <tr>
        <th>Type de show</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($showTypesList as $showTypesDetail){ ?>
        <tr>
          <td><?= $showTypesDetail->type ?></td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>
