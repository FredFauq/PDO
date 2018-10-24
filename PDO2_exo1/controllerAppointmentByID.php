<?php
//on instancie la classe appointments
$appointmentFound = NEW appointments();
$appointmentFound->id = $_GET['id'];
$getAppointmentById = $appointmentFound->getAppointmentById();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

