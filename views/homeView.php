<?php
  $user=0;
  $login=0;
  session_start();
  if (isset($_SESSION['newSession'])) {
    $login=1;
    $user=1;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CitizenV</title>

  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
  <!-- <link href="./assets/dist/css/jquery-ui.css" rel="stylesheet">
  <link href="./assets/dist/css/jquery.dataTables.min.css" rel="stylesheet"> -->


  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <!-- <script src="./assets/dist/js/jquery.dataTables.min.js"></script> -->


  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/responsive.css">


  <!-- Custom styles for this template -->
  <link href="../public/css/style.css" rel="stylesheet">
</head>

<body class="text-center">

  <header>
    <nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CitizenV</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">

            <li <?php 
              if (isset($_GET['page']) && $_GET['page']=='1' ) echo 'class="active"' 
              ?>
            >
              <a href="?page=1">Nhập liệu</a>
            </li>

            <li <?php 
              if (!isset($_GET['page']) || (isset($_GET['page']) && $_GET['page']=='2' )) echo 'class="active"' 
              ?>
            >
            <a href="?page=2">Thông tin dân số</a>
            </li>

            <li>
            <a href="#">Hỗ trợ</a>
            </li>

            <!-- <li <?php if (isset($_GET['page']) && $_GET['page']=='3' ) echo 'class="active"' ?>><a
                href="?page=3">Result</a></li>
                        
            <?php if ($user==1) {?>
            <li
              class="dropdown <?php if (isset($_GET['page']) && ($_GET['page'] == '30' || $_GET['page'] == '31') ) echo 'active'?>">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Marks
                <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li <?php if (isset($_GET['page']) && $_GET['page']=='30' ) echo 'class="active"' ?>><a
                    href="?page=30">Marks Entry</a></li>
                <li <?php if (isset($_GET['page']) && $_GET['page']=='31' ) echo 'class="active"' ?>><a
                    href="?page=31">View Marks</a></li>
              </ul>
            </li>
            
            <li <?php if (isset($_GET['page']) && $_GET['page']=='5' ) echo 'class="active"' ?>><a
                href="?page=5">Insert</a></li>
            <?php } if ($login==1) { ?>
            <li><a href="?page=6">Logout</a></li>
            <?php }else{?>
            <li <?php if (isset($_GET['page']) && $_GET['page']=='4' ) echo 'class="active"' ?>><a
                href="?page=4">Login</a></li>
            <?php } ?> -->
           

          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </header>

<?php require "../controllers/navigation.php"; ?>
