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

        include_once 'nav-bar2.php';
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
            <div class="footer-container">
                <footer class="footer ">
                    <div class="footer-dv" >
                        <h2>Términos y Condiciones</h2>
                        <ul class="lista">
                            <li><a href="#">Conductores</a></li>
                            <li><a href="#">Generadores de Carga</a></li>
                        </ul>
                        <h2>Preguntas Frecuentes</h2>
                        <ul class="lista">
                            <li><a href="#">FAQ</a></li>
                        </ul>
                        <h2>Complete Cargo App   <img id="google" src="img/googleplay.png"></h2>
                    </div>
                    <div class="footer-dv">
                        <h2>Institucional</h2>
                        <ul class="lista">
                            <li><a href="#">Políticas de Tratamiento de Datos Personales</a></li>
                            <li><a href="#">Quienes Somos</a></li>
                            <li><a href="#">Objetivos Corporativos</a></li>
                        </ul>
                        <h2>Contáctenos</h2>
                        <ul class="lista">
                            <li><a href="#">info@completecargo.co</a></li>
                            <li><a href="#">320 5438516 - 315 6509202</a></li>
                        </ul>
                    </div>
                    <div class="redes">
                        <a href="#"><img id="whataapp" src="img/whatsapp.png"><br/></a>
                        <a href="#"><img id="facebook" src="img/facebook.png"><br/></a>
                        <a href="https://www.youtube.com/embed/G4Kh-vW92lk"><img id="youtube" src="img/youtube.png"><br/></a>
                        <a href="#"><img id="twitter" src="img/twitter.png"><br/></a>
                        <a href="contacto.php"><img id="email" src="img/email.png"></a>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
