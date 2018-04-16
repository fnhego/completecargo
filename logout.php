<?php

/* 
 * Proyecto: Complete Cargo
 * File: 
 * Programador: Ing. Fredy Hernández
 * Fecha: $date
 */
@session_start();
session_destroy();
header("Location: index.php");
?>