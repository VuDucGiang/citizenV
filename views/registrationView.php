<?php
    require_once('../public/html/registration.html');
    require_once('../controllers/registrationController.php');

    $ctl = new RegistrationController();
    $ctl -> proc();
?>

