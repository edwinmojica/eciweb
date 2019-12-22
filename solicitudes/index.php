<?php include '../conexion/conexion.php';
$nick = $con->real_escape_string(htmlentities($_POST['nick']));

	$up = $con->query("UPDATE usuario SET bloqueo=2 WHERE nick='$nick' ");
	if ($up) {
		echo '<script language="javascript">alert("Solicitud enviada, su usuario sera bloqueado por seguridad, el administrador se pondra en contacto con usted para darle acceso y su nueva contrasena");window.location.href="../index.php"</script>';
	}else {
		echo '<script language="javascript">alert("Este usuario no existe por esta razon su solicitud no fue procesada");window.location.href="../index.php"</script>';
	}

?>