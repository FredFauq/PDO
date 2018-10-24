<?php
include 'header.php';
include 'models/patients.php';
include 'controllers/patientsListCtl.php';

?>


<div class="row justify-content-center">
    <h2 class="text-center col-md-12">Liste des patients</h2>
    <form action="#" method="POST">
        <div class="form-group">
            <label for="nameAsked">Rechercher un patient : </label>
            <input type="text" id="nameAsked" name="nameAsked" value="" />
            <?php
            if (isset($error)) {
                ?>h
                <p><?= $error ?></p>
            <?php }
            ?>
            <button type="submit">Rechercher</button>
        </div>
    </form>
    <?php
    if (isset($listPatients)) {
        if ($listPatients === false) {
            ?>
            <p>Il y a eu un probleme</p>
            <?php
        } elseif (count($listPatients) === 0) {
            ?>
            <p>Il n'y a aucun resultat</p>
            <?php
        } else {
            ?>

            <table class="text-center col-md-10" border="1">
                <thead>
                    <tr class="text-black">
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Date de naissance</th>
                        <th>Numéro de téléphone</th>
                        <th>Adresse mail</th>
                    </tr>
                </thead>
                <tbody>
        <?php
        foreach ($listPatients AS $patient) {
            ?>
                        <tr>
                            <td><a href="index.php?patient=<?= $patient->id ?>"><?= $patient->lastname ?></a></td>
                            <td><a href="index.php?patient=<?= $patient->id ?>"><?= $patient->firstname ?></a></td>
                            <td><a href="index.php?patient=<?= $patient->id ?>"><?= $patient->birthdate ?></a></td>
                            <td><a href="index.php?patient=<?= $patient->id ?>"><?= $patient->phone ?></a></td>
                            <td><a href="index.php?patient=<?= $patient->id ?>"><?= $patient->mail ?></a></td>
                            <td><a class="btn btn-outline-light"  href="index.php?action=list-patient&delete=<?= $patient->id ?>">Supprimer</a></td>
                        </tr>
        <?php } ?>
                </tbody>
            </table>

    <?php
    }
}
?>
    <div>
        <ul class="pagination">
            <?php if($page > 1){ ?>
            <li class="page-item">
                <a class="page-link" href="liste-patients.php?page=<?= $page-1 ?>">&laquo;</a>
            </li>
            <?php } ?>
            <?php for($i = 1; $i <= $numberOfPages; $i++){?>
            <li class="page-item">
                <a class="page-link" href="liste-patients.php?page=<?= $i ?>"><?= $i ?></a>
            </li>
            <?php } ?>
            <?php if($page < $numberOfPages){ ?>
            <li class="page-item">
                <a class="page-link" href="liste-patients.php?page=<?= $page+1 ?>">&raquo;</a>
            </li>
            <?php } ?>
        </ul>
    </div>
<?php include 'footer.php'; ?>