<?php
    require_once('../public/html/manage.html');
    require_once('../controllers/manageController.php');

    $ctl = new ManageController();
    $ret = $ctl -> proc();

    $bytes = file_put_contents("../public/manage.json", $ret);
?>
