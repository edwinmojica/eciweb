<?php
include '../../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nick = $_SESSION['nick'];
	$name = $con->real_escape_string(htmlentities($_POST['name']));
	$email = $con->real_escape_string(htmlentities($_POST['email']));
	$tel = $con->real_escape_string(htmlentities($_POST['tel']));
	$car = $con->real_escape_string(htmlentities($_POST['car']));
	$sem = $con->real_escape_string(htmlentities($_POST['sem']));

	$up = $con->query("UPDATE usuario SET nombre='$name', correo='$email', tel='$tel', carrera='$car', semestre='$sem' WHERE nick='$nick' ");

	if ($up) {
		echo '<script language="javascript">alert("Datos actualizados con exito");window.location.href="index.php"</script>';
	}else{
		echo '<script language="javascript">alert("Datos no actualizados");window.location.href="index.php"</script>';
	}


	}else{
		echo '<script language="javascript">alert("utiliza el formulario");window.location.href="index.php"</script>';
	}
$con->close();
?>