<?php
include '../../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$materia = $con->real_escape_string(htmlentities($_POST['materia']));
	$nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
	$creditos = $con->real_escape_string(htmlentities($_POST['creditos']));

	$creador = $_SESSION['nick'];


	$pass1= sha1($pass1);
	$ins = $con->query("INSERT INTO materias VALUES('','$materia','$nombre','$creditos','$creador') ");
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
