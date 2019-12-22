<?php include '../../conexion/conexion.php';
$id = $con-> real_escape_string(htmlentities($_GET['id']));

$del = $con->query("DELETE FROM usuario WHERE id='$id' ");

if ($del) {
	echo '<script language="javascript">alert("Usuario eliminado con exito");window.location.href="index.php"</script>';
}else{
	echo '<script language="javascript">alert("Error al eliminar este usuario");window.location.href="index.php"</script>';
}

$con->close();
?>