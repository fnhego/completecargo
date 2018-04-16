<?php

$db = array(
    'hostname' => 'localhost',
    'username' => 'cliente',
    'password' => '',
    'database' => 'complete'
); {
    $dbSuccess = false;
    $dbConnected = mysqli_connect($db['hostname'], $db['username'], $db['password'], $db['database']);

    if (!$dbConnected) {
        die("Error de conexion: " . mysqli_connect_error());
    } else {
        $dbSuccess = true;
        //echo "Conexion Exitosa".'<br>';
    }
    //	END	Secure Connection Script
    mysqli_query($dbConnected, "SET NAMES 'utf8'"); //Realmente importante para español, por acentos y ñ
}
?>