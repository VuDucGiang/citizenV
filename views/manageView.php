<?php
    require_once('../public/html/manage.html');
    require_once('../controllers/manageController.php');

    $ctl = new ManageController();
    $ret = $ctl -> proc();
    $bytes = file_put_contents("../public/manage.json", $ret);

    if(isset($_POST['submitAddManager']))  {
        try {   
            $ctl -> addManager();
        }
        
        catch(Exception $e) {
            $error_msg = $e->getMessage();
        }
    
    }

    if(isset($_POST['deleteManager']))  {
        try {   
            $ctl -> deleteManager();
        }
        
        catch(Exception $e) {
            $error_msg = $e->getMessage();
        }
    
    }
?>
