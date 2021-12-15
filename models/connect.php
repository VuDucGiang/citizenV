<?php
    try {
        $host = "localhost";   
        $dbname = "citizenv"; 
        $username = "root";    
        // $password = "";        
        $password = "hiep";
        $this->pdo = new PDO("mysql:host=$host; dbname=$dbname;", $username, $password);
    } catch (PDOException $e) {
        die("Lỗi : " . $e->getMessage() ) ;  
    } 
        