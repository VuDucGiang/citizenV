<?php
    class InfoModel {

        public function __construct() {
            require('connect.php');
            $this->pdo = new PDO("mysql:host=$host; dbname=$dbname;", $username, $password);
        }

        public function getInfo() {
            $maTinh = $_POST["chon_tinh"];
            $maHuyen = $_POST["chon_huyen"];
            $maXa = $_POST["chon_xa"];
            $maDiaChi = (string)$_SESSION["login"]; //Lấy mã địa chỉ là tên đăng nhập của user
            
            //kiểm tra nếu là A1 và không nhập tỉnh/huyện/xã sẽ đưa ra thông tin cả nước
            if($maDiaChi === "1" && !$maTinh) { 
                $stmt = $this-> pdo ->prepare('select *, 2021-year(ngaySinh) AS tuoi from info'); 
                $stmt -> execute();           
                return $stmt -> fetchAll(PDO::FETCH_ASSOC);         
            }
            //Nếu người quản lí chỉ nhập tỉnh và huyện, không nhập xã
            //sẽ đưa ra danh sách dân số thuộc tỉnh huyện đã nhập 
            if($maXa == '--Chọn xã/phường--'){
                $stmt = $this-> pdo ->prepare('select *, 2021-year(ngaySinh) AS tuoi from info where maDiaChi like ?');
                $stmt -> bindValue(1, "$maHuyen%"); 
                $stmt -> execute();           
			    return $stmt -> fetchAll(PDO::FETCH_ASSOC);
            }

            //Nếu người quản lí chỉ nhập tỉnh không nhập huyện, xã
            //sẽ đưa ra danh sách dân số thuộc tỉnh đã nhập 
            if($maHuyen == '--Chọn quận/huyện--'){
                $stmt = $this-> pdo ->prepare('select *, 2021-year(ngaySinh) AS tuoi from info where maDiaChi like ?');
                $stmt -> bindValue(1, "$maTinh%"); 
                $stmt -> execute();           
			    return $stmt -> fetchAll(PDO::FETCH_ASSOC);
            }
            //Trường hợp còn lại người quản lí nhập đầy đủ thông tin tỉnh, huyện, xã
            $stmt = $this-> pdo ->prepare('select *, 2021-year(ngaySinh) AS tuoi from info where maDiaChi like ?');
            $stmt -> bindValue(1, "$maXa%"); 
            $stmt -> execute();   
			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }

        public function getThanhPho($username) {
            //$GLOBALS['login'] = (string)$username;
            $username = (string)$username;
            //Lấy mã thành phố/ tỉnh = 2 chữ số đầu của username
            $maThanhPho = substr($username, 0, 2);
            
            //Lấy mã phường/xã = 6 chữ số đầu của username
            $maPhuong = substr($username, 0, 6);

            //Thông tin tỉnh/thành phố của A1
            if($username === "1") {
                $stmt = $this-> pdo ->prepare('SELECT ma, ten FROM thanhpho'); 
                $stmt -> execute();           
			    return $stmt -> fetchAll(PDO::FETCH_ASSOC);
            }
            //Thông tin tỉnh/thành phố của A2, A3, B1
            $stmt = $this-> pdo ->prepare('SELECT ma, ten FROM thanhpho WHERE ma LIKE ?');
            $stmt -> bindValue(1, $maThanhPho);
            $stmt -> execute();           
			return $stmt -> fetchAll(PDO::FETCH_ASSOC);
            
        }

    }
    
    include'connect.php';
    $conn = new PDO("mysql:host=$host; dbname=$dbname;", $username, $password);
    if(isset($_POST['maThanhPho'])){
       
        $maThanhPho = $_POST['maThanhPho'];
        $output = '<option>--Chọn quận/huyện--</option>';

        //$uname = (string)$_SESSION['login'];
        //echo "<script type='text/javascript'>alert('$maThanhPho';</script>";
    
        //Lấy mã quận/huyện = 4 chữ số đầu của username
        //$maQuan = substr($uname, 0, 4);
        
        //Thông tin quận/huyện của A1, A2
        /*if(strlen($uname) <= 2) {
            $stmt = $conn ->prepare('SELECT ma, ten FROM quan WHERE maThanhPho LIKE ?'); 
            $stmt -> bindValue(1, $maThanhPho);
            $stmt -> execute();  
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        } else {*/
            //Thông tin quận/huyện của A3, B1
            $stmt = $conn ->prepare('SELECT ma, ten FROM quan WHERE maThanhPho LIKE ?'); 
            $stmt -> bindValue(1, $maThanhPho);
            $stmt -> execute();  
            $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        //}
        foreach($result as $op) {
            $output.='<option value="'.$op['ma'].'">'.$op['ten'].'</option>';
        }
        echo $output;
    }

    if(isset($_POST['maQuan'])){
        //$conn = new PDO("mysql:host=$host; dbname=$dbname;", $username, $password);

        $maQuan = $_POST['maQuan'];
        $output = '<option>-Xã/Phường-</option>';
        $stmt = $conn ->prepare('SELECT ma, ten FROM phuong WHERE maQuan LIKE ?'); 
        $stmt -> bindValue(1, $maQuan);
        $stmt -> execute();  
        $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $op) {
            $output.='<option value="'.$op['ma'].'">'.$op['ten'].'</option>';
        }
        echo $output;
    }
  
    
?>
