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
            if (isset($_POST['enviar'])) {
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
                //Si el usuario no existe, se almacena en la tabla generador
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
                        header("Refresh: 3; URL = generador2.php");
                    } else {
                        echo '<script type="text/javascript">
                        alert("no pudo guardarse") </script>';
                    }
                }
            } 
            ?>
            <header><h1>Registro Generador</h1></header>

            <div id="formulario">
                <form action="" method="post">

                    <div class="form-group"> <!-- -->
                        <label for="tipo" class="control-label">¿Empresa o Persona?</label> 
                        <select class="form-control" name="tipo" id="tipo" required>
                            <option value="">Seleccione</option>
                            <option value="1"  <?php
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
                        <input type="text" class="form-control" id="celular"
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

                    <div class="form-group" id="capa"> <!--  -->
                        <script>
                            var capa = document.getElementById("capa"),
                                    tipo = document.getElementById("tipo");

                            function colocaEmpresa() {
                                if (tipo.value === "1") {

                                    capa.innerHTML = '<label for="empresa" class="control - label"\n\
                                    style="color:black; -webkit-tap-highlight-color: rgba(0,0,0,0); \n\
                                    font-weight: 700;margin-left:0px; padding:0px; font-size:100%">\n\
                                    Empresa</label> <input type="text" class="form-control" id="empresa"\n\
                                     name="empresa" placeholder="Nombre de la empresa" required>';
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
                               name="usuario" placeholder="usuario" required>
                               <?php
                               if (isset($userAlreadyExist)) {
                                   echo "El usuario ya existe";
                               }
                               ?>
                    </div> 

                    <div class="form-group"> <!--  -->
                        <label for="pass" class="control-label">Contraseña</label>
                        <input type="password" class="form-control" name="password" 
                               value="<?php
                               if (isset($pass)) {
                                   echo $pass;
                               }
                               ?>"
                               required id="password" placeholder="usuario" required/>
                        <br>
                        <label for="cpass" class="control-label" required>Confirmar Contraseña</label>
                        <input type="password" class="form-control" name="cfmPassword"
                               value="<?php
                               if (isset($cfmPass)) {
                                   echo $cfmPass;
                               }
                               ?>"
                               id="cfmPassword" placeholder="contraseña" required />
                        <script></script>

                    </div>               
                    <br>
                    <div class="form-group"> <!--  -->
                        <button type="submit" value="enviar" name="enviar" id="enviar"class="btn btn-primary">ENVIAR</button>
                    </div>
                </form>
            </div>
        </body>

    </html>

