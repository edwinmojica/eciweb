<?php
include '../../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$nick = $con->real_escape_string(htmlentities($_GET['id']));
	$like = $con->real_escape_string(htmlentities($_GET['voto']));

	$up = $con->query("UPDATE profesor SET referencias='$like' WHERE id='$nick' ");

	if ($up) {
		echo '<script language="javascript">alert("Gracias por tu voto");window.location.href="../materia/"</script>';
	}else{
		echo '<script language="javascript">alert("Ocurrio un error, intentalo nuevamente");window.location.href="../materia/"</script>';
	}


	}else{
		echo '<script language="javascript">alert("utiliza el formulario");window.location.href="../materia/"</script>';
	}
$con->close();
?>


	

	
	