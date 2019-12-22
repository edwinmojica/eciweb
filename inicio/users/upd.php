<?php
include '../../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nick = $con->real_escape_string(htmlentities($_POST['nick']));
	$pass1 = $con->real_escape_string(htmlentities($_POST['pass1']));

	$pass12= sha1($pass1);
	$up = $con->query("UPDATE usuario SET pass='$pass12', bloqueo=1 WHERE nick='$nick' ");

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


	

	
	