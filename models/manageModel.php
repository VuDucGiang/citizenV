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
            $c_date = $_POST['c_date'];
            $tien_do = "Chưa hoàn thành";
            //echo $don_vi, $username, $password, $c_date, $tien_do;
            //Đoạn dưới bị lỗi

            include('connect.php');
            
            $stmt = $this -> pdo ->prepare("INSERT INTO quyensd (donVi, username, password, ngayDong, tienDo) 
                                            VALUES (?, ?, ?, ?, ?);");

            $stmt -> bindValue(1, $don_vi);
            $stmt -> bindValue(2, $username);
            $stmt -> bindValue(3, $password);
            $stmt -> bindValue(4, $c_date);
            $stmt -> bindValue(5, $tien_do);
                    
            $stmt -> execute();
                    
            $message = "New records created successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";

            //$stmt->close();
            //$submit_pdo->close();
            

        }
    }
?>
