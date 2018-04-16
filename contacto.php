<!DOCTYPE html>
<!--
Proyecto: Complete Cargo
File: contacto.php
Programador: Ing. Fredy Hernández
Fecha: $date
-->
<html lang="es">
    <head>
        <title>Formulario de Contacto</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='img/complete_logo.ico' rel='shortcut icon' type='image/x-icon'>

        <!-- Bootstrap -->
        <link href="css/normalize.css" rel="stylesheet" type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilo.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery-3.2.1.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>

    </head>
    <body>
        <div class="main-container">
            <?php
            if (isset($_POST['enviar'])) {
                $nombres = filter_input(INPUT_POST, 'nombres');
                $apellidos = filter_input(INPUT_POST, 'apellidos');
                $email = filter_input(INPUT_POST, 'email');
                $tel = filter_input(INPUT_POST, 'tel');
                $asunto = utf8_decode(filter_input(INPUT_POST, 'asunto'));
                $comentario = filter_input(INPUT_POST, 'comentarios');

                $destinatario = "Fredy.Hernandez@completecargo.co"; //info@completecargo.co

                $cuerpo = $comentario . "\r\n<br><br>";
                $cuerpo .= $nombres . " " . $apellidos . "<br>";
                $cuerpo .= $email . "<br>";
                $cuerpo .= "Tel. " . $tel;

                //para el envío en formato HTML 
                $headers = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=utf-8; \r\n ";
                //dirección del remitente 
                $headers .= "From: " . $nombres . " " . $apellidos . "<" . $email. ">\r\n";
                //dirección de respuesta, si queremos que sea distinta que la del remitente 
                $headers .= "Reply-To: " . $email . "\r\n";
                //ruta del mensaje desde origen a destino 
                $headers .= "Return-path: info@completecargo.co\r\n";
                //direcciones que recibián copia
                /*      $headers .= "Cc: Daniel.Plested@completecargo.co,"; */
               // $headers .= "Cc: Fredy.Hernandez@completecargo.co\r\n ";
                
                if (mail($destinatario, $asunto, $cuerpo, $headers)) {
                    echo '<script type="text/javascript">
                        alert("Mensaje enviado")</script>';
                    header("Refresh: 0; URL = index.php");
                } else {
                    echo '<script type="text/javascript">
                        alert("Error, no se pudo enviar")</script>';
                }
            } else {

                include_once 'nav-bar.php';
                ?>
                <div class="body-container wrapper">
                    <div class="form-container">
                        <div id="formulario">
                            <div class="form-group">
                                <h2>Contáctenos</h2>
                            </div>
                            <br>
                            <form action="" method="post" >
                                <div class="form-group">
                                    <div>
                                        <label form="nombres" class="control-label">Nombres:</label><br>
                                        <input name="nombres" type="text" class="form-control"
                                               id="nombres" placeholder="Nombres" required>
                                    </div>
                                    <div>
                                        <label class="control-label">Apellidos:</label><br>
                                        <input name="apellidos" type="text" class="form-control"
                                               id="apellidos" placeholder="Apellidos" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <div>
                                        <label class="control-label">E-Mail:</label><br>
                                        <input name="email" type="email" class="form-control"
                                               id="email" placeholder="E-mail" required>
                                    </div>
                                    <div>
                                        <label class="control-label">Teléfono:</label><br>
                                        <input name="tel" type="tel" class="form-control"
                                               id="tel" placeholder="Teléfono" required>
                                    </div>
                                </div>
                               
                                <div class="form-group">
                                    <div>
                                        <label class="control-label">Asunto:</label><br>
                                        <input name="asunto" type="text" class="form-control"
                                               id="asunto" placeholder="Asunto" required>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label form="comentarios" class="control-label">Mensaje:</label><br>
                                    <textarea type="text" name="comentarios" id="comentarios"
                                              class="form-control" rows="7" required></textarea>
                                </div>
                                <br>
                                <br>
                                <div class="form-group">
                                    <input type="submit" name="enviar" value="Enviar" class="btn btn-primary" >
                                </div>
                        </div>
                    </div>
                    <?php
                    include_once 'footer.php';
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </body>
</html>
