<?php
include '../../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nick = $_SESSION['nick'];
	$passw = $con->real_escape_string(htmlentities($_POST['passwo']));
    $psw = sha1($passw);
	$up = $con->query("UPDATE usuario SET pass='$psw' WHERE nick='$nick' ");

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