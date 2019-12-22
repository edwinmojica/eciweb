<?php 
include '../../conexion/conexion.php';
$id_profesor = $con-> real_escape_string(htmlentities($_GET['id']));
$id_materia = $con-> real_escape_string(htmlentities($_GET['id2']));
$material = $con-> real_escape_string(htmlentities($_GET['id3']));
$materia = base64_decode($material);
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

  <title>Materias | <?php echo $materia?> | DB_Tech | ECI</title>

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

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-4 text-gray-800"><?php echo $materia?></h1>
          <a href="../references/index.php?id=<?php echo $id_materia?>&name=<?php echo $material ?>" class="d-sm-inline-block btn btn-sm btn-<?php echo $tono ?> shadow-sm"><i class="far fa-clipboard fa-sm text-white-50"></i> Regresar</a>
        </div>

          <div class="row">
                <?php 
                  $select = $con->query("SELECT * FROM profesor WHERE id= '$id_profesor' ");
                ?>
                <?php while ($f = $select->fetch_assoc()) { 
                  $id= $f['id'];
                  $nombre = $f['nombre'];
                  $puntaje = $f['puntaje'];
                  $referencias = $f['referencias'];
                  ?>
                <?php } ?>

                <?php 
                  $rawwww = $con->query("SELECT * FROM comentarios WHERE id_profesor= '$id_profesor' ");
                ?>

             <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div id="rechargue">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Comentarios</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
                  
                  <div class="col mb-4">
                    <?php while ($j = $rawwww->fetch_assoc()) { ?>
                    <div class="card border-left-primary ">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Fuente: <?php echo $j['fuente'];?>
                                
                                <?php if ($name=='emojica'):  ?>
                                  <a href="delete.php?id=<?php echo $j['id'] ?>"><i class="far fa-trash-alt fa-2x text-danger"></i></a>
                                  | creado por: <?php echo $j['creador']?>
                                <?php else: ?>
                                <?php endif; ?>
                              </div>
                              <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $j['comentario'];?></div>
                          </div>
                          <div class="col-auto">
                           <i class="far fa-comment fa-sm fa-fw mr-2 text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
                </div>
              </div>
            </div>

            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Dejar un comentario </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <form id="frmajax" name="new" method="POST" autocomplete="off">
                  <!--form action="insertar.php" name="new" method="POST" autocomplete="off"--> 
                  <input type="text" class="form-control" id="id" value="<?php echo $_SESSION['id']?>" name="id" required hidden> 
                  <input type="text" class="form-control" id="id_profesor" value="<?php echo $id_profesor ?>" placeholder="id_profesor" name="id_profesor" required hidden> 
                  <input type="text" class="form-control" id="comentario" placeholder="comentario" name="comentario" required> 
                  
                  <label for="fuente" name=fuente>Seleccione la fuente:</label>
                    <select class="form-control" id="fuente" name="fuente">
                      <option>Anonimo</option>
                      <option><?php echo $_SESSION['nombre'];?></option>
                      <option>Facebook</option>
                      <option>Otro</option>
                    </select>
                  <div class="form-group">
                    <!--input type="submit" value="Ingresar" class="btn btn-<?php echo $tono ?> float-right login_btn"-->
                    <button type="button" id="btnguardar" class="btn btn-<?php echo $tono ?> float-right login_btn">Comentar</button>
                  </div>
                </form>
                  
                </div>
              </div>
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
      $('#cargalineal').load('../lineal.php?id=<?php echo $f['id']?>&name=<?php echo $materia?>');
    });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#btnguardar').click(function(){
      var datos=$('#frmajax').serialize();
      $.ajax({
        type:"POST",
        url:"postear.php",
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
