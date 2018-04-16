<?php

/*
 * Proyecto: Complete Cargo
 * File: 
 * Programador: Ing. Fredy Hernández
 * Fecha: $date
 */
//Guardamos en variables los datos enviados
$user = filter_input(INPUT_POST, 'usuario');
$password = filter_input(INPUT_POST, 'password');
$sql = "SELECT usuario, password FROM generador "
        . "WHERE usuario='$user' ";  //AND password='$password'


$query = $dbConnected->query($sql);
// print_r($query);
if ($query->num_rows > 0) {

    $row = $query->fetch_array(MYSQLI_ASSOC);
    //print_r($row);
    if ($password === md5($row['password'])) { //password_verify
        echo'<script type="text/javascript">
                        alert("Se logeo corectamente")</script>';
        $dbConnected->close();
    } else {
        /* echo '<script type="text/javascript">
          alert("Usuario o Passsword incorrectos") </script>'; */
        $incorrecto = true;
    }
} else {
    /* echo '<script type="text/javascript">
      alert("Usuario o Passsword incorrectos") </script>'; */
    $incorrecto = true;
}
?>

