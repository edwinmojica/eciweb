<?php include '../../conexion/conexion.php';
$id = $con-> real_escape_string(htmlentities($_GET['id']));

$del = $con->query("DELETE FROM materias WHERE id='$id' ");

if ($del) {
	echo '<script language="javascript">alert("Eliminado con exito");window.location.href="add.php"</script>';
}else{
	echo '<script language="javascript">alert("Error al eliminar");window.location.href="add.php"</script>';
}

$con->close();
?>