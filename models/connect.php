<?php
    try {
        $host = "localhost";   
        $dbname = "citizenv"; 
        $username = "root";    
<<<<<<< HEAD
        // $password = "";        
        $password = "hiep";
=======
        $password = "123";        
        //$password = "hiep";
>>>>>>> 878e8b190051cd2d442544a8baa66608fa7f8ed1
        $this->pdo = new PDO("mysql:host=$host; dbname=$dbname;", $username, $password);
    } catch (PDOException $e) {
        die("Lỗi : " . $e->getMessage() ) ;  
    } 
        