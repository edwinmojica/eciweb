<?php
include 'conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nick = $con->real_escape_string(htmlentities($_POST['usuario']));
	$pass1 = $nick.'12345';
	$nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
	$correo = $con->real_escape_string(htmlentities($_POST['correo']));
	$tel = $con->real_escape_string(htmlentities($_POST['celular']));
	$ruta = $con->real_escape_string(htmlentities($_POST['ruta']));
	$creador = $con->real_escape_string(htmlentities($_POST['creador']));



	$pass1= sha1($pass1);
	$ins = $con->query("INSERT INTO usuario VALUES('','$nick','$pass1','$nombre','$correo', '$tel', 'ADMINISTRADOR',2,'$ruta','dark','N/A','N/A','$creador') ");
	if ($ins) {
		echo '<script language="javascript">alert("Su usuario ha sido creado con exito, pero en necesaria la verificacion del administrador general del sistema para que pueda utilizar su acceso para ingresar al servicio, nos pondremos en contacto por correo o por medio del numero de whatsapp que proporciono anteriormente. Si la verificacion tarda o la requiere con urgencia contactese con la persona que le invito a la web.");window.location.href="index.php"</script>';
	}else {
		echo '<script language="javascript">alert("Error al crear su usuario, verifique sus datos e intentelo nuervamente");window.location.href="index.php"</script>';
	}

	

}else {//formulario
	echo '<script language="javascript">alert("utiliza el formulario");window.location.href="index.php"</script>';
}
$con->close();
 ?>
