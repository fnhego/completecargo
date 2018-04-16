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

            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <script src="functions.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        </head> 

        <body>
            <?php
            include_once 'conexion2.php';
            if (isset($_POST['enviar'])) {// && !empty($_POST['documento'])) {
                //Guardamos en variables los datos enviados
                session_start();
                $user = $_SESSION['usuario'];
                $nombre = $_FILES['archivo']['name'];
                $tipo = $_FILES['archivo']['type'];
                $tamanio = $_FILES['archivo']['size'];
                $ruta = $_FILES['archivo']['tmp_name'];
                $destino = "archivos/" . $user . "_" . $nombre;
                $nombre_disco = $user . "_" . $nombre;

                /*
                  print_r($_FILES);
                  echo '<br><br>';
                  print_r($_POST);
                  echo '<br><br>';
                  echo "$nombre" . '<br>';
                  echo "$nombre_disco" . '<br>';
                  echo "$tipo" . '<br>';
                  echo "$tamanio" . '<br>';
                  echo "$ruta" . '<br>';
                  echo "$destino" . '<br>';
                  echo "$user" . '<br>'; */

                if ($nombre != "") {
                    if (copy($ruta, $destino)) {

                        $sql = "INSERT INTO tbl_documentos(nombre_archivo,nombre_disco, "
                                . "tipo,tamanio,usuario) VALUES('$nombre','$nombre_disco', "
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
                }
                //Guardamos en variables los datos enviados

                $tipdoc = filter_input(INPUT_POST, 'docu');
                $numdoc = filter_input(INPUT_POST, 'documento');
                $licencia = filter_input(INPUT_POST, 'lic');
                $numlic = filter_input(INPUT_POST, 'licencia');
                $cami = filter_input(INPUT_POST, 'camion');
                $capa = filter_input(INPUT_POST, 'capacidad');
                $carroc = filter_input(INPUT_POST, 'carroceria');
                $canteje = filter_input(INPUT_POST, 'ejes');
                $placa = filter_input(INPUT_POST, 'placa');
                $vensoat = filter_input(INPUT_POST, 'soat');
                $ventecnico = filter_input(INPUT_POST, 'tecnico');
                $tarjeta = $user . $nombre;
                $empre = filter_input(INPUT_POST, 'empresa');
                $tel = filter_input(INPUT_POST, 'tel');
                $condic = filter_input(INPUT_POST, 'condiciones');

                $sql = "UPDATE conductor SET  tipodocumento='$tipdoc', numerodocumento='$numdoc', "
                        . "tipolicencia='$licencia', numerolicencia='$numlic',tipocamion='$cami', "
                        . "capacidad='$capa', numeroejes='$canteje', carroceria='$carroc', "
                        . "placa='$placa',fechasoat='$vensoat',fechatecnomecanica='$ventecnico', "
                        . "tarjetapropiedad='$tarjeta',empresatransporte='$empre',telefonoempresa='$tel', "
                        . "terminos='$condic' WHERE usuario='$user' ";  //

                $query = $dbConnected->query($sql);
                if ($query) {
                    echo'<script type="text/javascript">
                        alert("Se guardo correctamente toda su información")</script>';
                    $dbConnected->close();
                    header("Refresh: 1; URL = index.php"); //conductor2
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
                        <form name="formulario" method="POST" enctype="multipart/form-data" action="">
                            <div class="form-group"> <!-- nombres -->
                                <label for="docu" class="control-label">Tipo de Documento</label>
                                <select class="form-control" name="docu" id="docu" required>
                                    <option value="">Seleccione</option>
                                    <option value="CC">Cédula</option>
                                    <option value="NIT">Nit</option>
                                    <option value="CE">Cédula Extrangeria</option>
                                    <option value="PA">Pasaporte</option>
                                </select>
                            </div> 
                            <div class="form-group"> <!-- apellidos -->
                                <label for="documento" class="control-label">Número de Documento</label>
                                <input type="text" class="form-control" id="documento" 
                                       name="documento" placeholder="Número de Documento" required>
                            </div> 
                            <div class="form-group"> <!-- nombres -->
                                <label for="lic" class="control-label">Tipo de Licencia</label>
                                <select class="form-control" name="lic" id="lic" required>
                                    <option value="">Seleccione</option>
                                    <option value="B1">B1</option>
                                    <option value="B2">B2</option>
                                    <option value="B3">B3</option>
                                    <option value="C1">C1</option>
                                    <option value="C2">C2</option>
                                    <option value="C3">C3</option>
                                </select>
                            </div>
                            <div class="form-group"> <!--  -->
                                <label for="licencia" class="control-label">Número de Licencia</label>
                                <input type="text" class="form-control" id="licencia" 
                                       name="licencia" placeholder="Número de Licencia" required>
                            </div> 
                            <br>
                            <div class="form-group"> <!-- -->
                                <label for="camion" class="control-label">Tipo de Camión</label> 
                                <select class="form-control" name="camion" id="camion" required>
                                    <option value="">Seleccione</option>
                                    <option value="1">Por definir</option>
                                    <option value="2"></option>
                                    <option value="3"></option>
                                    <option value="4"></option>
                                </select>
                            </div> 
                            <div class="form-group"> <!-- -->
                                <label for="capacidad" class="control-label">Capacidad</label> 
                                <select class="form-control" name="capacidad" id="capacidad" required>
                                    <option value="">Seleccione</option>
                                    <option value="5.0">5.0</option>
                                    <option value="8.5">8.5</option>
                                    <option value="12.5">12.5</option>
                                </select>  
                            </div>  
                            <div class="form-group"> <!-- -->
                                <label for="carroceria" class="control-label">Carroceria</label> 
                                <select class="form-control" name="carroceria" id="carroceria" required>
                                    <option value="">Seleccione</option>
                                    <option value="1">Por definir</option>
                                    <option value="2"></option>
                                    <option value="3"></option>
                                </select>  
                            </div>  
                            <div class="form-group"> <!-- -->
                                <label for="ejes" class="control-label">Cantidad de Ejes</label> 
                                <select class="form-control" name="ejes" id="ejes" required>
                                    <option value="">Seleccione</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>  
                            </div>
                            <div class="form-group"> <!--  -->
                                <label for="placa" class="control-label">Placa</label>
                                <input type="text" class="form-control" id="placa" 
                                       name="placa" placeholder="Placas" required>
                            </div>
                            <div class="form-group"> <!--  -->
                                <label for="soat" class="control-label">Vencimiento Soat</label>
                                <input type="date" class="form-control" id="soat" name="soat" 
                                       placeholder="Vencimiento Soat" min=2017-10-01 required>
                            </div>  
                            <div class="form-group"> <!--  -->
                                <label for="tecnico" class="control-label">Vencimiento Tecnicomecánica</label>
                                <input type="date" class="form-control" id="tecnico" 
                                       name="tecnico" placeholder="Vencimiento Tecnicomecánica" min='2017-10-01' required>
                            </div>
                            <div class="form-group">
                                <label for="condi" class="control-label">Tarjeta de Propiedad</label>
                                <!-- <input name="MAX_FILE_SIZE" type="hidden" value="30000">
                                <!-- <form action="leer.php" enctype="multipart/form-data" method="post">-->
                                <input type="file" name="archivo" required> <!--accept=""-->

                                <!-- </form>-->
                            </div>    
                            <div class="form-group"> <!--  -->
                                <label for="empresa" class="control-label">Empresa de Transporte</label>
                                <input type="text" class="form-control" id="empresa" 
                                       name="empresa" placeholder="Nombre Empresa" required>
                            </div>  
                            <div class="form-group"> <!--  -->
                                <label for="tel" class="control-label">Teléfono Empresa</label>
                                <input type="text" class="form-control" id="tel" 
                                       name="tel" placeholder="Telefono Empresa" required>
                            </div> 
                            <div class="form-group"> <!-- nombres -->
                                <label for="condi" class="control-label">Términos y condiciones</label>
                                <input   type="checkbox" id="condiciones" name="condiciones" required>
                            </div>   
                            <div class="form-group"> <!--  -->
                                <button type="submit" value="enviar" name="enviar" id="enviar" class="btn btn-primary">ENVIAR</button>
                            </div>
                        </form>
                    </div>
                    <?php
                }
                // print_r($_POST);
                // print_r($_FILES);
                ?>
            </div>
        </body>
    </html>

