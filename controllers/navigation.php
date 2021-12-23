<?php
  
  if ((!isset($_GET['page']))) {
    if (strlen((string)$_SESSION['login']) < 6) {
      include 'infoController.php';
    } else {
      include 'registrationController.php';
    }
  }

  if(isset($_GET['page'])) {
    $page=$_GET['page'];

    if ($page == '1'){

      include 'registrationController.php';
    }
    if ($page == '2'){
      include 'infoController.php';
    }
    if ($page == '3'){
      include 'statisticsController.php';
    }
    if ($page == '4'){
      include 'manageController.php';
    }
    if ($page == '5'){
      include 'reportController.php';
    }
    if ($page == '6'){
      session_unset(); 
      session_destroy();
      header('Location: ../index.php');
    }
  }
?>