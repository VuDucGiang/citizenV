<?php
    
    class InfoModel {
        private $pdo;

        public function __construct() {
            require('connect.php');
        }

        public function getInfo() {
            $maDiaChi = (string)$_SESSION["login"]; //Lấy mã địa chỉ là tên đăng nhập của user
            
            if($maDiaChi === "1") { //kiểm tra có phải A1,  đưa ra thông tin cả nước
                $stmt = $this-> pdo ->prepare('select *, 2021-year(ngaySinh) AS tuoi from info');          
            } else {
                $stmt = $this-> pdo ->prepare('select * from info where maDiaChi like ?');
                $stmt -> bindValue(1, "$maDiaChi%"); 
            }
            $stmt -> execute();           
			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
           
        }

        public function getThanhPho($username) {
            $maThanhPho = (string)$username;
            //Lấy mã thành phố/ tỉnh = 2 chữ số đầu của username
            $maThanhPho = substr($maThanhPho, 0, 2);
            if($maThanhPho === "1") {
                $stmt = $this-> pdo ->prepare('SELECT ten FROM thanhpho'); 
            } else {
                $stmt = $this-> pdo ->prepare('SELECT ten FROM thanhpho WHERE ma LIKE ?');
                $stmt -> bindValue(1, $maThanhPho);
            }
            
            $stmt -> execute();           
			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function getQuan() {
            $stmt = $this-> pdo ->prepare('SELECT ten FROM quan'); 
            $stmt -> execute();           
			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function getPhuong() {
            $stmt = $this-> pdo ->prepare('SELECT ten FROM phuong'); 
            $stmt -> execute();           
			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }

        
    }
?>
