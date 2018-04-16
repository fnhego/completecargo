<!doctype html>
<html>
    <html lang="es">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>Formulario de Contacto - Script Personal</title>

            <!-- Bootstrap -->
            <link href="css/estilos.css" rel="stylesheet">
            <link href="css/bootstrap.min.css" rel="stylesheet">


            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script src="functions.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        </head> 
        <body>

            <?php
            //print_r($_POST);
            //Verifica si hay datos almacenados
            if (isset($_POST['enviar'])) { //&& !empty($_POST['nombres']) && ($_POST['password'] == $_POST['cfmPassword'])) {
                //echo "Almacenando datos";
                session_start();
                include_once 'conexion2.php';
                //Guardamos en variables los datos enviados
                $nombre = filter_input(INPUT_POST, 'nombres'); //"fredy";//
                $apellido = filter_input(INPUT_POST, 'apellidos'); //"Hernandez"; //
                $celular = filter_input(INPUT_POST, 'celular'); //"23211112";//
                $mail = filter_input(INPUT_POST, 'email'); //"sjdsjd";
                //$empre = $_POST['empresa'];
                $depo = filter_input(INPUT_POST, 'departamentos'); //"Tolima";
                $muno = filter_input(INPUT_POST, 'municipio'); //"Espinal";
                $user = filter_input(INPUT_POST, 'usuario'); //"fnhego";//
                $pass = filter_input(INPUT_POST, 'password'); //"123";//
                $cfmPass = filter_input(INPUT_POST, 'cfmPassword');
                $_SESSION['usuario'] = $user;

                //Se hace la consulta para ver si el usuario existe
                $sql = "SELECT usuario FROM conductor "
                        . "WHERE usuario='$user'";

                include_once 'checkuser.php';
                if (!$userAlreadyExist) {
                    $sql = "INSERT INTO conductor (nombres, apellidos, correo, celular, "
                            . " departamento, ciudad, usuario, password) VALUES('$nombre', "
                            . "'$apellido','$mail','$celular','$depo','$muno','$user','$pass')";

                    $query = $dbConnected->query($sql);
                    if ($query) {
                        echo '<script type="text/javascript">
                        alert("Cuenta creada Exitosamente") </script>';
                        $dbConnected->close();
                        header("Refresh: 0; URL = conductor2.php"); //conductor2
                    } else {
                        echo '<script type="text/javascript">
                        alert("no pudo guardarse") </script>';
                    }
                }
            } //else {
            ?>
            <div class="header-container wrapper clearfix">
                <div class="logo-container wrapper clearfix">
                    <img class="logo" src="img/complete_logo_119x79.png" width="159" height="116">
                </div>
            </div>
            <div class="form-container">
                <div id="formulario">
                    <h2>Registro de Conductor</h2>
                    <form name="formulario" action="" method="POST">
                        <div class="form-group"> <!-- nombres -->
                            <label for="nombres" class="control-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres"
                                   value="<?php
                                   if (isset($nombre)) {
                                       echo $nombre;
                                   }
                                   ?>"
                                   name="nombres" placeholder="Nombres" required>                                  
                        </div> 

                        <div class="form-group"> <!-- apellidos -->
                            <label for="apellidos" class="control-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos"
                                   value="<?php
                                   if (isset($apellido)) {
                                       echo $apellido;
                                   }
                                   ?>"
                                   name="apellidos" placeholder="Apellidos" required>
                        </div> 
                        <div class="form-group"> <!--  -->
                            <label for="cel" class="control-label">Celular</label>
                            <input type="tel" class="form-control" id="celular"
                                   value="<?php
                                   if (isset($celular)) {
                                       echo $celular;
                                   }
                                   ?>"
                                   name="celular" placeholder="Celular" required>
                        </div> 

                        <div class="form-group"> <!--  -->
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" id="email" 
                                   value="<?php
                                   if (isset($mail)) {
                                       echo $mail;
                                   }
                                   ?>"
                                   name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group"> <!-- -->
                            <label for="departamento" class="control-label">Departamento</label> 
                            <select class="form-control" name="departamentos" 
                                    id="departamentos" required>
                            </select>
                        </div> 
                        <div class="form-group"> <!-- -->
                            <label for="municipio" class="control-label">Ciudad de Mayor Permanencia</label> 
                            <select class="form-control" name="municipio" 
                                    id="municipio" required>
                            </select>  
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
                                        $('#municipio').html(respuesta);
                                    });
                                });

                                // Lista de municipios
                                $('#municipio').change(function ()
                                {
                                    var municipio = $(this).children('option:selected').html();
                                    //alert( 'Lista de Municipios de ' + municipio );
                                });

                            })
                        </script> 

                        <br>
                        <div class="form-group"> <!--  -->
                            <label for="usuario" class="control-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario"
                                   value="<?php
                                   if (isset($user)) {
                                       echo $user;
                                   }
                                   ?>"
                                   name="usuario" placeholder="Usuario" required>
                           <?php
                            if (isset($userAlreadyExist)) {
                                echo "El usuario ya existe";
                            }
                            ?>
                        </div> 

                        <div class="form-group"> <!--  -->

                            <div>
                                <label for="pass" class="control-label">Contraseña</label>
                                <input type="password" class="form-control" name="password"
                                       value="<?php
                                       if (isset($pass)) {
                                           echo $pass;
                                       }
                                       ?>"
                                       id="password" placeholder="contraseña" required>
                                <label for="cpass" class="control-label" >Confirmar Contraseña</label>
                                <input type="password" class="form-control"
                                       value="<?php
                                       if (isset($cfmPass)) {
                                           echo $cfmPass;
                                       }
                                       ?>"
                                       name="cfmPassword" id="cfmPassword" placeholder="contraseña" required>
                            </div>
                            <script>
                                var password = document.getElementById("password");
                                confirm_password = document.getElementById("cfmPassword");

                                function validateLPassword() {

                                    if (password.value.length < 6) {
                                        alert("La Contraseña debe ser mínimo de 6 caracteres");
                                        //password.setCustomValidity("La Contraseña debe ser mínimo de 6 caracteres");
                                        return false;
                                    }
                                }
                                function validatePassword() {
                                    if (password.value !== confirm_password.value) {
                                        confirm_password.setCustomValidity("Las Contraseñas no son iguales");
                                        return false;

                                    } else {
                                        confirm_password.setCustomValidity('');
                                        return true;
                                    }
                                }
                                password.onchange = validateLPassword;
                                confirm_password.onkeyup = validatePassword;
                                
                            </script>
                        </div>                               
                        <div class="form-group"> <!--  -->
                            <button type="submit" id="subir" name="enviar" value="enviar" class="btn btn-primary">ENVIAR</button>

                        </div>
                    </form>
                </div>
                <?php
                //print_r($_POST);
                //  }
                ?>
            </div>
        </body>
    </html>

