<?php
$host="localhost";
$usuario="cliente";
$contraseña="";
$base="complete";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_errno());
}

?>