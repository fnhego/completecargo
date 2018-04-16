<!DOCTYPE html>
<!--
Proyecto: Complete Cargo
File: 
Programador: Ing. Fredy Hernández
Fecha: $date
-->
<html>

    <head>
        <title>Iniciar Sesión</title>
        <meta charset = "utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='img/complete_logo.ico' rel='shortcut icon' type='image/x-icon'>

        <!-- Bootstrap -->
        <link href="css/normalize.css" rel="stylesheet" type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        if (isset($_POST['enviar'])) {
            session_start();
            include_once '../htconfig/conexion.php';
            include_once 'checklogin.php';
            if (!$incorrecto) {
                header("Refresh: 0; URL = publica.php"); //publica
            }
        }

        include_once 'nav-bar.php';
        ?>
        <div class="body-container wrapper">
            <div class="form-container">
                <div id="formulario">
                    <div class="form-group">
                        <h2>Iniciar Sesión</h2>
                    </div>
                    <br>
                    <form action="" method="post" >
                        <div class="form-group">
                            <div>
                                <br>
                                <label class="control-label">Usuario:</label><br>
                                <input name="usuario" type="text" class="form-control"
                                       value="<?php
                                           if (isset($user)) {
                                               echo $user;
                                           }
                                           ?>"
                                       id="usuario" required>
                                <br><br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label class="control-label">Contraseña:</label><br>
                                <input name="password" type="password" class="form-control" id="password" required>
                                <?php
                                if (isset($incorrecto)) {
                                    echo "<br>Usuario o Password incorrecto";
                                }
                                ?>
                                <br><br>
                            </div>
                        </div>
                        <hr />
                        <div class="form-group">
                            <div>
                                <input type="submit" name="enviar" value="Enviar" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            include_once 'footer.php';
            ?>
        </div>
    </body>
</html>
