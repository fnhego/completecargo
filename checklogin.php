<?php

/*
 * Proyecto: Complete Cargo
 * File: 
 * Programador: Ing. Fredy Hernández
 * Fecha: $date
 */
//Guardamos en variables los datos enviados
$user = filter_input(INPUT_POST, 'usuario');
$password = md5(filter_input(INPUT_POST, 'password'));
$sql = "SELECT * FROM generador "
        . "WHERE usuario='$user' ";  //AND password='$password'

$query = $dbConnected->query($sql);
// print_r($query);
if ($query->num_rows > 0) {

    $row = $query->fetch_array(MYSQLI_ASSOC);
    //print_r($row);
    if ($password === $row['password']) { //password_verify
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $user;
        
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
       //echo "Bienvenido! " . $_SESSION['username'];
        
       echo'<script type="text/javascript">
            alert("Inicio Sesion correctamente ")</script>';
        $incorrecto = false;
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

