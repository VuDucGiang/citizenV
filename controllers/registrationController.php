<?php
    require_once('../models/registrationModel.php');
    require_once('../views/registrationView.php');

    class RegistrationController {
        
        public function __construct() {

        }

        public function proc() { 

            $model = new RegistrationModel();
            $model -> submit();
        }
    }
?>