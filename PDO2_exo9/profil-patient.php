<?php include 'model.php'; ?>
<?php include 'appointment.php'; ?>
<?php include 'controller/controllerOnePatient.php'; ?>
<?php include 'header/header.php'; ?>

<script src="js/script.js"></script>
<body>
    <?php include 'navBar/navBar.php'; ?>
    <div id="showPatient" class ="container-fluid">
        <div id="infoBoxShadow">
            <p><?= $showOnePatientDetails->lastname ?></p>
            <p><?= $showOnePatientDetails->firstname ?></p>
            <p><?= $showOnePatientDetails->birthdate ?></p>
            <a id="mail" href="mailto: "><p><?= $showOnePatientDetails->mail ?></p></a>
            <a id="tel" href="tel: "><p><?= $showOnePatientDetails->phone ?></p></a>
            <div id="patientAppointment">
                <?php if($appointmentList === FALSE){ ?>
                <p>Il y a eu un problème.</p>
                 <?php }elseif(count($appointmentList) === 0){ ?>
                <p>Il n'y a pas de rendez-vous pour ce patient.</p>
                 <?php }else{ ?>
                <table>
                    <thead>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Modifier</th>
                    </thead>
                    <tbody>
                        <?php foreach($appointmentList as $appointmentDetails){ ?>
                        <tr>
                            <td><?=$appointmentDetails->date?></td>
                            <td><?=$appointmentDetails->hour?></td>
                            <td><a href="modal/modalModifRdv.php?id=<?=$appointmentDetails->id?>" title="Modification du rendez-vous.">Modifier</a></td>
                        </tr>   
                        <?php } ?>
                    </tbody>
                </table> 
                 <?php } ?>
            </div>
        </div>
        <?php include 'modal/modalModifPatient.php'; ?>
        <?php include 'modal/modalNewAppointment.php'; ?>
</body>
</html>
