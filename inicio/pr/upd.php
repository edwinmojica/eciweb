<?php include '../../conexion/conexion.php';
$id = $con->real_escape_string(htmlentities($_GET['id']));
$estado = $con->real_escape_string(htmlentities($_GET['bl']));

if ($estado == 1) {
	$up = $con->query("UPDATE preguntas SET estado=0 WHERE id='$id' ");
	if ($up) {
		echo '<script language="javascript">alert("Gracias por dar respuesta a esta pregunta");window.location.href="index.php"</script>';
	}else {
		echo '<script language="javascript">alert("Error, no se pudo marcar como visto. Intentelo nuevamente");window.location.href="index.php"</script>';
	}
}
else {
	$up = $con->query("UPDATE preguntas SET estado=1 WHERE id='$id' ");
	if ($up) {
		echo '<script language="javascript">alert("Gracias por dar respuesta a esta pregunta");window.location.href="index.php"</script>';
	}else {
		echo '<script language="javascript">alert("Error, no se pudo marcar como visto. Intentelo nuevamente");window.location.href="index.php"</script>';
	}
}
$con->close();
?>
