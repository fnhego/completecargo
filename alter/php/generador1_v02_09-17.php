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
            <link href="css/estilos.css" rel="stylesheet">
            <link href="css/bootstrap.min.css" rel="stylesheet">

            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script src="functions.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


        </head>

        <body>
            <?php
            if (isset($_POST['enviar'])) { //and (($_POST['tip'] === "1") or !empty($_POST['empresa']))) {
                session_start();
                include_once 'conexion2.php';
                //Guardamos en variables los datos enviados
                $tip = filter_input(INPUT_POST, 'tipo');
                $nombre = filter_input(INPUT_POST, 'nombres');
                $apellido = filter_input(INPUT_POST, 'apellidos');
                $celular = filter_input(INPUT_POST, 'celular');
                $mail = filter_input(INPUT_POST, 'email');
                $empre = filter_input(INPUT_POST, 'empresa');
                //$depo = filter_input(INPUT_POST, 'departamentos');
                //$muno = filter_input(INPUT_POST, 'municipio');
                $user = filter_input(INPUT_POST, 'usuario');
                $pass = filter_input(INPUT_POST, 'password');
                $cfmPass = filter_input(INPUT_POST, 'cfmPassword');
                $_SESSION['usuario'] = $user;

                //Se hace la consulta para ver si el usuario existe
                $sql = "SELECT usuario FROM generador "
                        . "WHERE usuario='$user'";

                include_once 'checkuser.php';
                if (!$userAlreadyExist) {
                    $sql = "INSERT INTO generador (empresa_persona,nombres,apellidos, "
                            . "empresa,correo,celular,usuario,password) VALUES( "
                            . "'$tip','$nombre','$apellido','$empre','$mail', "
                            . "'$celular','$user','$pass')";

                    $query = $dbConnected->query($sql);
                    if ($query) {
                        echo'<script type="text/javascript">
                        alert("Se guardo correctamente")</script>';
                        $dbConnected->close();
                        header("Refresh: 0; URL = generador2.php");
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
                    <h2>Registro Generador</h2>
                    <form action="" method="post">

                        <div class="form-group"> <!-- -->
                            <label for="tipo" class="control-label">¿Empresa o Persona?</label>
                            <select class="form-control" name="tipo" id="tipo" required="required">
                                <option value="">Seleccione</option>
                                <option value="1" <?php
                                if (isset($tip)) {
                                    if ($tip == "1") {
                                        echo "selected";
                                    }
                                }
                                ?>
                                        >Empresa</option>
                                <option value="2" <?php
                                if (isset($tip)) {
                                    if ($tip == "2") {
                                        echo "selected";
                                    }
                                }
                                ?>
                                        >Persona</option>
                            </select>
                        </div>

                        <div class="form-group"> <!-- nombres -->
                            <label for="nombres" class="control-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres"
                                   value="<?php
                                   if (isset($nombre)) {
                                       echo $nombre;
                                   }
                                   ?>"
                                   name="nombres" placeholder="Nombres" required="required">
                        </div>

                        <div class="form-group"> <!-- apellidos -->
                            <label for="apellidos" class="control-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" 
                                   value="<?php
                                   if (isset($apellido)) {
                                       echo $apellido;
                                   }
                                   ?>"
                                   name="apellidos" placeholder="Apellidos" required="required">
                        </div>
                        <div class="form-group"> <!--  -->
                            <label for="cel" class="control-label">Celular</label>
                            <input type="tel" class="form-control" id="celular" 
                                   value="<?php
                                   if (isset($celular)) {
                                       echo $celular;
                                   }
                                   ?>"
                                   name="celular" placeholder="Celular" required="required">
                        </div>

                        <div class="form-group"> <!--  -->
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" id="email" 
                                   value="<?php
                                   if (isset($mail)) {
                                       echo $mail;
                                   }
                                   ?>"
                                   name="email" placeholder="Email" required="required" required="required">
                        </div>




                        <div class="form-group" id="capa"> <!--  -->

                            <script>
                                var capa = document.getElementById("capa"),
                                        tipo = document.getElementById("tipo");

                                function colocaEmpresa() {
                                    if (tipo.value === "1") {

                                        capa.innerHTML = '  <label for="empresa" class="control - label" style="color:black; -webkit-tap-highlight-color: rgba(0,0,0,0); font-weight: 700;margin-left:0px; padding:0px; font-size:100%">Empresa</label> <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Nombre de la empresa" required>';

                                        // tipo.setCustomValidity("Debe colocar el nombre de la Empresa");
                                    } else
                                        capa.innerHTML = '';
                                }
                                tipo.onfocus = colocaEmpresa;
                                tipo.onchange = colocaEmpresa;
                            </script>
                        </div>
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

                            <!-- <form id="formCheckPassword"> -->
                            <label for="pass" class="control-label">Contraseña</label>
                            <input type="password" class="form-control" name="password" 
                                   value="<?php
                                   if (isset($pass)) {
                                       echo $pass;
                                   }
                                   ?>"
                                   id="password" placeholder="Contraseña"  required/>
                            <br>
                            <label for="cpass" class="control-label" >Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="cfmPassword" 
                                   value="<?php
                                   if (isset($cfmPass)) {
                                       echo $cfmPass;
                                   }
                                   ?>"
                                   id="cfmPassword" placeholder="Contraseña"  required />
                            <!-- </form> -->
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
                                //confirm_password.onchange = validatePassword;
                                confirm_password.onkeyup = validatePassword;
                                //password.onkeyup = validateLPassword;
                            </script>

                        </div>

                        <div class="form-group"> <!--  -->
                            <button type="submit" value="enviar" name="enviar" id="enviar"class="btn btn-primary">ENVIAR</button>
                        </div>



                    </form>
                </div>
                <?php
//                }
                ?>
            </div>
        </body>

    </html>

