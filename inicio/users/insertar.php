<?php
include '../../conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nick = $con->real_escape_string(htmlentities($_POST['nick']));
	$pass1 = $con->real_escape_string(htmlentities($_POST['pass1']));
	//$pass1 = sha1($pass1);
	$nivel = $con->real_escape_string(htmlentities($_POST['nivel']));
	$nombre = $con->real_escape_string(htmlentities($_POST['nombre']));
	$correo = $con->real_escape_string(htmlentities($_POST['correo']));
	$tel = $con->real_escape_string(htmlentities($_POST['tel']));
	$ruta = $con->real_escape_string(htmlentities($_POST['ruta']));
	$creador = $_SESSION['nick'];

	//$extension = '';
	//$ruta='foto_perfil';
	//$archivo=$_FILES['foto']['tmp_name'];
	//$nombrearchivo=$_FILES['foto']['name'];
	//$info = pathinfo($nombrearchivo);
	//if ($archivo !='') {
		//$extension = $info['extension'];
		//if ($extension == "png" || $extension == "PNG" || $extension == "jpg" || $extension == "JPG" || $extension == "jpge" || $extension == "JPGE" ) {
			//move_uploaded_file($archivo,'foto_perfil/'.$nick.'.'.$extension);
			//$ruta = $ruta."/".$nick.'.'.$extension;
		//}else {
			//header('location:../extend/alerta.php?msj=El formato no es valido&c=us&p=in&t=error');
		    //exit;
		//}
	//}else {
		//$ruta = "foto_perfil/perfil.jpg";
	//}

	$pass1= sha1($pass1);
	$ins = $con->query("INSERT INTO usuario VALUES('','$nick','$pass1','$nombre','$correo', '$tel', '$nivel',1,'$ruta','dark','N/A','N/A','$creador') ");
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
