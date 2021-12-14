<?php
    class InfoModel {
        private $pdo;

        public function __construct() {
            require_once('connect.php');
        }

        public function getInfo() {
            $result = $this -> pdo ->query("select * from info;");
			return $result -> fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
