<?php

    class ManageModel {
        //private $pdo;

        public function __construct() {
            require_once('connect.php');
        }

        public function getManager() {
            //lấy thông tin của người dưới cấp, ví dụ A1 sẽ xem A2, A2 xem A3, ...
            $username = (string)$_SESSION["login"]; 
            
            if(strlen($username) == 1) { 
                $stmt = $this-> pdo ->prepare('SELECT * FROM quyensd WHERE LENGTH(username) = 2');          
            } else {
                $lenUname = strlen($username) + 2;
                $stmt = $this-> pdo ->prepare('SELECT * FROM quyensd WHERE LENGTH(username) = ? AND username LIKE ?');
                $stmt -> bindValue(1, $lenUname); 
                $stmt -> bindValue(2, "$username%"); 
            }
            $stmt -> execute();           
			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
           
        }
    }
?>
