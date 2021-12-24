<?php

    class ManageModel {

        public function __construct() {
            require('connect.php');
            $this->pdo = new PDO("mysql:host=$host; dbname=$dbname;", $username, $password);
        }
        
        public function getQuyen($uname) {
            echo $uname;
                
            $stmt = $this -> pdo ->query("SELECT quyen FROM user WHERE username LIKE '$uname'");
            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
                
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

            $uname = (string)$_SESSION["login"]; 
            //insert vào table thanhpho nếu là A1
            if(strlen($uname) == 1) { 
                $stmt = $this-> pdo ->prepare('INSERT INTO thanhpho (ma, ten) VALUE (?,?)'); 
                $stmt -> bindValue(1, $username);
                $stmt -> bindValue(2, $don_vi);  
                $stmt -> execute();        
            } else if(strlen($uname) == 2) {//insert vào table quan nếu là A2
                $stmt = $this-> pdo ->prepare('INSERT INTO quan (ma, ten, maThanhPho) VALUE (?,?,?)'); 
                $stmt -> bindValue(1, $username);
                $stmt -> bindValue(2, $don_vi); 
                $stmt -> bindValue(3, $uname);
                $stmt -> execute(); 
                } else if(strlen($uname) == 4) {//insert vào table phuong nếu là A3
                    $stmt = $this-> pdo ->prepare('INSERT INTO phuong (ma, ten, maQuan) VALUE (?,?,?)'); 
                    $stmt -> bindValue(1, $username);
                    $stmt -> bindValue(2, $don_vi); 
                    $stmt -> bindValue(3, $uname);
                    $stmt -> execute(); 
                    } else if(strlen($uname) == 6) {//insert vào table thon nếu là B1
                        $stmt = $this-> pdo ->prepare('INSERT INTO thon (ma, ten, maQuan) VALUE (?,?,?)'); 
                        $stmt -> bindValue(1, $username);
                        $stmt -> bindValue(2, $don_vi); 
                        $stmt -> bindValue(3, $uname);
                        }
            

            //thêm tài khoản vào user
            $stmt2 = $this -> pdo ->prepare("INSERT INTO user (donVi, username, password, tienDo) 
                                            VALUES (?, ?, ?, ?);");

            $stmt2 -> bindValue(1, $don_vi);
            $stmt2 -> bindValue(2, $username);
            $stmt2 -> bindValue(3, $password);
            $stmt2 -> bindValue(4, $tien_do);
                    
            $stmt2 -> execute();
                    
            $message = "Cấp tài khoản thành công!";
            echo "<script type='text/javascript'>alert('$message');</script>";

        }
        
        public function editManager() {
            $don_vi=$username=$username_old=$password=$tien_do="";
            
            $don_vi=$_POST['don_vi'];
            $username = $_POST['username'];
            $username_old = $_POST['username_old'];
            $password = $_POST['password'];
            

            $stmt = $this -> pdo ->prepare("UPDATE user SET donVi = ?,
             username = ?, password = ? WHERE username = ? ;");

            $stmt -> bindValue(1, $don_vi);
            $stmt -> bindValue(2, $username);
            $stmt -> bindValue(3, $password);
            $stmt -> bindValue(4, $username_old);
                    
            $stmt -> execute();

            
            //echo "<script type='text/javascript'>alert('dmm');</script>";
        }

        public function deleteManager() {
            $username_old = "";
            $username_old = $_POST['username_old'];
            $stmt = $this -> pdo ->prepare("DELETE FROM user WHERE username = ? ;");
            $stmt -> bindValue(1, $username_old);
            $stmt -> execute();
            
        }
        
        public function openManager() {
            $username_old =$open_date=$close_date= "";
            $username_old = $_POST['username_old'];
            $open_date = $_POST['open_date'];
            $close_date = $_POST['close_date'];
            $stmt = $this -> pdo ->prepare("UPDATE user SET quyen = 1,ngayMo = ?,ngayDong = ? WHERE username = ? ;");
            $stmt -> bindValue(1, $open_date);
            $stmt -> bindValue(2, $close_date);
            $stmt -> bindValue(3, $username_old);
            $stmt -> execute();

            
        }
        
        public function lockManager() {   
            $username_old = "";
            $username_old = $_POST['username_old'];
            $stmt = $this -> pdo ->prepare("UPDATE user SET quyen = 0,ngayMo = NULL,ngayDong = NULL WHERE username lIKE ? ;");
            $stmt -> bindValue(1, "$username_old%");
            $stmt -> execute();
            
            
        }

        }

    
?>
