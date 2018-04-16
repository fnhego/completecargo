<?php

/*
 * Proyecto: Complete Cargo
 * File: checkemail.php
 * Programador: Ing. Fredy Hernández
 * Fecha: 2017-10-09
 */

$query = $dbConnected->query($sql);
//print_r($query);
if ($query->num_rows > 0) {

    echo'<script type="text/javascript">
            alert("Usuario Invalido, ya esta registrado")</script>';
        $emailAlreadyExist = true;
        
    } else {
        /* echo '<script type="text/javascript">
          alert("Usuario o Passsword incorrectos") </script>'; */
        $emailAlreadyExist = false;
    }

?>

