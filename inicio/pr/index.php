<?php 
include '../../conexion/conexion.php';
setlocale(LC_ALL,"es_ES");

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

  <title>Preguntas| DB_Tech | ECI</title>

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
          <h1 class="h3 mb-4 text-gray-800">Preguntas</h1>
          
        </div>

          <div class="row">
                <?php 
                  $select = $con->query("SELECT * FROM profesor");
                ?>
                <?php while ($f = $select->fetch_assoc()) { 
                  $id= $f['id'];
                  $nombre = $f['nombre'];
                  $puntaje = $f['puntaje'];
                  $referencias = $f['referencias'];
                  ?>
                <?php } ?>

                <?php 
                  $rawwww = $con->query("SELECT * FROM preguntas ");
                ?>

             <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div id="rechargue">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Preguntas</h6>
                  <a><i class="far fa-calendar-minus fa-2x text-info"></i> Sin Responder</a>
                  <a><i class="far fa-calendar-check fa-2x text-primary"></i>Respondido</a>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="row">
                  
                  <div class="col mb-4">
                    <?php while ($j = $rawwww->fetch_assoc()) { 
                      $estado = $j['estado'];
                      ?>
                    <div class="card border-left-primary ">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 "> <?php echo $j['creador'];?>

                                <?php if ($estado==1):  ?>
                                  <a class="float-right" href="upd.php?id=<?php echo $j['id'] ?>&bl=<?php echo $j['estado'] ?>"><i class="far fa-calendar-minus fa-2x text-info"></i></a>
                                <?php else: ?>
                                  <a class="float-right"><i class="far fa-calendar-check fa-2x text-primary"></i></a>
                                <?php endif; ?>

                                <a class="float-right" href="https://wa.me/57<?php echo $j['numero']?>?text=A continuacion doy una respuesta a su pregunta: (<?php echo $j['comentario']?>). Cordialmente: <?php echo $_SESSION['nombre']?> | Permiso concedido por medio de DB_Tech ECI "><i class="fab fa-whatsapp fa-2x text-success"></i> | </a>
                                
                                

                                
                                <?php if ($name=='emojica'):  ?>

                                  <a class="float-right" href="delete.php?id=<?php echo $j['id'] ?>"><i class="far fa-trash-alt fa-2x text-danger"></i> |  </a>
                                  <!--a class="float-right" href="https://wa.me/57<?php echo $j['numero']?>?text=A continuacion doy una respuesta a su pregunta: (<?php echo $j['comentario']?>). Cordialmente: <?php echo $_SESSION['nombre']?> | Permiso concedido por medio de DB_Tech ECI "><i class="fab fa-whatsapp-square fa-2x text-success"></i> | </a-->
                                <?php else: ?>
                                <?php endif; ?>
                              </div>
                              <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $j['comentario'];?></div>
                              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 float-right"> <?php echo $j['fecha'];?> | <?php echo $j['hora'] ?></div>
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
                  <h6 class="m-0 font-weight-bold text-primary">Dejar una pregunta </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <form id="frmajax" name="new" method="POST" autocomplete="off">
                  <!--form action="insertar.php" name="new" method="POST" autocomplete="off"--> 
                  <input type="text" class="form-control" id="id" value="<?php echo $_SESSION['id']?>" name="id" required  hidden> 
                  <input type="text" class="form-control" id="creador" value="<?php echo $_SESSION['nombre']?>" placeholder="creador" name="creador" required  hidden> 
                  <input type="text" class="form-control" id="comentario" placeholder="Pregunta" name="comentario" title="Recuerde tener el numero de whatsapp actualizado para que pueda recibir una respuesta" required>
                  <input type="text" class="form-control" id="fecha" value="<?php echo date('d / m / Y') ?>" placeholder="fecha" name="fecha" required hidden> 
                  <input type="text" class="form-control" id="hora" value="<?php echo strftime("%H:%M:%S");  ?>" placeholder="hora" name="hora" required hidden>
                  <input type="text" class="form-control" id="estado" value="1" placeholder="estado" name="estado" required hidden>
                  <input type="text" class="form-control" id="contacto" value="<?php echo $_SESSION['tel']?>" placeholder="contacto" name="contacto" required hidden>

                  <div class="form-group">
                    <!--input type="submit" value="Ingresar" class="btn btn-<?php echo $tono ?> float-right login_btn"-->
                    <button type="button" id="btnguardar" class="btn btn-<?php echo $tono ?> float-right login_btn">Enviar</button>
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
