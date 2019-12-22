<?php include '../../conexion/conexion.php';
$id = $con-> real_escape_string(htmlentities($_GET['id']));

$del = $con->query("DELETE FROM preguntas WHERE id='$id' ");

if ($del) {
	echo '<script language="javascript">alert("Eliminado con exito");window.location.href="../pr/"</script>';
}else{
	echo '<script language="javascript">alert("Error al eliminar");window.location.href="../pr/"</script>';
}

$con->close();
?>