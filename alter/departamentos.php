<?php

include 'conexion2.php';

$query = $dbConnected->query("SELECT * FROM departamentos WHERE estado='1'");

echo '<option value="">Seleccione</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['id_departamento']. '">' . $row['departamento'] . '</option>' . "\n";
}
