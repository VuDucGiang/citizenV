<?php
    require_once('./public/html/login.html');
    require_once('./controllers/loginController.php');
    $ctl = new loginController();
    $ctl -> proc();

?>

