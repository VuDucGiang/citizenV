<?php
    require_once('./public/login.php');
    require_once('./controllers/loginController.php');
    $ctl = new loginController();
    $ctl -> proc();

?>

