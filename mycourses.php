


<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="utf-8" />

  <link rel="icon" type="image/png" href="./assets/img/zero.png">
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


    <div class="mt-5">
        <h2 class="h5">
          Productos
          <button class="btn border border-dark">
              <i class="fa fa-plus"></i>
              NEW
          </button>
        </h2>
      </div>
      <div class="content bg-red border border-primary mt-5">
        <div class="row">

        <div class="bg-dark mt-3 mr-3" >

            <div class="imagen">
              <img src="./img/signin-image.jpg" width="200px" height="250px">
            </div>
            <div class="" >
              <h3><a href="">Categoria</a></h3>
              <h4><a href="">nombre</a></h4>
              <p class="text-warning">Descripcion</p>
              <div class="text-right">
                <div class="text-warning">$10.00</div>
                <div class="">
                <a href="" class="basura"><i class="fa fa-trash"></i></a>
                    <a href="" class="btnEdit"><i class="fa fa-edit"></i></a>
                </div>
              </div>
            </div>
            </div>



            <div class="bg-dark mt-3 mr-3" >

            <div class="imagen">
              <img src="./img/signin-image.jpg" width="200px" height="250px">
            </div>
            <div class="" >
              <h3><a href="">Categoria</a></h3>
              <h4><a href="">nombre</a></h4>
              <p class="text-warning">Descripcion</p>
              <div class="text-right">
                <div class="text-warning">$10.00</div>
                <div class="">
                <a href="" class="basura"><i class="fa fa-trash"></i></a>
                    <a href="" class="btnEdit"><i class="fa fa-edit"></i></a>
                </div>
              </div>
            </div>
            </div>


         <!-- <?php
          include './inc/functions/conection.php';
          $resultado = $conn->query("select * from usercourses where idusert=")or die($conn ->error);
          while($fila=mysqli_fetch_array($resultado)){
          ?>
              <?php

            $resultado2 = $conn->query("select * from courses where id=".$fila['idcourse'])or die($conn->error);
            while($fila2=mysqli_fetch_array($resultado2)){
            ?>
                <div class="product-card">

                <div class="product-tumb">
                  <img src="./img/productos/<?php echo $fila2['img'];?>" alt="">
                </div>
                <div class="product-details">
                  <span class="product-catagory">Categoria</span>
                  <h4><a href=""><?php echo $fila2['name'];?></a></h4>
                  <p><?php echo $fila['descript'];?></p>
                  <div class="product-bottom-details">
                    <div class="product-price"><?php echo $fila2['cost'];?></div>
                    <div class="product-links">

                    </div>
                  </div>
                </div>
                </div>
              <?php } ?>
          <?php } ?>-->


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
