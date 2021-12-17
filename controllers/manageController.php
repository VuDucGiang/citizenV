<?php
    require_once('../models/manageModel.php');
    require_once('../views/manageView.php');
        
        class ManageController {
        
            public function __construct() {

            }

            public function proc() { 

                $model = new ManageModel();
                $result = $model -> getManager();
                $arr = array("status"=>"OK", "data" => $result);
                //echo json_encode($arr, JSON_UNESCAPED_UNICODE);
                return json_encode($arr, JSON_UNESCAPED_UNICODE);    
                
            }
        }