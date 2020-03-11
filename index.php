<?php

session_start();
if(isset($_SESSION['name'])||isset($_SESSION['status'])){
  $user=$_SESSION['name'];
  $status=$_SESSION['status'];
  $numerito=1;
  $imagen=$_SESSION['img'];
}else{
  $status='';
  $numerito=0;
  $user='';
  $imagen='';
}

?>
<!--

=========================================================
* Now UI Dashboard - v1.5.0
=========================================================

* Product Page: https://www.creative-tim.com/product/now-ui-dashboard
* Copyright 2019 Creative Tim (http://www.creative-tim.com)

* Designed by www.invisionapp.com Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

-->
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8" />
  <?php if($numerito==1){?>
  <link rel="icon" type="image/png" href="./img/usersP/<?php echo($imagen);?>">
  <?php }else{?>
    <link rel="icon" type="image/png" href="./assets/img/zero.png">
  <?php }?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    CurseTopia
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="./assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link rel="stylesheet" href="./css/custom.css">
</head>

<body >
  <div class="wrapper ">
    <?php include'./inc/views/sideBar.php' ?>
    <div class="main-panel" id="main-panel">
    <?php include'./inc/views/nav.php'?>
      <div class="card bg-dark text-white mw-100">
        <img class="card-img mh-100 img-fluid" src="./img/Banner-1-1151x270.jpg" alt="Card image" style="filter: brightness(60%);">
        <div class="card-img-overlay mh-50 mt-5">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text">Last updated 3 mins ago</p>
        </div>
      </div>


      <div class="content bg-red border border-primary">
        <a href=""><?php echo($user);?></a>
        <h1><?php echo($imagen);?></h1>
      </div>

      <?php include'./inc/views/footer.php'?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="./assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="./assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="./assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
</body>

</html>
