<?php
    require_once('../models/infoModel.php');
    require_once('../views/infoView.php');
        
        class InfoController {
        
            public function __construct() {

            }

            public function proc() { 

                $model = new InfoModel();
                $result = $model -> getInfo();
                $arr = array("status"=>"OK", "data" => $result);
                //echo json_encode($arr, JSON_UNESCAPED_UNICODE);
                return json_encode($arr, JSON_UNESCAPED_UNICODE);    
                
            }
        
            public function getThanhpho($username) { 

                $model = new InfoModel();
                $result = $model -> getThanhPho($username);
                
                return $result;   
                
            }

            public function getQuan() { 

                $model = new InfoModel();
                $result = $model -> getQuan();
                
                return $result;   
                
            }

            public function getPhuong() { 

                $model = new InfoModel();
                $result = $model -> getPhuong();
                
                return $result;   
                
            }
        }