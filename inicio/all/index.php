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

  <title>Profesores | DB_Tech | ECI</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/styleadmin.min.css" rel="stylesheet">
  <script src="../js/plotly-latest.min.js"></script>

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

          <!-- Page Heading >
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-4 text-gray-800"><?php echo $materia?></h1>
          <a href="add.php?id=<?php echo $id_materia?>&name=<?php echo $material ?>" class="d-none d-sm-inline-block btn btn-sm btn-<?php echo $tono ?> shadow-sm"><i class="fas fa-glasses fa-sm text-white-50"></i> Agregar Profesor</a>
          <a href="../materia/" class="d-none d-sm-inline-block btn btn-sm btn-<?php echo $tono ?> shadow-sm"><i class="far fa-clipboard fa-sm text-white-50"></i> Ver las materias</a>
        </div-->

          <div class="row">

             <div class="col mb-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Grafica escalafon de profesores</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div id="cargalineal"></div>
                </div>
              </div>
            </div>


          </div>
          <div class="row">

            <!-- Content Column -->
            <div class="col mb-4">

              <!-- Project Card Example -->
              <!--div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Informacion</h6>
                </div>
                <div class="card-body">
                  <span>Encontraras a continuacion unas tarjetas con las materias que se encuentran registradas en el sistema, si no esta aca la materia que estas buscando dale en el boton "Agregar Materia" en la parte superior de esta informacion y completas el formulario.</span>
                </div>
              </div-->
               <?php 
                  $select = $con->query("SELECT * FROM profesor order by nombre ");
                ?>
                <div class="row"><?php while ($f = $select->fetch_assoc()) { 
                  $valornew= $f['puntaje'];
                  $valorinsert= $valornew + 1 ;
                  $dislikeval = $f['referencias'];
                  $dislikeinsert = $dislikeval + 1 ;
                  ?>

              <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-<?php echo $tono ?> shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?php echo $f['nombre']?></div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $f['puntaje']?> 
                          <a href="#"> <i class="far fa-thumbs-up text-success"></i></a> 
                        |  <?php echo $f['referencias']?> <a href="#"><i class="far fa-thumbs-down text-danger"></i></a> </div>
                        

                        <!--div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Calidad referencias</div-->
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-feather-alt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div><?php } ?>
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
      $('#cargalineal').load('lineal.php');
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#btnguardar').click(function(){
      var datos=$('#frmajax').serialize();
      $.ajax({
        type:"POST",
        url:"like.php",
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



  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Bootstrap core JavaScript--> 
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/jsadmin.min.js"></script>
    <script src="../js/graficas/circular.js"></script>

</body>

</html>
