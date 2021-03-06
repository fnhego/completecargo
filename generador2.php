<!doctype html>
<!--
Proyecto: Complete Cargo
File: generador2.php
Programador: Ing. Fredy Hernández
Fecha: $date
-->
<?php
session_start();
?>
<html lang="es">
    <head>
        <title>Datos Adicionales</title>
        <meta charset="utf-8">
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
        <div class="main-container">

            <?php
            if (isset($_POST['enviar'])) {
                //Guardamos en variables los datos enviados
                include_once '../htconfig/conexion.php';
                require_once './funciones.php';
                $user = $_SESSION['usuario'];
                $nombres = $_SESSION['nombres'];
                $apellidos = $_SESSION['apellidos'];
                $mail = $_SESSION['mail'];
                $depo = departamento(filter_input(INPUT_POST, 'departamentos'), $dbConnected);
                $muno = filter_input(INPUT_POST, 'municipios');
                $dir = filter_input(INPUT_POST, 'direccion');
                $tipdoc = filter_input(INPUT_POST, 'docu');
                $numdoc = filter_input(INPUT_POST, 'documento');
                $telefono = filter_input(INPUT_POST, 'tel');
                $dep_origen = departamento(filter_input(INPUT_POST, 'departamentosro'), $dbConnected);
                $ciudadorigen = filter_input(INPUT_POST, 'municipiosro');
                $dep_destino = departamento(filter_input(INPUT_POST, 'departamentosrd'), $dbConnected);
                $ciudaddestino = filter_input(INPUT_POST, 'municipiosrd');
                $alto = filter_input(INPUT_POST, 'alto');
                $largo = filter_input(INPUT_POST, 'largo');
                $ancho = filter_input(INPUT_POST, 'ancho');
                $peso = filter_input(INPUT_POST, 'peso');
                $condic = filter_input(INPUT_POST, 'condiciones');

                //Se hace la consulta para ver si el usuario existe
                $sql = "UPDATE generador SET  departamento='$depo', ciudad='$muno', "
                        . "direccion='$dir', tipodocumento='$tipdoc',numerodocumento='$numdoc', "
                        . "telefono='$telefono', dep_origen='$dep_origen',ciudadorigen='$ciudadorigen', "
                        . "dep_destino='$dep_destino',ciudaddestino='$ciudaddestino',"
                        . "altocarga='$alto',anchocarga='$ancho',largocarga='$largo', "
                        . "pesocarga='$peso',terminos='$condic' WHERE usuario='$user'";

                $query = $dbConnected->query($sql);
                if ($query) {
                    echo'<script type="text/javascript">
                        alert("Se guardo correctamente")</script>';
                    $dbConnected->close();
                } else {
                    echo '<script type="text/javascript">
                        alert("no pudo guardarse") </script>';
                }
                //Envio de correo de confirmación de registro
                $asunto = "Registro Exitoso";
                $destinatario = $mail;

                $comentario = "Señor(a) <b>" . $nombres . " " . $apellidos . "</b>, bienvenido "
                        . "a nuestra plataforma CompleteCargo, su registro ha sido exitoso. "
                        . " Su usuario es <b>" . $user . ".</b><br>";
                $cuerpo = $comentario . "\r\n<br><br>";
                $cuerpo .= "Cordialmente,\r\n<br><br>";
                $cuerpo .= "CompleteCargo<br>";
                $cuerpo .= "info@completecargo.co";
                //para el envío en formato HTML 
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset = utf-8; \r\n ";
                //dirección del remitente 
                $headers .= "From: info@completecargo.co\r\n";
                //dirección de respuesta, si queremos que sea distinta que la del remitente 
                $headers .= "Reply-To: info@completecargo.co\r\n";
                //ruta del mensaje desde origen a destino 
                $headers .= "Return-path: info@completecargo.co\r\n";
                //direcciones que recibián copia
                /*      $headers .= "Cc: Daniel.Plested@completecargo.co, "; */
                $headers .= "Cc: Fredy.Hernandez@completecargo.co\r\n ";

                if (mail($destinatario, $asunto, $cuerpo, $headers)) {
                    echo '<script type="text/javascript">
                        alert("El correo fue enviado")</script>';
                    session_destroy();
                    header("Refresh: 0; URL = login.php");
                } else {
                    echo '<script type="text/javascript">
                        alert("Error, no se pudo enviar el correo")</script>';
                }
            } else {
                include_once 'nav-bar.php';
                ?>
                <div class="body-container wrapper">
                    <div class="form-container">
                        <div id="formulario">
                            <div class="form-group">
                                <h2>Datos Adicionales</h2> 
                            </div>
                            <br>
                            <form action="" method="post">    
                                <div class="form-group"> <!-- -->
                                    <div>
                                        <label for="departamentos" class="control-label">Departamento</label> 
                                        <select class="form-control" name="departamentos" id="departamentos" required>
                                        </select>
                                    </div>
                                    <div>
                                        <label for="municipios" class="control-label">Ciudad</label> 
                                        <select class="form-control" name="municipios" id="municipios" required>
                                        </select>  
                                    </div>
                                </div>

                                <script>
                                    $(function () {
                                        // Lista de departamentos
                                        $.post('departamentos.php').done(function (respuesta)
                                        {
                                            $('#departamentos').html(respuesta);
                                        });

                                        // lista de departamentos
                                        $('#departamentos').change(function ()
                                        {
                                            var el_continente = $(this).val();

                                            // Lista de municipios
                                            $.post('municipios.php', {continente: el_continente}).done(function (respuesta)
                                            {
                                                $('#municipios').html(respuesta);
                                            });
                                        });

                                        // Lista de municipios
                                        $('#municipios').change(function ()
                                        {
                                            var municipio = $(this).children('option:selected').html();

                                        });

                                    })
                                </script> 

                                <div class="form-group"> <!-- -->
                                    <div>
                                        <label for="direccion" class="control-label">Dirección</label>
                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección de Origen" required >
                                    </div>
                                    <div>
                                        <label for="docu" class="control-label">Tipo de Documento</label>
                                        <select class="form-control" name="docu" id="docu" required>
                                            <option value="">Seleccione</option>
                                            <option value="CC">Cédula</option>
                                            <option value="NIT">Nit</option>
                                            <option value="CE">Cédula Extranjería</option>
                                            <option value="PA">Pasaporte</option>
                                        </select>   
                                    </div> 
                                </div>

                                <div class="form-group"> <!--  -->
                                    <div>
                                        <label for="documento" class="control-label">Número de Documento</label>
                                        <input type="text" class="form-control" id="documento" 
                                               name="documento" placeholder="Número de Documento" required>
                                    </div>
                                    <div>
                                        <label for="tel" class="control-label">Teléfono</label>
                                        <input type="tel" class="form-control" id="tel" name="tel" 
                                               placeholder="Teléfono" required>
                                    </div>
                                </div>   

                                <div class="form-group"> <!--Rutas más Utilizadas -->
                                    <div>
                                        <label for="rutas" class="control-label">Ruta más Utilizadas:</label>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="form-group"> <!-- -->
                                    <div>
                                        <label for="departamentosro" class="control-label">Departamento Origen</label> 
                                        <select class="form-control" name="departamentosro" id="departamentosro" >
                                        </select>
                                    </div>
                                    <div>
                                        <label for="municipiosro" class="control-label">Ciudad Origen</label> 
                                        <select class="form-control" name="municipiosro" id="municipiosro" >
                                        </select>  
                                    </div>
                                </div>

                                <script>
                                    $(function () {
                                        // Lista de departamentos
                                        $.post('departamentos.php').done(function (respuesta)
                                        {
                                            $('#departamentosro').html(respuesta);
                                        });

                                        // lista de departamentos
                                        $('#departamentosro').change(function ()
                                        {
                                            var el_continente = $(this).val();

                                            // Lista de municipios
                                            $.post('municipios.php', {continente: el_continente}).done(function (respuesta)
                                            {
                                                $('#municipiosro').html(respuesta);
                                            });
                                        });

                                        // Lista de municipios
                                        $('#municipiosro').change(function ()
                                        {
                                            var municipio = $(this).children('option:selected').html();

                                        });

                                    })
                                </script>
                                <div class="form-group"> <!-- -->
                                    <div>
                                        <label for="departamentord" class="control-label">Departamento Destino</label> 
                                        <select class="form-control" name="departamentosrd" id="departamentosrd" >
                                        </select>
                                    </div>
                                    <div>
                                        <label for="municipiosrd" class="control-label">Ciudad Destino</label> 
                                        <select class="form-control" name="municipiosrd" id="municipiosrd" >
                                        </select>  
                                    </div>
                                </div>

                                <script>
                                    $(function () {
                                        // Lista de departamentos
                                        $.post('departamentos.php').done(function (respuesta)
                                        {
                                            $('#departamentosrd').html(respuesta);
                                        });

                                        // lista de departamentos
                                        $('#departamentosrd').change(function ()
                                        {
                                            var el_continente = $(this).val();

                                            // Lista de municipios
                                            $.post('municipios.php', {continente: el_continente}).done(function (respuesta)
                                            {
                                                $('#municipiosrd').html(respuesta);
                                            });
                                        });

                                        // Lista de municipios
                                        $('#municipiosrd').change(function ()
                                        {
                                            var municipio = $(this).children('option:selected').html();

                                        });

                                    })
                                </script>
                                <div class="form-group"> <!--Rutas más Utilizadas -->
                                    <div>
                                        <label for="tamaño" class="control-label">Tamaño Convencional de los Envios</label>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="form-group"> <!--departamento y municipios -->
                                    <div>
                                        <label for="dimensiones" class="control-label">Dimensiones:</label>
                                    </div>
                                    <div>
                                    </div>
                                </div> 
                                <div class="form-group"> <!--  -->
                                    <div>
                                        <div class="col-xs-12 col-sm-5 col-md-2 col-lg-2">
                                            <label for="alto" class="control-label">Alto en cm</label>
                                            <input type="text" class="form-control" id="alto" name="alto" 
                                                   placeholder="Alto" style="width:35%" >
                                        </div>
                                        <div class="col-xs-12 col-sm-5 col-md-2 col-lg-2">
                                            <label for="ancho" class="control-label">Ancho en cm</label>
                                            <input type="text" class="form-control" id="ancho" name="ancho" 
                                                   placeholder="Ancho" style="width:35%" >
                                        </div>
                                    </div>

                                    <br>
                                    <div>
                                        <div class="col-xs-12 col-sm-5 col-md-2 col-lg-2">
                                            <label for="largo" class="control-label">Largo en cm</label>
                                            <input type="text" class="form-control" id="largo" name="largo" 
                                                   placeholder="Largo" style="width:35%"  >
                                        </div>
                                        <div class="col-xs-12 col-sm-5 col-md-2 col-lg-2">
                                            <label for="peso" class="control-label">Peso en kg</label>
                                            <select class="form-control" name="peso" id="peso" style="width:50%">
                                                <option value="">Seleccione</option>
                                                <option value="1-100">1-100</option>
                                                <option value="101-300">101-300</option>
                                                <option value="301-600">301-600</option>
                                                <option value="601-1000">601-1000</option>
                                                <option value="1001-3000">1001-3000</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group"> <!-- nombres -->
                                    <div>
                                        <label for="condiciones" class="control-label">Acepto Términos y Condiciones</label>
                                        &nbsp;&nbsp;&nbsp;
                                        <input   type="checkbox" id="condiciones" name="condiciones" required >
                                    </div>
                                    <div>
                                    </div>
                                </div> 

                                <div class="form-group"> <!--  -->
                                    <button type="submit" value="enviar" name="enviar" id="enviar" class="btn btn-primary">ENVIAR</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <?php include_once 'footer.php'; ?>
                </div>
                <?php
            }
            ?>
        </div>
    </body>
</html>
