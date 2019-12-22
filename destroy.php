<?php @session_start();
$_SESSION = array();
session_destroy();
echo '<script language="javascript">alert("Sesion Finalizada correctamente");window.location.href="../"</script>';
//header("location:../");
?>