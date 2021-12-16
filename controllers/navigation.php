<?php
  if ((!isset($_GET['page']))) include 'infoController.php';

  if(isset($_GET['page'])) {
    $page=$_GET['page'];

    if ($page == '1'){
      include 'registrationController.php';
    }
    if ($page == '2'){
      include 'infoController.php';
    }
    if ($page == '3'){
      session_unset(); 
      session_destroy();
      header('Location: ../index.php');
    }
    if ($page == '4'){
      include 'changePassController.php';
    }
    if ($page == '5'){
      include 'manageController.php';
    }
    if ($page == '6'){
      include 'statisticsController.php';
    }
    // if ($page == '31'){
    //   include 'admin/marks_view.php';
    // }
    // if ($page == '4'){
    //   include 'pages/login.php';
    // }

    // if ($page == '6'){
    //   session_unset(); 
    //   session_destroy();
    //   header('Location: index.php');
    // }
  }
?>