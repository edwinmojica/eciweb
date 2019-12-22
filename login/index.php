<?php
include '../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD']== 'POST') {
$user = $con->real_escape_string(htmlentities($_POST['usuario']));
$pass = $con->real_escape_string(htmlentities($_POST['contra']));
$candado = ' ';
$str_u = strpos($user,$candado);
$str_p = strpos($pass,$candado);
if (is_int($str_u)) {
	$user = '';
}else{
	$usuario = $user;
}

if (is_int($str_p)) {
	$pass = '';
}else{
	$pass2 = sha1($pass);
}

if ($user == null && $pass == null) {
	echo '<script language="javascript">alert("Los caracteres ingresados son invalidos");window.location.href="../"</script>';
	//header('location:../index.php?error=Caracteres ingresados no validos');
}else{
$sel = $con->query("SELECT id,nick,nombre, nivel, correo, foto, pass, tel FROM usuario WHERE nick = '$usuario' AND pass = '$pass2' AND bloqueo = 1 ");
$row = mysqli_num_rows($sel);
	if ($row == 1) {
		if ($var = $sel->fetch_assoc()) {
			$id = $var['id'];
			$nick = $var['nick'];
			$contra = $var['pass'];
			$nivel = $var['nivel'];
			$correo = $var['correo'];
			$tel = $var['tel'];
			$foto = $var['foto'];
			$nombre = $var['nombre'];
		}

		if ($nick == $usuario && $contra == $pass2 && $nivel == 'ADMINISTRADOR') {
			$_SESSION['id'] = $id;
			$_SESSION['nick'] = $nick;
			$_SESSION['nombre'] = $nombre;
			$_SESSION['nivel'] = $nivel;
			$_SESSION['correo'] = $correo;
			$_SESSION['tel'] = $tel;
			$_SESSION['foto'] = $foto;
			header('location:../inicio/');
		}elseif ($nick == $usuario && $contra == $pass2 && $nivel == 'VENDEDOR') {
			$_SESSION['nick'] = $nick;
			$_SESSION['nombre'] = $nombre;
			$_SESSION['nivel'] = $nivel;
			$_SESSION['correo'] = $correo;
			$_SESSION['foto'] = $foto;
			header('location:../edicion/');
		}else {
			echo '<script language="javascript">alert("No tienes acceso");window.location.href="../"</script>';
			//header('location:../index.php?error=No tienes acceso');
		}


	}else {
		echo '<script language="javascript">alert("Usuario o Contrasena incorrecto");window.location.href="../"</script>';
  		//echo '<script language="javascript">alert("Usuario o contrasena incorrecto");</script>';
		//header('location:../');
	}



}

}else{
	header('location:../index.php?error=Utiliza el formulario');
}


?>