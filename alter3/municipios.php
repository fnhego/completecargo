<?php

include 'conexion2.php';

$el_continente = $_POST['continente'];

$query = $dbConnected->query("SELECT * FROM municipios WHERE departamento_id = "
        . "$el_continente and estado='1' ORDER BY municipio" );

echo '<option value="">Seleccione</option>';

while ( $row = $query->fetch_assoc() )
{
	echo '<option value="' . $row['municipio'] .'">' . $row['municipio'] . '</option>' . "\n";
}
