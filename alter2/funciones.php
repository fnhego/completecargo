<?php

/*
 * Proyecto: Complete Cargo
 * File: funciones.php
 * Programador: Ing. Fredy Hernández
 * Fecha: $date

 * Biblioteca de funciones de manejo de datos.
 */

//Función que devuelve el departamento
function departamento($id_departamento,$dbConnected) {
    include_once 'conexion2.php';
    $query = $dbConnected->query("SELECT departamento FROM departamentos WHERE "
            . "id_departamento='$id_departamento'");
    $row = $query->fetch_assoc();
    return $row['departamento'];
    
}

?>
