<?php
include '../../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$creador = $con->real_escape_string(htmlentities($_POST['creador']));
	$comentario = $con->real_escape_string(htmlentities($_POST['comentario']));
	$fecha = $con->real_escape_string(htmlentities($_POST['fecha']));
	$hora = $con->real_escape_string(htmlentities($_POST['hora']));
	$contacto = $con->real_escape_string(htmlentities($_POST['contacto']));


	$ins = $con->query("INSERT INTO preguntas VALUES('','$comentario','$creador','$fecha','$hora','$contacto',1) ");
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
