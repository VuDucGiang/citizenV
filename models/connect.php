<?php
    try {
        $host = "localhost";   
        $dbname = "citizenv"; 
        $username = "root";    
        $password = "123";        
        //$password = "hiep";
        $this->pdo = new PDO("mysql:host=$host; dbname=$dbname;", $username, $password);
    } catch (PDOException $e) {
        die("Lỗi : " . $e->getMessage() ) ;  
    } 
                 
        $submit_pdo = new PDO("mysql:host=$host; dbname=$dbname;", $username, $password);
   
        