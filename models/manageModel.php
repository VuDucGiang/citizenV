<?php

    class ManageModel {

        public function __construct() {
            require('connect.php');
        }

        public function getManager() {
            //lấy thông tin của người dưới cấp, ví dụ A1 sẽ xem A2, A2 xem A3, ...
            $username = (string)$_SESSION["login"]; 
            
            if(strlen($username) == 1) { 
                $stmt = $this-> pdo ->prepare('SELECT * FROM user WHERE LENGTH(username) = 2');          
            } else {
                $lenUname = strlen($username) + 2;
                $stmt = $this-> pdo ->prepare('SELECT * FROM user WHERE LENGTH(username) = ? AND username LIKE ?');
                $stmt -> bindValue(1, $lenUname); 
                $stmt -> bindValue(2, "$username%"); 
            }
            $stmt -> execute();  
                    
			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
           
        }

        public function submitAddManager() {

            $don_vi=$_POST['don_vi'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $tien_do = "Chưa hoàn thành";
            
            
            $stmt = $this -> pdo ->prepare("INSERT INTO user (donVi, username, password, tienDo) 
                                            VALUES (?, ?, ?, ?);");

            $stmt -> bindValue(1, $don_vi);
            $stmt -> bindValue(2, $username);
            $stmt -> bindValue(3, $password);
            $stmt -> bindValue(4, $tien_do);
                    
            $stmt -> execute();
                    
            $message = "New records created successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";

        }

        public function deleteManager() {
            echo "anh m đây";

            /*$don_vi=$_POST['don_vi'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $tien_do = "Chưa hoàn thành";
            
            
            $stmt = $this -> pdo ->prepare("INSERT INTO user (donVi, username, password, tienDo) 
                                            VALUES (?, ?, ?, ?);");

            $stmt -> bindValue(1, $don_vi);
            $stmt -> bindValue(2, $username);
            $stmt -> bindValue(3, $password);
            $stmt -> bindValue(4, $tien_do);
                    
            $stmt -> execute();
                    
            $message = "New records delete successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";*/

        }

    }
?>
