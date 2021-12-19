<?php
    
    class DeleteModel {
        
        public function __construct() {
            require_once('connect.php');
        }

        public function delete() {

            
            $f_cccd_old = "";
            $error_msg="";
           

            if(isset($_POST['del_but'])) 
            {
                
            try {   
                $f_cccd_old = $_POST['f_cccd_old'];
               
                include('connect.php');
                
                $stmt = $this -> pdo ->prepare("DELETE FROM `info` WHERE cccd = ?;");
                $stmt -> bindValue(1, $f_cccd_old);
                $stmt -> execute();
                
                $message = "New records deleted successfully";
                echo "<script type='text/javascript'>alert('$message');</script>";
                
 
            }
            
            catch(Exception $e) {
                $error_msg = $e->getMessage();
            }
            
            }
           
        }
    }
?>
