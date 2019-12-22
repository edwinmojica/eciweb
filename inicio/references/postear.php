<?php
include '../../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$id_profesor = $con->real_escape_string(htmlentities($_POST['id_profesor']));
	$comentario = $con->real_escape_string(htmlentities($_POST['comentario']));
	$fuente = $con->real_escape_string(htmlentities($_POST['fuente']));
	$creador = $_SESSION['nick'];


	$ins = $con->query("INSERT INTO comentarios VALUES('','$id_profesor','$comentario','$fuente','$creador') ");
	if ($ins) {
		echo '<script language="javascript">alert("Datos insertados con exito");window.location.href="index.php"</script>';
	}else {
		echo '<script language="javascript">alert("Datos no insertados");window.location.href="index.php"</script>';
	}

	

}else {//formulario
	echo '<script language="javascript">alert("utiliza el formulario");window.location.href="index.php"</script>';
}
$con->close();
 ?>
