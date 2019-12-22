<?php include '../../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['us']));
$bloqueo = $con->real_escape_string(htmlentities($_GET['bl']));

if ($bloqueo == 1) {
	$up = $con->query("UPDATE usuario SET bloqueo=0 WHERE id='$id' ");
	if ($up) {
		echo '<script language="javascript">alert("Usuario Bloqueado, este usuario no podra acceder al sistema sin que un administrador permita su ingreso");window.location.href="index.php"</script>';
	}else {
		echo '<script language="javascript">alert("Error al bloquear al usuario");window.location.href="index.php"</script>';
	}
}else {
	$up = $con->query("UPDATE usuario SET bloqueo=1 WHERE id='$id' ");
	if ($up) {
		echo '<script language="javascript">alert("Usuario desbloqueado con exito, este usuario podra acceder al sistema y desarollar los trabajos establecidos en su rol");window.location.href="index.php"</script>';
	}else {
		echo '<script language="javascript">alert("Este usuario no pudo ser desbloqueado");window.location.href="index.php"</script>';
	}
}
$con->close();
?>
