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

  <title>Usuarios  | DB_Tech | ECI</title>

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
          <h1 class="h3 mb-4 text-gray-800">Usuarios</h1>

           <div class="row">

            <?php 
             $selectioner = $con->query("SELECT * FROM usuario WHERE id = '$id_ton' ");
            ?>
            <?php while ($vaaa = $selectioner->fetch_assoc()) { 
              $tono = $vaaa['tono'];
            }
            ?>

            <?php $sel = $con->query("SELECT * FROM usuario");
              $row = mysqli_num_rows($sel);
            ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <spo id="rechargu">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Usuarios Registrados</div>
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

            <?php $selec = $con->query("SELECT * FROM usuario WHERE bloqueo=1");
              $info = mysqli_num_rows($selec);
            ?>

            <?php 
            $porcentaje = $info *100 / $row ;
            ?>

            <!-- Earnings (Monthly) Card Example -->
            <!--div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <span id="s">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Usuarios Activos</div>
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $info ?> | <?php echo $porcentaje ?>%</div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $porcentaje ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </span>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-check fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div-->

            <?php $select = $con->query("SELECT * FROM usuario WHERE bloqueo=0");
              $infos = mysqli_num_rows($select);
            ?>
            <?php 
            $porcentajes = $infos *100 / $row ;
            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Usuarios Activos</div>
                      <span id="s">
                        <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <div class="cutte">
                              <?php echo $info ?> | <?php echo $porcentaje ?>%
                            </div>
                          </div>
                        </div>
                        <div class="col">
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $porcentaje ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </span>
                      </div>
                      
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php $select = $con->query("SELECT * FROM usuario WHERE bloqueo=0");
              $infos = mysqli_num_rows($select);
            ?>
            <?php 
            $porcentajes = $infos *100 / $row ;
            ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Usuarios Bloqueados</div>
                      <sp id="re">
                        <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                            <div class="cutte">
                              <?php echo $infos ?> | <?php echo $porcentajes ?>%
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
                      <i class="fas fa-user-lock fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <!--div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <spa id="resa">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Solicitudes Pendientes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">70</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </spa>
                    </div>
                  </div>
                </div>
              </div>
            </div-->

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

            <!-- Content Column -->
            <div class="col-xl-6 mb-4 ">

              <!-- Project Card Example -->
              <div class="card  border-left-primary shadow mb-4">
                <div id="rechargue">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tabla de usuarios registrados </h6>
                </div>
                <div class="card-body">
                  
                  <?php 
                    $idre= $_SESSION['id'];
                    $selectioner = $con->query("SELECT * FROM usuario WHERE id = '$idre'");
                  ?>
                  <?php while ($vaaa = $selectioner->fetch_assoc()) { 
                    $name = $vaaa['nick'];
                    $level = $vaaa['nivel']; 
                    $email = $vaaa['correo'];
                    $names = $vaaa['nombre'];
                    $phone = $vaaa['tel'];
                  }
                  ?>
                  

                  <?php 
                    $select = $con->query("SELECT * FROM usuario ");
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
                          <th>Nombre</th>
                          <?php if ($name=='emojica'):  ?>
                          <th>Usuario</th>
                          <th>Nivel</th>
                          <th>Correo</th>
                          <th>Telefono</th>
                          <th>Estado</th>
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
                          <th>Nombre</th>
                          <?php if ($name=='emojica'):  ?>
                          <th>Usuario</th>
                          <th>Nivel</th>
                          <th>Correo</th>
                          <th>Telefono</th>
                          <th>Estado</th>
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
                          <td><?php echo $f['nombre']?></td>
                          <?php if ($name=='emojica'):  ?>
                          <td><?php echo $f['nick']?></td>
                          <td><?php echo $f['nivel']?></td>
                          <td><?php echo $f['correo']?></td>
                          <td><?php echo $f['tel'] ?></td>
                          <td>
                            <?php if ($f['bloqueo']==1):  ?>
                              <a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"><i class="fas fa-user-check fa-2x text-red-300"></i></a>
                            <?php else: ?>
                              <?php if ($f['bloqueo']==2):  ?>
                                <a href="solicitud.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"><i class="fas fa-user-plus fa-2x text-warning"></i></a>
                              <?php else: ?>
                                <a href="bloqueo_manual.php?us=<?php echo $f['id'] ?>&bl=<?php echo $f['bloqueo'] ?>"><i class="fas fa-user-lock fa-2x text-gray-300"></i></a>
                               <?php endif; ?>
                            <?php endif; ?>
                          </td>
                          <td><a href="eliminar_usuario.php?id=<?php echo $f['id'] ?>"><i class="fas fa-user-times fa-2x text-danger"></i></a></td>
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
                  <h6 class="m-0 font-weight-bold text-danger">Registrar nuevo usuario</h6>
                </div>
                <div class="card-body">
                  <img src="../img/descarga.png" class="mx-auto d-block" height="80">
                  <form id="frmajax" name="new" method="POST" autocomplete="off">
                  <!--form action="insertar.php" name="new" method="POST" autocomplete="off"--> 
                  <input type="text" class="form-control" id="id" value="<?php echo $_SESSION['id']?>" name="id" required hidden> 
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" required> 
                  <input type="email" class="form-control" id="correo" placeholder="Correo" name="correo" required> 
                  <input type="text" class="form-control" id="tel" placeholder="Telefono" name="tel" required>
                  <input type="text" class="form-control" id="nick" placeholder="Usuario" name="nick" required> 
                  <input type="text" class="form-control" id="ruta" value="descarga.png" name="ruta" required hidden> 
                  <input type="text" class="form-control" id="pass1" placeholder="Contraseña" name="pass1" required> 
                  <label for="nivel" name=nivel>Seleccione el nivel:</label>
                    <select class="form-control" id="nivel" name="nivel">
                      <option>-----</option>
                      <option>ADMINISTRADOR</option>
                    </select>
                  <div class="form-group">
                    <!--input type="submit" value="Ingresar" class="btn btn-<?php echo $tono ?> float-right login_btn"-->
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
