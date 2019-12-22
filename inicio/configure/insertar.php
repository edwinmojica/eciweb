<?php
include '../../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$ids=$_SESSION['id'];
	$sel1 = $con->real_escape_string(htmlentities($_POST['sel1']));

	$up = $con->query("UPDATE usuario SET tono='$sel1' WHERE id= '$ids' ");

	if ($up) {
		echo '<script language="javascript">alert("Datos actualizados con exito");window.location.href="index.php"</script>';
	}else{
		echo '<script language="javascript">alert("Datos no actualizados");window.location.href="index.php"</script>';
	}

	$con->close();
	}else{
		echo '<script language="javascript">alert("utiliza el formulario");window.location.href="index.php"</script>';
	}
?>