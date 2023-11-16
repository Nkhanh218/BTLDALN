<?php
ob_start();
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Globalnews - GenZ</title>
  <link rel="shortcut icon" href="./assets/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="./assets/images/favicon.ico" type="image/x-icon">
  <!-- bootstrap styles-->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- google font -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>
  <!-- ionicons font -->
  <link href="./assets/css/ionicons.min.css" rel="stylesheet">
  <!-- animation styles -->
  <link rel="stylesheet" href="./assets/css/animate.css" />
  <!-- custom styles -->
  <link href="./assets/css/custom-red.css" rel="stylesheet" id="style">
  <!-- owl carousel styles-->
  <link rel="stylesheet" href="./assets/css/owl.carousel.css">
  <link rel="stylesheet" href="./assets/css/owl.transitions.css">
  <!-- magnific popup styles -->
  <link rel="stylesheet" href="./assets/css/magnific-popup.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
  <style>
   .header-toolbar,.sticky-header,.btm-sec{
    background-color: #8BC6EC;
    background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
    

}
</style>
</head>

<body>
  <!-- preloader start -->
  <div id="preloader">
    <div id="status"></div>
  </div>
  <div class="wrapper">
    <!-- header toolbar start -->
    <div class="header-toolbar">
      <div class="container">
        <div class="row">
          <div class="col-md-16 text-uppercase">
            <div class="row">
              <div class="col-sm-8 col-xs-16">
                <ul id="inline-popups" class="list-inline">
                  <!-- <li class="hidden-xs"><a href="#">Quảng cáo</a></li> -->
                  <?php if (!isset($_SESSION['account'])) : ?>
                    <li><a class="" href="login.php" data-effect="mfp-zoom-in">Đăng nhập</a></li>
                    <li><a class="" href="regisin.php" data-effect="mfp-zoom-in">Tạo tài khoản</a></li>
                  <?php endif; ?>

                  
                  <?php if (isset($_SESSION['account'])) : ?>
                    <li><a class="" href="edit-account.php" data-effect="mfp-zoom-in">Đổi thông tin các nhân</a></li>
                    <li><a class="" href="change-password.php" data-effect="mfp-zoom-in">Đổi mật khẩu</a></li>
                    <li><a class="" href="logout.php" data-effect="mfp-zoom-in">Đăng xuất</a></li>
                  <?php endif; ?>
                </ul>
              </div>
     

              <div class="col-xs-16 col-sm-8">
                <div class="row">
                  <?php if (isset($_SESSION['account'])) : ?>
                    <div id="weather" class="col-xs-16 col-sm-8 col-lg-9">
                      <?php echo $_SESSION['account']['fullname']; ?>
                    </div>
                  <?php else : ?>
                    <div id="weather" class="col-xs-16 col-sm-8 col-lg-9"></div>
                  <?php endif; ?>
                  <div id="time-date" class="col-xs-16 col-sm-8 col-lg-7"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php require_once(realpath(dirname(__FILE__) . "./menu.php")); ?>
    <!-- preloader end -->