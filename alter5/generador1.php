<!doctype html>
<!--
Proyecto: Complete Cargo
File: generador1.php
Programador: Ing. Fredy Hernández
Fecha: $date
-->
<html lang="es">
    <head>
        <title>Registro Generador</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='img/complete_logo.ico' rel='shortcut icon' type='image/x-icon'>

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
            include_once '../htconfig/conexion.php';
            //Guardamos en variables los datos enviados
            $tip = filter_input(INPUT_POST, 'tipo');
            $nombre = filter_input(INPUT_POST, 'nombres');
            $apellido = filter_input(INPUT_POST, 'apellidos');
            $celular = filter_input(INPUT_POST, 'celular');
            $mail = filter_input(INPUT_POST, 'email');
            $empre = filter_input(INPUT_POST, 'empresa');
            $tipo_negocio = filter_input(INPUT_POST, 'tipo_negocio');
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
                        . "empresa,correo,celular,tipo_negocio,usuario,password) VALUES( "
                        . "'$tip','$nombre','$apellido','$empre','$mail', "
                        . "'$celular','$tipo_negocio','$user','$pass')";

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
        } 

        include_once 'nav-bar2.php';
        ?>
        <div class="body-container wrapper">
            <div class="form-container">
                <div id="formulario">
                    <div class="form-group">
                        <h2>Registro Generador</h2>
                    </div>
                    <br>
                    <form action="" method="post">
                        <div class="form-group"> <!-- -->
                            <div>
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
                            <div>
                                <label for="nombres" class="control-label">Nombres</label>
                                <input type="text" class="form-control" id="nombres"
                                       value="<?php
                                       if (isset($nombre)) {
                                           echo $nombre;
                                       }
                                       ?>"
                                       name="nombres" placeholder="Nombres" required="required">
                            </div>
                        </div>
                        <br>
                        <div class="form-group"> <!-- nombres -->
                            <div>
                                <label for="apellidos" class="control-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellidos" 
                                       value="<?php
                                       if (isset($apellido)) {
                                           echo $apellido;
                                       }
                                       ?>"
                                       name="apellidos" placeholder="Apellidos" required="required"> 
                            </div>
                            <div>
                                <label for="cel" class="control-label">Celular</label>
                                <input type="tel" class="form-control" id="celular" 
                                       value="<?php
                                       if (isset($celular)) {
                                           echo $celular;
                                       }
                                       ?>"
                                       name="celular" placeholder="Celular" required="required">
                            </div>
                        </div>
                        <br>
                        <div class="form-group"> <!-- apellidos -->
                            <div>
                                <label for="email" class="control-label">Email</label>
                                <input type="email" class="form-control" id="email" 
                                       value="<?php
                                       if (isset($mail)) {
                                           echo $mail;
                                       }
                                       ?>"
                                       name="email" placeholder="Email" required="required" required="required">
                            </div>
                            <div id="capa">
                                <script>
                                    var capa = document.getElementById("capa"),
                                            tipo = document.getElementById("tipo");

                                    function colocaEmpresa() {
                                        if (tipo.value === "1") {

                                            capa.innerHTML = '<label for="empresa" class="control - label" ' +
                                                    'style="color:black; -webkit-tap-highlight-color: rgba(0,0,0,0);' +
                                                    'font-weight: 700;margin-left:0px; padding:0px; font-size:100%">' +
                                                    'Empresa</label> <input type="text" class="form-control" id="empresa"' +
                                                    'name="empresa" placeholder="Nombre de la empresa" required>';

                                        } else
                                            capa.innerHTML = '';
                                    }
                                    tipo.onfocus = colocaEmpresa;
                                    tipo.onchange = colocaEmpresa;
                                </script>
                            </div>
                        </div>

                        <br>

                        <div class="form-group"> <!-- nombres -->
                            <div>
                                <label for="tipo_negocio" class="control-label">Tipo de Negocio</label>
                                <input type="text" class="form-control" id="tipo_negocio" 
                                       value="<?php
                                       if (isset($tipo_negocio)) {
                                           echo $tipo_negocio;
                                       }
                                       ?>"
                                       name="tipo_negocio" placeholder="Tipo de Negocio"> 
                            </div>
                            <div>
                            </div>
                        </div>
                        <br>
                        
                        
                        <div class="form-group"> <!--  -->
                            <div>
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
                        </div>
                        <br>
                        <div class="form-group"> <!--  -->
                            <div>
                                <!-- <form id="formCheckPassword"> -->
                                <label for="password" class="control-label">Contraseña</label>
                                <input type="password" class="form-control" name="password" 
                                       value="<?php
                                       if (isset($pass)) {
                                           echo $pass;
                                       }
                                       ?>"
                                       id="password" placeholder="Contraseña"  required/>
                                <br>

                            </div>
                            <div>
                                <label form="cfmPassword" class="control-label" >Confirmar Contraseña</label>
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

                        </div>
                        <br>
                        <div class="form-group"> <!--  -->
                            <button type="submit" value="enviar" name="enviar" id="enviar" class="btn btn-primary">ENVIAR</button>
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

