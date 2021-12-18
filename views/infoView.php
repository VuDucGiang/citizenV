<?php
    
    require_once('../public/html/info.html');
    require_once('../controllers/infoController.php');
    require_once('../controllers/updateController.php');
    
    $ctl = new InfoController();
    $ret = $ctl -> proc();

    $bytes = file_put_contents("../public/info.json", $ret); //generate json file
    $ctl2 = new UpdateController();
    $ctl2 -> proc();
?>