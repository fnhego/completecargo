<!DOCTYPE html>
<!--
Proyecto: Complete Cargo
File: conductor2.php
Programador: Ing. Fredy Hernández
Fecha: $date
-->
<html>
    <head>
        <title>Registro Conductor</title>
        <meta charset="utf-8">
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
        //Verifica si hay datos almacenados
        if (isset($_POST['enviar'])) {
            //echo "Almacenando datos";
            include_once '../htconfig/conexion.php';
            require_once './funciones.php';
            //Guardamos en variables los datos enviados
            $nombres = filter_input(INPUT_POST, 'nombres'); //"fredy";//
            $apellido = filter_input(INPUT_POST, 'apellidos'); //"Hernandez"; //
            $celular = filter_input(INPUT_POST, 'celular'); //"23211112";//
            $mail = filter_input(INPUT_POST, 'email'); //"sjdsjd";
            //$empre = $_POST['empresa'];
            $depo = departamento(filter_input(INPUT_POST, 'departamentos'),$dbConnected);
            $muno = filter_input(INPUT_POST, 'municipio'); //"Espinal";
            $user = filter_input(INPUT_POST, 'usuario'); //"fnhego";//
            $pass = filter_input(INPUT_POST, 'password'); //"123";//
            $cfmPass = filter_input(INPUT_POST, 'cfmPassword');
            $_SESSION['usuario'] = $user;
            $ruta = $_FILES['archivo']['tmp_name'];
            $archivo = $_FILES['archivo'];
            
                $nombre_archivo = $_FILES['archivo']['name'];
                
                

            //Se hace la consulta para ver si el usuario existe
            $sql = "SELECT usuario FROM conductor "
                    . "WHERE usuario='$user'";

            include_once 'checkuser.php';
            if (!$userAlreadyExist) {
                
                $tipo = $_FILES['archivo']['type'];
                $tamanio = $_FILES['archivo']['size'];

                $destino = "archivos/" . $user . "_" . $nombre_archivo;
                $nombre_disco = $user . "_" . $nombre_archivo;

                if ($nombre_archivo != "") {
                    if (copy($ruta, $destino)) {

                        $sql = "INSERT INTO tbl_documentos(nombre_archivo,nombre_disco, "
                                . "tipo,tamanio,usuario) VALUES('$nombre_archivo','$nombre_disco', "
                                . "'$tipo','$tamanio','$user')";
                        $query1 = $dbConnected->query($sql);
                        if ($query1) {
                            echo '<script type="text/javascript">
                                alert("Se guardo correctamente la imagen")</script>';
                        }
                    } else {
                        echo '<script type="text/javascript">
                            alert("no pudo guardarse la imagen")</script>';
                    }
                } else {
                    echo '<script type="text/javascript">
                            alert("no pudo guardarse la imagen")</script>';
                }

                $sql = "INSERT INTO conductor (nombres, apellidos, foto, correo, celular, "
                        . " departamento, ciudad, usuario, password) VALUES('$nombres', "
                        . "'$apellido','$nombre_disco','$mail','$celular','$depo','$muno','$user','$pass')";

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
        } 
            include_once 'nav-bar.php';
            ?>
            <div class="body-container wrapper">
                <div class="form-container">
                    <div id="formulario">
                        <div class="form-group">
                            <h2>Registro Conductor</h2> 
                        </div>
                        <br>
                        <!-- enctype="multipart/form-data" para envio de archivos  -->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group"> <!-- nombres -->
                                <div>
                                    <label for="nombres" class="control-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombres"
                                           value="<?php
                                           if (isset($nombres)) {
                                               echo $nombres;
                                           }
                                           ?>"
                                           name="nombres" placeholder="Nombres" required>
                                </div>
                                <div>
                                    <div></div>
                                    <label for="apellidos" class="control-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos"
                                           value="<?php
                                           if (isset($apellido)) {
                                               echo $apellido;
                                           }
                                           ?>"
                                           name="apellidos" placeholder="Apellidos" required> 
                                </div>
                            </div> 
                            <br>
                            <div class="form-group"> <!-- foto -->
                                <div>
                                    <!-- enctype="multipart/form-data" para envio de archivos en <form>  -->
                                    <label for="archivo" class="control-label">Foto</label>
                                    <input type="file" name="archivo">
                                </div>
                                <div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group"> <!-- apellidos -->
                                <div>
                                    <label for="celular" class="control-label">Celular</label>
                                    <input type="tel" class="form-control" id="celular"
                                           value="<?php
                                           if (isset($celular)) {
                                               echo $celular;
                                           }
                                           ?>"
                                           name="celular" placeholder="Celular" required>
                                </div>
                                <div>
                                    <label for="email" class="control-label">Email</label>
                                    <input type="email" class="form-control" id="email" 
                                           value="<?php
                                           if (isset($mail)) {
                                               echo $mail;
                                           }
                                           ?>"
                                           name="email" placeholder="Email">
                                </div>
                            </div>

                            <br>
                            <div class="form-group"> <!--  -->
                                <div>
                                    <label for="departamentos" class="control-label">Departamento</label> 
                                    <select class="form-control" name="departamentos" 
                                            id="departamentos" required>
                                    </select>
                                </div>
                                <div>
                                    <label for="municipio" class="control-label">Ciudad de Mayor Permanencia</label> 
                                    <select class="form-control" name="municipio" 
                                            id="municipio" required>
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
                                            $('#municipio').html(respuesta);
                                        });
                                    });
                                    // Lista de municipios
                                    $('#municipio').change(function ()
                                    {
                                        var municipio = $(this).children('option:selected').html();
                                        //alert( 'Lista de Municipios de ' + municipio );
                                    });
                                });
                            </script> 
                            <br>
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
                            <div class="form-group"> <!-- -->
                                <div>
                                    <label for="password" class="control-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password"
                                           value="<?php
                                           if (isset($pass)) {
                                               echo $pass;
                                           }
                                           ?>"
                                           id="password" placeholder="Contraseña" required>

                                </div>
                                <div>
                                    <label for="cfmPassword" class="control-label" >Confirmar Contraseña</label>
                                    <input type="password" class="form-control"
                                           value="<?php
                                           if (isset($cfmPass)) {
                                               echo $cfmPass;
                                           }
                                           ?>"
                                           name="cfmPassword" id="cfmPassword" placeholder="Contraseña" required>
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
                            <br>
                            <br>
                            <div class="form-group"> <!--  -->
                                <button type="submit" id="subir" name="enviar" value="enviar" class="btn btn-primary">ENVIAR</button>

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

