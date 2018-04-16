<!DOCTYPE html>
<!--
Proyecto: Complete Cargo
File: 
Programador: Ing. Fredy Hernández
Fecha: $date
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        if (isset($_SESSION['usuario'])) {
            echo $_SESSION['id_conductor'] . " " . $_SESSION['usuario'];
            echo '<br>';
        } else {
            echo "No hay datos de Sesion";
        }
        ?>



    </body>
</html>
