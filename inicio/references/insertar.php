<?php
include '../../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$profesor = $con->real_escape_string(htmlentities($_POST['profesor']));
	$nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
	$creador = $_SESSION['nick'];


	$ins = $con->query("INSERT INTO profesor VALUES('','$profesor','$nombre',0,0,'$creador') ");
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
