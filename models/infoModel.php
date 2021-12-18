<?php
    
    class InfoModel {
        private $pdo;

        public function __construct() {
            require_once('connect.php');
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
    }
?>
