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

  <title>Perfil | DB_Tech | ECI</title>

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
          <h1 class="h3 mb-4 text-gray-800">Perfil</h1>

          <div class="row">

            <?php 
  $id_ton = $_SESSION['id'];
  $selectioner = $con->query("SELECT * FROM usuario WHERE id = '$id_ton'");
?>
<?php while ($vaaa = $selectioner->fetch_assoc()) { 
  $tono = $vaaa['tono'];
}
?>

            <!-- Content Column -->
            <div class="col-xl-6 mb-4 ">

              <?php 
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

              <!-- Project Card Example -->
              <div class="card  border-left-primary shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Informacion | Ver </h6>
                </div>
                <div class="card-body">
                  <img src="../img/descarga.png" class="mx-auto d-block" height="150">
                  <div id="rechargue">
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
                    $car = $vaaa['carrera'];
                    $sem = $vaaa['semestre'];
                    $create = $vaaa['creador'];
                  }
                  ?>
                  
                  <br>Usuario: <?php echo $name ?>
                  <br>Autorizacion: <?php echo $level?>
                  <br>Nombre: <?php echo $names?>
                  <br>Correo: <?php echo $email?>
                  <br>Numero de celular: <?php echo $phone?>
                  <br>Carrera: <?php echo $car?>
                  <br>Semestre: <?php echo $sem?>
                  <br>Acceso concedido por: <?php echo $create ?>
                  <br>
                   
                  <?php if ($pass==$es):  ?>
                    <h4 class="small font-weight-bold">Estado de la cuenta<span class="float-right">Problema de seguridad!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="80"></div>
                  </div>
                  <?php else: ?>
                    <h4 class="small font-weight-bold">Estado de la cuenta<span class="float-right">Completo!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <?php endif; ?>
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
                  <img src="../img/descarga.png" class="mx-auto d-block" height="150">
                  <form id="frmajax" name="new" method="POST" autocomplete="off">
                  <!--form action="insertar.php" method="POST" autocomplete="off"--> 
                  <input type="text" class="form-control" id="id" value="<?php echo $_SESSION['id']?>" name="id" required hidden> 
                  <input type="text" class="form-control" id="name" value="<?php echo $names?>" name="name" required> 
                  <input type="text" class="form-control" id="email" value="<?php echo $email?>" name="email" required> 
                  <input type="text" class="form-control" id="tel" value="<?php echo $phone?>" name="tel" required> 
                  <label for="car" name=car>Seleccione Carrera:</label>
                    <select class="form-control" id="car" name="car">
                      <option><?php echo $car?></option>
                      <option>Ingenieria Ambiental</option>
                      <option>Ingenieria Biomedica</option>
                      <option>Ingenieria Civil</option>
                      <option>Ingenieria Electrica</option>
                      <option>Ingenieria Electronica</option>
                      <option>Ingenieria Industrial</option>
                      <option>Ingenieria Mecanica</option>
                      <option>Ingenieria De Sistemas</option>
                      <option>Administracion De Empresas</option>
                      <option>Economia</option>
                      <option>Matematicas</option>
                  </select>
                  <!--input type="text" class="form-control" id="car" value="<?php echo $car?>" name="car" required--> 
                  <label for="sem" name=sem>Seleccione Semestre:</label>
                  <select class="form-control" id="sem" name="sem">
                    <option><?php echo $sem?></option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <option>10</option>
                  </select>
                  <!--input type="text" class="form-control" id="sem" value="<?php echo $sem?>" name="sem" required--> 

                  <div class="form-group">
                    <!--input type="submit" value="Ingresar" class="btn float-right login_btn"-->
                    <button type="button" id="btnguardar" class="btn btn-<?php echo $tono ?> float-right login_btn">Ingresar</button>
                  </div>
                </form>
                                    
                </div>
              </div>
            </div>

            <div class="col-xl-6 mb-4 ">
                    
              <!-- Project Card Example -->
              <div class="card  border-left-primary shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Cambiar Contraseña</h6>
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
                  
                  <form id="frmajax1" name="new" method="POST" autocomplete="off">
                  <!--form action="insertar.php" method="POST" autocomplete="off"--> 
                  <input type="text" class="form-control" id="id" value="<?php echo $_SESSION['id']?>" name="id" required hidden> 
                  Su usuario es: <?php echo $name ?><br>
                  <input type="text" class="form-control" id="passwo" placeholder="Nueva Contraseña" name="passwo" required> 
                  <div class="form-group">
                    <!--input type="submit" value="Ingresar" class="btn float-right login_btn"-->
                    <button type="button" id="btnguardar1" class="btn btn-<?php echo $tono ?> float-right login_btn">Ingresar</button>
                  </div><br>
                  <span>Si el sistema no le solicita el cambio de contraseña y esta va a ser actualizada primero ponga ( <?php echo $dates ?> ) como nueva contraseña para que note el cambio en la barra de progreso.</span>
                </form>
                  <br><br>
                  <div id="recharguese">
                  <?php if ($pass==$es):  ?>
                    <h4 class="small font-weight-bold">Nivel de Seguridad de su cuenta<span class="float-right">Bajo!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20"></div>
                  </div>
                  <?php else: ?>
                    <h4 class="small font-weight-bold">Nivel de Seguridad de su cuenta<span class="float-right">Completo!</span></h4>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <?php endif; ?>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('#btnguardar1').click(function(){
      var datos=$('#frmajax1').serialize();
      $.ajax({
        type:"POST",
        url:"uppsw.php",
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
  <script>
      $(window).ready(function(){
           $("div").animate({ scrollTop: $(document).height()}, 1000);    
      });
      /*$("#rechargue").reload(" #rechargue");*/
      setInterval(function() {
        $('#recharguese').load(' #recharguese'); // Selector de la div y el fichero a refrescar
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
