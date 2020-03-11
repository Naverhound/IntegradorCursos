
<?php
session_start();
?>

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
          <button type="button" class="btn btnN border border-dark" data-toggle="modal" data-target="#newC">
              <i class="fa fa-plus"></i>
              NEW
          </button>
        </h2>
      </div>
      <!--Modals-->
            <div class="modal fade" id="newC" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="newC-Form" data-action=''>
                      <div class="form-group">
                        <label for="name">Nombre de curso</label>
                        <input type="text"
                          class="form-control" name="" id="name" aria-describedby="helpId" placeholder="Ej: Curso de GO en 2 Hrs">
                      </div>
                      <div class="form-group">
                        <label for="cost">Costo de curso</label>
                        <input type="number"
                          class="form-control" name="" id="cost" aria-describedby="helpId" placeholder="Ej: $150.00">
                      </div>
                      <div class="form-group">
                        <label for="img"></label>
                        <input type="file" class="form-control-file" name="" id="img" placeholder="" aria-describedby="fileHelpId">
                        <small id="fileHelpId" class="form-text text-muted">Clic para Cargar imagen</small>
                      </div>
                      <div class="form-group">
                        <label for="cat">Categoría</label>
                        <input type="text"
                          class="form-control" name="" id="cat" aria-describedby="helpId" placeholder="Ej: Tecnología">
                      </div>
                      <div class="form-group">
                        <label for="des">Descripción del curso</label>
                        <textarea class="form-control p-0" name="" id="des" rows="2"></textarea>
                      </div>
                      <div class="form-group">
                        <input type="hidden"
                          class="form-control" name="" id="idC" aria-describedby="helpId">
                      </div>
                      <div class="form-group">
                        <input type="hidden"
                          class="form-control" name="" id="imgOld" aria-describedby="helpId">
                      </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" >Confirmar Datos</button>
                  </div>
                </form>
                </div>
              </div>
            </div>
      <!--END OF Modals-->
      <div class="content bg-red border border-primary mt-5">
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
              <p class="text-warning">Descripcion: <?php echo $row['descript']?></p>
              <div class="text-right">
                <div class="text-warning">$<?php echo $row['cost']?></div>
                <div class="">
                <a href="#" class="basura"><i class="fa fa-trash"></i></a>
                    <a href="#" class="btnEdit"><i class="fa fa-edit" data-toggle="modal" data-target="#newC"></i></a>
                </div>
              </div>
            </div>
          </div>

          <?php } ?>
    </div>
  </div>
  <?php include'./inc/views/footer.php'?>
  <!--   Core JS Files   -->
  <script src="./assets/js/core/jquery.min.js"></script>
  <script src="./assets/js/core/popper.min.js"></script>
  <script src="./js/forms.js"></script>
  <script src="./js/main.js"></script>
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
