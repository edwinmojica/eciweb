<?php @session_start();
if (isset($_SESSION['nick'])) {
	header('location:inicio');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ingresar | DB_Tech | ECI</title>
	<link rel="stylesheet" href="css/loggin.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    <i class="fas fa-exclamation-circle fa-sm"></i>  Informacion
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Inforacion sobre la pagina web</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          Este sistema ha sido desarrollado con el fin de tener un ranking de los mejores profesores y sus caracteristicas al momento de realizar los horarios, su contribucion es sumamente importante para lograr tener una base de datos mas completa y crear una cadena de colaboracion, si ve un profesor en esta web con el cual tuvo clases califiquelo y si es posible deje un comentario para que otras personas se guien, si no se encuentra registro de un profesor o una materia le invitamos a agregarlo, gasta 5 minutos ayudando a otra persona como alguien posiblemente le va a ayudar a usted.<br>
          Este sitio no represeta de ninguna manera a la escuela, es una iniciativa con la cual buscamos crear una cadena de apoyo entre los estudiantes al momento de elegir los profesores con quienes tendremos clase.<br>
          <img class="img-fluid rounded" src="img/1.png" width="350" alt="Visual">
          <img class="img-fluid rounded" src="img/2.png" width="350" alt="Visual">
          <img class="img-fluid rounded" src="img/3.png" width="350" alt="Visual">
          <img class="img-fluid rounded" src="img/4.png" width="350" alt="Visual">
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>

<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Solicitud De Acceso</h3>
				<!--div class="d-flex justify-content-end social_icon">
					<a href="#facebook"><span><i class="fab fa-facebook-square"></i></span></a>
					<a href="#"><span><i class="fab fa-whatsapp-square"></i></span></a>
					<a href="#Twitter"><span><i class="fab fa-twitter-square"></i></span></a>
				</div-->
			</div>
			<div class="card-body">
				<form action="solicitudes/index.php" method="post" autocomplete="off">
					<div class="input-group form-group">
						<input type="text" name="nick" id="nick" required pattern="[A-Za-z0-9]{5,30}" class="form-control" placeholder="Usuario">
						
					</div>
					<div class="input-group form-group">
						<input type="text" name="nombre" id="nombre" required class="form-control" placeholder="Nombre">
					</div>
					<div class="input-group form-group">
						<input type="email" name="correo" id="correo" required  class="form-control" placeholder="Correo">
					</div>
					<div class="input-group form-group">
						<input type="text" name="tel" id="tel" required class="form-control" placeholder="Telefono">
					</div>
					<!--div class="row align-items-center remember">
						<input type="checkbox">Recordarme
					</div-->
					<div class="form-group">
						<input type="submit" value="Solicitar" class="btn float-right login_btn">
					</div></form></div>
					<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Ya tienes una cuenta?<a href="index.php">Iniciar Sesion</a>
				</div>
			</div>
				
			
		</div>
	</div>
</div>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>