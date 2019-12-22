<?php 
include '../conexion/conexion.php';
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

  <title>Inicio | DB_Tech | ECI</title> 

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <script src="js/plotly-latest.min.js"></script>
  <link href="css/styleadmin.min.css" rel="stylesheet">
  <style type="text/css">
  .cutte {
      width: 100px;
      white-space: nowrap;
      text-overflow: ellipsis;
      overflow: hidden;
}
</style>

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
    <?php include 'data/barralateral.php';?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include 'data/nav.php';?>
        <!-- End of Topbar -->

        <!-- Contenido Pagina -->
        <div class="container-fluid">

         

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Panel Principal</h1>
            <span><?php 
            $name = $_SESSION['nick'];
            $date = '12345';
            $dates= $name.$date;
            ?>
              <?php $es= sha1($dates);?>
            <?php 
            $ids= $_SESSION['id'];
              $selectioner = $con->query("SELECT * FROM usuario WHERE id = '$ids'");
            ?>
            <?php while ($vaaa = $selectioner->fetch_assoc()) { 
              $pass = $vaaa['pass']; 
            }
            ?>

            <?php if ($pass==$es):  ?>
              <a href="#!"><i class="fas fa-thumbtack text-danger"> Es necesario que actualice su contraseña ya que su cuenta es vulnerable.</i></a>
            <?php else: ?>
              <a href="#!" hidden><i class="fas fa-user-plus text-success"> Pass Aceptada</i></a>
            <?php endif; ?>
            </span>
            <a href="#" class="d-sm-inline-block btn btn-sm btn-<?php echo $tono ?> shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Generar Reporte</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <?php $sel = $con->query("SELECT * FROM usuario");
              $row = mysqli_num_rows($sel);
            ?>
            <?php $sel1 = $con->query("SELECT * FROM profesor ");
              $rows = mysqli_num_rows($sel1);
            ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div id="rechargue">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Profesores</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rows ?></div>
                      </div> 
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-address-card fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php $seli = $con->query("SELECT * FROM comentarios");
              $rowes = mysqli_num_rows($seli);
            ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <span id="s">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Referencias</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $rowes ?></div>
                      </span>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php $selecteded = $con->query("SELECT * FROM preguntas ");
              $infos2 = mysqli_num_rows($selecteded);
            ?>

            <?php $select = $con->query("SELECT * FROM preguntas WHERE estado=1 ");
              $infos = mysqli_num_rows($select);
            ?>
            <?php 
            $porcentajes = $infos *100 / $infos2 ;
            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Preguntas</div>
                      <sp id="re">
                        <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <div class="cutte">
                              <?php echo $porcentajes ?>%
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $porcentajes ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </sp>
                      </div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="far fa-hand-point-up fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <?php $selected = $con->query("SELECT * FROM usuario WHERE bloqueo=2");
              $infosi = mysqli_num_rows($selected);
            ?>
            <?php 
            $porcenta = $infosi *100 / $row ;
            ?>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Solicitudes de acceso</div>
                      <spa id="resa">
                        <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <div class="cutte">
                              <?php echo $infosi ?> | <?php echo $porcenta ?>%
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $porcenta ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </spa>
                      </div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <!--div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4"-->
                <!-- Card Header - Dropdown -->
                <!--div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Ganancias Ultimo Año</h6>
                </div-->
                <!-- Card Body -->
                <!--div class="card-body">
                  <div class="chart-area">
                    <canvas id="Grafica"></canvas>
                  </div>
                </div>
              </div>
            </div-->


            <div class="col mb-4">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <?php 
                        $idre= $_SESSION['id'];
                        $selectioner = $con->query("SELECT * FROM usuario WHERE id = '$idre'");
                      ?>
                  <?php while ($vaaa = $selectioner->fetch_assoc()) { 
                    $car = $vaaa['carrera'];
                    $sem = $vaaa['semestre'];
                  }
                  ?>
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Su pensum (<?php echo $car ?>)</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div>
                      
                      <?php if ($car=='N/A'):  ?>
                        Su pensum no esta disponible, actualice la informacion de su <a href="perfil/">Perfil</a>
                      <?php else: ?>
                        <?php if ($car=='Ingenieria Ambiental'):  ?>
                         <img src="//www.escuelaing.edu.co/escuela/planesEstudio/img/ambiental/Malla-curricular-AMBIENTAL.png" class="mx-auto d-block img-fluid">
                        <?php endif; ?>
                        <?php if ($car=='Ingenieria Biomedica'):  ?>
                         <img src="//www.urosario.edu.co/Programa-Ingenieria-Biomedica/imagenes/malla-biomedica.jpg" class="mx-auto d-block img-fluid">
                        <?php endif; ?>
                        <?php if ($car=='Ingenieria Civil'):  ?>
                         <img src="//www.escuelaing.edu.co/escuela/planesEstudio/img/civil/Malla-curricular-CIVIL.png" class="mx-auto d-block img-fluid">
                        <?php endif; ?>
                        <?php if ($car=='Ingenieria Electrica'):  ?>
                         <img src="//www.escuelaing.edu.co/escuela/planesEstudio/img/electrica/Malla-curricular-ELECTRICA.png" class="mx-auto d-block img-fluid">
                        <?php endif; ?>
                        <?php if ($car=='Ingenieria Electronica'):  ?>
                         <img src="//www.escuelaing.edu.co/escuela/planesEstudio/img/electronica/Malla-curricular-ELECTRONICA.png" class="mx-auto d-block img-fluid">
                        <?php endif; ?>
                        <?php if ($car=='Ingenieria Industrial'):  ?>
                         <img src="//www.escuelaing.edu.co/escuela/planesEstudio/img/industrial/Malla-curricular-INDUSTRIAL.png" class="mx-auto d-block img-fluid">
                        <?php endif; ?>
                        <?php if ($car=='Ingenieria Mecanica'):  ?>
                         <img src="//www.escuelaing.edu.co/escuela/planesEstudio/img/mecanica/Malla-curricular-MECANICA.png" class="mx-auto d-block img-fluid">
                        <?php endif; ?>
                        <?php if ($car=='Ingenieria De Sistemas'):  ?>
                         <img src="//www.escuelaing.edu.co/escuela/planesEstudio/img/sistemas/Malla-curricular-SISTEMAS.png" class="mx-auto d-block img-fluid">
                        <?php endif; ?>
                        <?php if ($car=='Administracion De Empresas'):  ?>
                         Lo sentimos no esta disponible una imagen de su pensum <a target="_blank" href="http://administracionescuelaing.co/plan-de-estudios/">Haga click aqui</a> para ir a la web de su pensum
                        <?php endif; ?>
                        <?php if ($car=='Economia'):  ?>
                         <img src="//www.escuelaing.edu.co/escuela/planesEstudio/img/economia/Malla-curricular-ECONOMIA.png" class="mx-auto d-block img-fluid">
                        <?php endif; ?>
                        <?php if ($car=='Matematicas'):  ?>
                         <img src="//www.escuelaing.edu.co/escuela/planesEstudio/img/matematicas/Malla-curricular-MATEMATICAS.png" class="mx-auto d-block img-fluid">
                        <?php endif; ?>

                      <?php endif; ?>
                    </div>
                </div>
              </div>
            </div>

            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-6 mb-4">

              <!-- Project Card Example -->
              <!--div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Proyectos</h6>
                </div>
                <div class="card-body">
                  <h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
                  <div class="progress mb-4">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div-->

              

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

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
<script type="text/javascript">
    $(document).ready(function(){
      $('#cargalineal').load('lineal.php');
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
  <script>
      $(window).ready(function(){
           $("span").animate({ scrollTop: $(document).height()}, 1000);    
      });
      /*$("#rechargue").reload(" #rechargue");*/
      setInterval(function() {
        $('#s').load(' #s'); // Selector de la div y el fichero a refrescar
      }, 500);
  </script>
  <script>
      $(window).ready(function(){
           $("sp").animate({ scrollTop: $(document).height()}, 1000);    
      });
      /*$("#rechargue").reload(" #rechargue");*/
      setInterval(function() {
        $('#re').load(' #re'); // Selector de la div y el fichero a refrescar
      }, 500);
  </script>
  <script>
      $(window).ready(function(){
           $("spa").animate({ scrollTop: $(document).height()}, 1000);    
      });
      /*$("#rechargue").reload(" #rechargue");*/
      setInterval(function() {
        $('#resa').load(' #resa'); // Selector de la div y el fichero a refrescar
      }, 500);
  </script>
  



  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/jsadmin.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/graficas/lineal.js"></script>
  <script src="js/graficas/circular.js"></script>

</body>

</html>
