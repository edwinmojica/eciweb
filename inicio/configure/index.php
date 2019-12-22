<?php 
include '../../conexion/conexion.php';
if ($_SESSION['nivel'] != 'ADMINISTRADOR') {
  session_destroy();
   echo '<script language="javascript">alert("No tiene acceso a esta fucion, Su sesion sera finalizada por seguridad");window.location.href="../"</script>';
    //header('location:../extend/alerta.php?msj=No tiene acceso a esta funcion&c=admin&p=salir&t=error');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="Emojica" content="">

  <title>Configuracion | DB_Tech | ECI</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/styleadmin.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php 
  $id_ton = $_SESSION['id'];
  $selectioner = $con->query("SELECT * FROM usuario WHERE id = '$id_ton'");
?>
<?php while ($vaaa = $selectioner->fetch_assoc()) { 
  $tono = $vaaa['tono'];
}
?>

    <!-- Sidebar -->
    <?php include '../data_interno/barralateral.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include '../data_interno/nav.php';?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Configuracion menu administrable</h1>

          <div class="row">

            <!-- Content Column -->
            <div class="col-xl-6 mb-4 ">

              <!-- Project Card Example -->
              <div class="card  border-left-primary shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Informacion | Ver </h6>
                </div>
                <div class="card-body">
                  <div id="rechargue">
                  <?php 
                    $selectioner = $con->query("SELECT * FROM usuario WHERE id = '$id_ton'");
                  ?>
                  <?php while ($vaaa = $selectioner->fetch_assoc()) { 
                    $tono = $vaaa['tono'];
                  }
                  ?>
                  Color actual:
                  <button type="button" class="btn btn-<?php echo $tono ?>">Actual</button><br><br>
                  Posibles colores:
                  <button type="button" class="btn btn-primary">Primary</button>
                  <button type="button" class="btn btn-secondary">Secondary</button>
                  <button type="button" class="btn btn-success">Success</button>
                  <button type="button" class="btn btn-info">Info</button>
                  <button type="button" class="btn btn-warning">Warning</button>
                  <button type="button" class="btn btn-danger">Danger</button>
                  <button type="button" class="btn btn-dark">Dark</button>
                  <button type="button" class="btn btn-light">Light</button>
                  </div>
                   
                </div>
              </div>
            </div>
            
            <div class="col-xl-6 mb-4 ">

              <!-- Project Card Example -->
              <div class="card  border-left-danger shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-danger">Informacion | Editar</h6>
                </div>
                <div class="card-body">
                  <form id="frmajax" name="new" method="POST" autocomplete="off">
                  <!--form action="insertar.php" method="POST" autocomplete="off"--> 
                  <div class="form-group">
                    <label for="sel1" name=sel1>Seleccione el color:</label>
                    <select class="form-control" id="sel1" name="sel1">
                      <option><?php echo $tono?></option>
                      <option>primary</option>
                      <option>secondary</option>
                      <option>success</option>
                      <option>info</option>
                      <option>warning</option>
                      <option>danger</option>
                      <option>dark</option>
                      <option>light</option>
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <!--input type="submit" value="Ingresar" class="btn float-right login_btn"-->
                    <button type="button" id="btnguardar" class="btn btn-<?php echo $tono ?> float-right login_btn">Ingresar</button>
                  </div>
                </form>
                                    
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span> &copy; DB_Tech ECI</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

<script type="text/javascript">
  $(document).ready(function(){
    $('#btnguardar').click(function(){
      var datos=$('#frmajax').serialize();
      $.ajax({
        type:"POST",
        url:"insertar.php",
        data:datos,
        success:function(r){
          //if(r==1){
          //  alert("agregado con exito");
          //}else{
            //alert("Fallo el server");
          //}
        }
      });
      document.new.sendmensaje.value="";
      return false;
    });
  });
</script>
<script src="http://code.jquery.com/jquery-1.9.1.js" type="text/javascript"></script>
  <script>
      $(window).ready(function(){
           $("div").animate({ scrollTop: $(document).height()}, 1000);    
      });
      /*$("#rechargue").reload(" #rechargue");*/
      setInterval(function() {
        $('#rechargue').load(' #rechargue'); // Selector de la div y el fichero a refrescar
      }, 500);
  </script>


  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/jsadmin.min.js"></script>

</body>

</html>
