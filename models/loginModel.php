<?php
    class UserModel {

        public function __construct() {
            require_once('connect.php');
        }

        public function checkAuth($uname, $passwd) {
            $stmt = $this-> pdo ->prepare('SELECT username, password FROM user WHERE username = ? AND password = ?;');
            
            $stmt -> bindValue(1, $uname);
            $stmt -> bindValue(2, $passwd);
            $stmt -> execute();

            if ($stmt -> rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
?>
