<?php

/*
 * Proyecto: Complete Cargo
 * File: 
 * Programador: Ing. Fredy Hernández
 * Fecha: $date
 */

$query = $dbConnected->query($sql);
// print_r($query);
if ($query->num_rows > 0) {

    /*echo'<script type="text/javascript">
            alert("Usuario Invalido, ya esta registrado")</script>';*/
        $userAlreadyExist = true;
        
    } else {
        /* echo '<script type="text/javascript">
          alert("Usuario o Passsword incorrectos") </script>'; */
        $userAlreadyExist = false;
    }

?>

