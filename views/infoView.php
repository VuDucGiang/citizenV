<?php
    require_once('../public/html/info.html');
    require_once('../controllers/infoController.php');
    $ctl = new InfoController();
    $ret = $ctl -> proc();

    $bytes = file_put_contents("../public/info.json", $ret); //generate json file

?>