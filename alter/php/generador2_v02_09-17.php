<?php ?>
<!doctype html>
<html>
    <html lang="es">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Formulario de Contacto - Script Personal</title>

            <!-- Bootstrap -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <link href="css/estilos.css" rel="stylesheet">

        </style>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="functions.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


    </head> 

    <body>

        <?php
        include_once 'conexion2.php';
        if (isset($_POST['enviar'])) {
            //Guardamos en variables los datos enviados
            session_start();
            $user = $_SESSION['usuario'];
            $depo = filter_input(INPUT_POST, 'departamentos');
            $muno = filter_input(INPUT_POST, 'municipios');
            $dir = filter_input(INPUT_POST, 'direccion');
            $tipdoc = filter_input(INPUT_POST, 'docu');
            $numdoc = filter_input(INPUT_POST, 'documento');
            $telefono = filter_input(INPUT_POST, 'tel');
            $condic = filter_input(INPUT_POST, 'condiciones');
            
            //Se hace la consulta para ver si el usuario existe
            $sql = "UPDATE generador SET  departamento='$depo', ciudad='$muno', "
                    . "direccion='$dir', tipodocumento='$tipdoc',numerodocumento='$numdoc', "
                    . "telefono='$telefono', terminos='$condic' WHERE usuario='$user'";  //

            $query = $dbConnected->query($sql);
            if ($query) {
                echo'<script type="text/javascript">
                        alert("Se guardo correctamente")</script>';
                $dbConnected->close();
                header("Refresh: 1; URL = login.html");
            } else {
                echo '<script type="text/javascript">
        alert("no pudo guardarse") </script>';
            }
        } else {
            ?>
        <div class="header-container wrapper clearfix">
                    <div class="logo-container wrapper clearfix">
                        <img class="logo" src="img/complete_logo_119x79.png" width="159" height="116">
                    </div>
                </div>
        <div class="form-container">
            <div id="formulario">
                <h2>Datos Adicionales</h2>
                <form action="" method="post">    
                    <div class="form-group"> <!-- -->
                        <label for="departamento" class="control-label">Departamento</label> 
                        <select class="form-control" name="departamentos" id="departamentos" required>
                        </select>
                    </div>

                    <div class="form-group"> <!-- -->
                        <label for="ciudad" class="control-label">Ciudad</label> 
                        <select class="form-control" name="municipios" id="municipios" required>
                        </select>  
                    </div>
                   
                    <script>

                        $(function () {

                            // Lista de deprtamentos
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

                    <div class="form-group"> <!--  -->
                        <label for="direcciono" class="control-label">Dirección</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección de Origen" required >
                    </div>   

                    <br>

                    <div class="form-group"> <!-- nombres -->
                        <label for="docu" class="control-label">Tipo de Documento</label>
                        <select class="form-control" name="docu" id="docu" required>
                            <option value="">Seleccione</option>
                            <option value="CC">Cédula</option>
                            <option value="NIT">Nit</option>
                            <option value="CE">Cédula Extranjería</option>
                            <option value="PA">Pasaporte</option>
                        </select>
                    </div> 

                    <div class="form-group"> <!-- apellidos -->
                        <label for="documento" class="control-label">Número de Documento</label>
                        <input type="text" class="form-control" id="documento" name="documento" placeholder="Número de Documento" required>
                    </div> 

                    <div class="form-group"> <!--  -->
                        <label for="tel" class="control-label">Teléfono</label>
                        <input type="tel" class="form-control" id="tel" name="tel" placeholder="Teléfono" required>
                    </div> 


                    <div class="form-group"> <!-- nombres -->
                        <label for="condi" class="control-label">Términos y condiciones</label>
                        <input   type="checkbox" id="condiciones" name="condiciones" required >
                    </div>  

                    <div class="form-group"> <!--  -->
                        <button type="submit" value="enviar" name="enviar" id="enviar" class="btn btn-primary">ENVIAR</button>
                    </div>

                </form>
            </div>
            <?php
        }
        ?>
            </div>
    </body>
</html>
