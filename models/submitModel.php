<?php


$f_cccd=$f_name=$b_date=$gender=$que_tinh=$que_huyen=$que_xa=$que_duong=$thuong_tinh=$thuong_huyen=$thuong_xa=$thuong_duong
=$tam_tinh=$tam_huyen=$tam_xa=$tam_duong=$van_hoa=$ton_giao=$job=$ma_vung="";
$error_msg="";

if(isset($_POST['submit_but'])) 
{
  try {   
    $f_cccd=$_POST['f_cccd'];
    $f_name = $_POST['f_name'];
    $b_date = $_POST['b_date'];
    $gender = $_POST['gender'];

    $que_tinh = $_POST['que_tinh'];
    $que_huyen = $_POST['que_huyen'];
    $que_xa = $_POST['que_xa'];
    $que_duong = $_POST['que_duong'];
    $que_quan = $que_xa . ", " . $que_huyen . ", " . $que_tinh;
    
    $thuong_tinh = $_POST['thuong_tinh'];
    $thuong_huyen = $_POST['thuong_huyen'];
    $thuong_xa = $_POST['thuong_xa'];   
    $thuong_duong = $_POST['thuong_duong'];
    $thuong_tru = $thuong_duong . ", " . $thuong_xa . ", " . $thuong_huyen . ", " . $thuong_tinh;

    $tam_tinh = $_POST['tam_tinh'];
    $tam_huyen = $_POST['tam_huyen'];
    $tam_xa = $_POST['tam_xa'];   
    $tam_duong = $_POST['tam_duong'];
    $tam_tru = $tam_duong . ", " . $tam_xa . ", " . $tam_huyen . ", " . $tam_tinh;

    $van_hoa = $_POST['van_hoa'];   
    $ton_giao = $_POST['ton_giao'];
    $job = $_POST['job'];
    $ma_vung = $_POST['ma_vung'];
    
    

    
    include "../models/connect_for_submit.php";

    $stmt = $submit_pdo->prepare("INSERT INTO `info` (`cccd`, `ten`, `ngaySinh`, `gioiTinh`, `queQuan`, `diaChiThuongTru`, `diaChiTamTru`, `tonGiao`, `trinhDoVanHoa`, `ngheNghiep`, `maDiaChi`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

    //$stmt->bindParam("isssssssss", $f_cccd, $f_name,$b_date,$gender,$que_quan,$thuong_tru,$tam_tru,$ton_giao,$van_hoa,$ma_vung);
    $stmt -> bindValue(1, $f_cccd);
    $stmt -> bindValue(2, $f_name);
    $stmt -> bindValue(3, $b_date);
    $stmt -> bindValue(4, $gender);
    $stmt -> bindValue(5, $que_quan);
    $stmt -> bindValue(6, $thuong_tru);
    $stmt -> bindValue(7, $tam_tru);
    $stmt -> bindValue(8, $ton_giao);
    $stmt -> bindValue(9, $van_hoa);
    $stmt -> bindValue(10, $job);
    $stmt -> bindValue(11, $ma_vung);

    $stmt->execute();

    printf("%d Row inserted.\n", $stmt->affected_rows);

    echo "New records created successfully";

    //$stmt->close();
    //$submit_pdo->close();
  }
  
  catch(Exception $e) {
    $error_msg = $e->getMessage();
  }
  
}
?>