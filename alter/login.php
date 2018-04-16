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
        <!-- Bootstrap -->
            <link href="css/normalize.css" rel="stylesheet" type='text/css'>
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/estilos.css" rel="stylesheet">
            <script src="js/jquery-3.2.1.js"></script>
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <?php
        if (isset($_POST['enviar'])) {
            session_start();
            include_once 'conexion2.php';
            include_once 'checklogin.php';
            if (!$incorrecto) {
                header("Refresh: 0; URL = publica.html"); //publica
            }
        }
        ?>

        <div class="header-container wrapper clearfix">
            <div class="logo-container wrapper clearfix">
                <img class="logo" src="img/complete_logo_119x79.png" width="159" height="116">
            </div>
        </div>
        <div class="form-container">
            <div id="formulario">
                <div class="form-group">
                    <h2>Iniciar Sesión</h2>
                </div>
                <form action="" method="post" >
                    <div class="form-group">
                        <div>
                            <br>
                            <label class="control-label">Usuario:</label><br>
                            <input name="usuario" type="text" class="form-control" id="usuario" required>
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
    </body>
</html>
