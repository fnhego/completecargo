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
   $userAlreadyExist = true;
    } else {
        $userAlreadyExist = false;
    }
?>

