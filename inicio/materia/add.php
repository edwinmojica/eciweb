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

  <title>Materia nueva  | DB_Tech | ECI</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
 <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../css/styleadmin.min.css" rel="stylesheet">
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-4 text-gray-800">Nueva Materia</h1>
          <a href="../materia/" class="d-sm-inline-block btn btn-sm btn-<?php echo $tono ?> shadow-sm"><i class="far fa-clipboard fa-sm text-white-50"></i> Regresar</a>
        </div>

           <div class="row">

            <?php 
             $selectioner = $con->query("SELECT * FROM usuario WHERE id = '$id_ton' ");
            ?>
            <?php while ($vaaa = $selectioner->fetch_assoc()) { 
              $tono = $vaaa['tono'];
            }
            ?>

            <?php $sel = $con->query("SELECT * FROM materias ");
              $row = mysqli_num_rows($sel);
            ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <spo id="rechargu">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Materias Registradas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $row ?></div>
                      </spo>
                    </div>
                    <div class="col-auto">
                      <i class="fas fas fa-universal-access fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            </div>

          <div class="row">

            <!-- Content Column -->
            <div class="col-xl-6 mb-4 ">

              <!-- Project Card Example -->
              <div class="card  border-left-primary shadow mb-4">
                <div id="rechargue">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tabla de materias registradas </h6>
                </div>
                <div class="card-body">
                  
                  <?php 
                    $idre= $_SESSION['id'];
                    $selectioner = $con->query("SELECT * FROM materias ");
                  ?>
                  <?php while ($vaaa = $selectioner->fetch_assoc()) { 
                    $id = $vaaa['id'];
                    $materia = $vaaa['materia']; 
                    $creditos = $vaaa['creditos'];
                    $creador = $vaaa['creador'];
                  }
                  ?>
                  

                  <?php 
                    $select = $con->query("SELECT * FROM materias ");
                  ?>
                  
                  <div class="container">
                  <div class="table-responsive">          
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <?php if ($name=='emojica'):  ?>
                          <th>Id</th>
                          <?php else: ?>
                          <?php endif; ?>
                          <th>Materia</th>
                          <th>Creditos</th>
                          <?php if ($name=='emojica'):  ?>
                          
                          <th>Creador</th>
                          <th>Eliminar</th>
                          <?php else: ?>
                          <?php endif; ?>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <?php if ($name=='emojica'):  ?>
                          <th>Id</th>
                          <?php else: ?>
                          <?php endif; ?>
                          <th>Materia</th>
                          <th>Creditos</th>
                          <?php if ($name=='emojica'):  ?>
                          
                          <th>Creador</th>
                          <th>Eliminar</th>
                          <?php else: ?>
                          <?php endif; ?>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php while ($f = $select->fetch_assoc()) { ?>
                        <tr>
                          <?php if ($name=='emojica'):  ?>
                          <td><?php echo $f['id'] ?></td>
                          <?php else: ?>
                          <?php endif; ?>
                          <td><?php echo $f['materia']?></td>
                          <td><?php echo $f['creditos']?></td>
                          <?php if ($name=='emojica'):  ?>
                          
                          <td><?php echo $f['creador']?></td>
                          
                          <td><a href="eliminar.php?id=<?php echo $f['id'] ?>"><i class=" far fa-trash-alt fa-2x text-danger"></i></a></td>
                          <?php else: ?>
                          <?php endif; ?>
                        </tr><?php } ?>
                      </tbody>
                    </table>
                    </div>
                  </div>

                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xl-6 mb-4 ">

              <!-- Project Card Example -->
              <div class="card  border-left-danger shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-danger">Registrar nueva Materia</h6>
                </div>
                <div class="card-body">

                  <form id="frmajax" name="new" method="POST" autocomplete="off">
                  <!--form action="insertar.php" name="new" method="POST" autocomplete="off"--> 
                  <input type="text" class="form-control" id="id" value="<?php echo $_SESSION['id']?>" name="id" required hidden> 
                  <input type="text" class="form-control" id="materia" placeholder="Materia (poner las siglas en mayuscula)" name="materia" required> 
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre materia (poner las el nombre de la materia)" name="nombre" required> 
                  <input type="text" class="form-control" id="creditos" placeholder="Numero de Creditos" name="creditos" required>
                  <div class="form-group">
                   
                    <button type="button" id="btnguardar" class="btn btn-<?php echo $tono ?> float-right login_btn">Registrar</button>
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
           $("div").animate({ scrollTop: $(document).height()}, 5000);    
      });
      /*$("#rechargue").reload(" #rechargue");*/
      setInterval(function() {
        $('#rechargue').load(' #rechargue'); // Selector de la div y el fichero a refrescar
      }, 2500);
  </script>

  <script>
      $(window).ready(function(){
           $("spo").animate({ scrollTop: $(document).height()}, 1000);    
      });
      /*$("#rechargue").reload(" #rechargue");*/
      setInterval(function() {
        $('#rechargu').load(' #rechargu'); // Selector de la div y el fichero a refrescar
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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/jsadmin.min.js"></script>
   <script src="../js/graficas/datatables-demo.js"></script>

</body>

</html>
