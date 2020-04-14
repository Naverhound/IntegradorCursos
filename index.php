<?php
require './inc/functions/session.php';
require './inc/functions/initComps.php';
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

       <!--Modals-->
            <!--Modal for pruduct D (delete)-->
              <div class="modal" id="shopCart" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">¿ Añadir a Carrito o Comprar?</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="./models/PPpayments.php" method="POST" >
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="name">
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="cost" id="cost" aria-describedby="helpId" placeholder="cost">
                        </div>
                        <div class="form-group">
                          <input type="hidden" class="form-control" name="descript" id="descript" aria-describedby="helpId" placeholder="descript">
                        </div>
                      </form>
                      <a href="#" class="h1 ppp"><i class="fab fa-cc-paypal" aria-hidden="true"></i></a>
                    </div>
                    <div class="modal-footer">

                    </div>
                  </div>
                </div>
              </div>
            <!--END OF Modal for pruduct D (delete)-->
      <!--END OF Modals-->

      <div class="content bg-red border border-primary">
        <a href=""><?php echo($user);?></a>
        <h1><?php echo($imagen);?></h1>
        <div class="row">
          <?php
              include './inc/functions/conection.php';
               $result = $conn->query("SELECT * FROM courses") or die($conection->error);
              while ($row = mysqli_fetch_array($result)) {
              ?>

          <div class="bg-dark mt-3 mr-3 Course" data-id="<?php echo $row['id']?>">

              <div class="imagen">
                <img src="./img/coursesP/<?php echo $row['img']?>" width="200px" height="250px">
              </div>
              <div class="" >
                <h3><a href="#">Categoria: <?php echo $row['cat']?></a></h3>
                <h4><a href="#"><?php echo $row['name']?></a></h4>
                <p class="text-warning text-truncate" >Descripcion: <?php echo $row['descript']?></p>
                <div class="text-right">
                  <div class="text-warning">$<?php echo $row['cost']?></div>
                </div>
                <div class="text-right">
                  <a href="#" class="cart" ><i class="fa fa-shopping-basket" aria-hidden="true" style="color: white" 
                  data-toggle="modal" data-target="#shopCart">Añadir</i></a>
                </div>
              </div>
            </div>

            <?php } ?>
        </div>
      </div>

      <?php include'./inc/views/footer.php'?>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./assets/js/core/bootstrap.min.js"></script>
  <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="./js/main.js"></script>
  <script src="./js/ppp.js"></script>
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
