<!DOCTYPE html>
<!--
Proyecto: Complete Cargo
File: publica.php
Programador: Ing. Fredy Hernández
Fecha: $date
-->

<html>
    <head>
        <title>Publicar Carga</title>
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
        session_start();
        if (isset($_SESSION['loggedin'])) {
            $user = $_SESSION['username'];
        }
        if (isset($_POST['enviar'])) {
            include_once '../htconfig/conexion.php';
            //Guardamos en variables los datos enviados
            $nombres = filter_input(INPUT_POST, 'nombres');
            $apellidos = filter_input(INPUT_POST, 'apellidos');
            $celular = filter_input(INPUT_POST, 'celular');
            $correo = filter_input(INPUT_POST, 'correo');
            $dep_origen = departamento(filter_input(INPUT_POST, 'dep_origen'), $dbConnected);
            $ciudadorigen = filter_input(INPUT_POST, 'ciudadorigen');
            $dir_origen = filter_input(INPUT_POST, 'dir_origen');
            $dep_destino = departamento(filter_input(INPUT_POST, 'dep_destino'), $dbConnected);
            $ciudaddestino = filter_input(INPUT_POST, 'ciudaddestino');
            $dir_destino = filter_input(INPUT_POST, 'dir_destino');
            $tipocarga = filter_input(INPUT_POST, 'tipocarga');
            $alto = filter_input(INPUT_POST, 'alto');
            $largo = filter_input(INPUT_POST, 'largo');
            $ancho = filter_input(INPUT_POST, 'ancho');
            $peso = filter_input(INPUT_POST, 'peso');
            $librecargue = filter_input(INPUT_POST, 'librecargue');
            $montcarga = filter_input(INPUT_POST, 'montacarga');
            $libredescargue = filter_input(INPUT_POST, 'libredescargue');
            $montadescargue = filter_input(INPUT_POST, 'montadescargue');
            $detalleadicional = filter_input(INPUT_POST, 'detalleadicional');
            $terminos = filter_input(INPUT_POST, 'terminos');

            $sql = "INSERT INTO publicacarga (nombres, apellidos, "
                    . "celular,correo,dep_origen,ciudadorigen,dir_origen, "
                    . "dep_destino,ciudaddestino,dir_destino,tipocarga,altocarga, "
                    . "anchocarga,largocarga,pesocarga,detalleadicional,librecargue, "
                    . "montacarga,libredescargue,montadescargue, terminos) VALUES('$nombres', "
                    . "'$apellidos','$celular','$correo','$dep_origen','$ciudadorigen', "
                    . "'$dir_origen','$dep_destino','$ciudaddestino','$dir_destino', "
                    . "'$tipocarga','$alto','$ancho','$largo','$peso','$librecargue',"
                    . "'$montcarga','$libredescargue','$montadescargue','$detalleadicional','$terminos')";

            $query = $dbConnected->query($sql);
            if ($query) {
                echo'<script type="text/javascript">
                        alert("Se guardo correctamente");
                                       </script>';
                $dbConnected->close();
                header("Refresh: 0; URL = index.php");
            } else {
                echo '<script type="text/javascript">
                    alert("no pudo guardarse") </script>';
            }
        } else {

            include_once 'nav-bar3.php';
            ?>
            <div class="body-container wrapper">
                <div class="form-container">
                    <div id="formulario">
                        <div class="form-group">
                            <h2>Publicar Carga</h2>
                        </div>
                        <br>
                        <form action="" method="post">
                            <div class="form-group"> <!-- nombres y apellidos-->
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
                                    <label for="apellidos" class="control-label">Apellidos</label>
                                    <input type="text" class="form-control" id="apellidos"
                                           value="<?php
                                           if (isset($apellidos)) {
                                               echo $apellidos;
                                           }
                                           ?>"
                                           name="apellidos" placeholder="Apellidos" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group"> <!-- celular y email -->
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
                                    <label for="correo" class="control-label">Email</label>
                                    <input type="correo" class="form-control" id="correo"
                                           value="<?php
                                           if (isset($correo)) {
                                               echo $correo;
                                           }
                                           ?>"
                                           name="correo" placeholder="Email" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group"> <!--  -->
                                <div>
                                    <label for="dep_origen" class="control-label">Departamento de Origen</label> 
                                    <select class="form-control" name="dep_origen" id="dep_origen" required>
                                        <option value="">Seleccione</option>
                                    </select>  
                                </div>
                                <div>
                                    <label for="ciudadorigen" class="control-label">Municipio de Origen</label> 
                                    <select class="form-control" name="ciudadorigen" id="ciudadorigen" required>
                                        <option value="">Seleccione</option>
                                    </select>  
                                </div>
                            </div>
                            <br>
                            <script>

                                $(function () {

                                    // Lista de deprtamentos
                                    $.post('departamentos.php').done(function (respuesta)
                                    {
                                        $('#dep_origen').html(respuesta);
                                    });

                                    // lista de departamentos
                                    $('#dep_origen').change(function ()
                                    {
                                        var el_continente = $(this).val();

                                        // Lista de municipios
                                        $.post('municipios.php', {continente: el_continente}).done(function (respuesta)
                                        {
                                            $('#ciudadorigen').html(respuesta);
                                        });
                                    });

                                    // Lista de municipios
                                    $('#ciudadorigen').change(function ()
                                    {
                                        var municipio = $(this).children('option:selected').html();

                                    });

                                });
                            </script> 
                            <div class="form-group"> <!--  -->
                                <div>
                                    <label for="dir_origen" class="control-label">Dirección de Origen</label>
                                    <input type="text" class="form-control" id="dir_origen"
                                           value="<?php
                                           if (isset($dir_origen)) {
                                               echo $dir_origen;
                                           }
                                           ?>"
                                           name="dir_origen" placeholder="Dirección de Origen" required >
                                </div>
                                <div>
                                </div>
                            </div> 

                            <br>

                            <div class="form-group"> <!-- -->
                                <div>
                                    <label for="dep_destino" class="control-label">Departamento de Destino</label> 
                                    <select class="form-control" id="dep_destino" name="dep_destino" required >
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="ciudaddestino" class="control-label">Municipio de Destino</label> 
                                    <select class="form-control" id="ciudaddestino" name="ciudaddestino" required>
                                        <option value="">Seleccione</option>
                                    </select> 
                                </div>
                            </div>
                            <br>
                            <script>
                                $(function () {

                                    // Lista de departamentos
                                    $.post('departamentos.php').done(function (respuesta)
                                    {
                                        $('#dep_destino').html(respuesta);
                                    });

                                    // lista de departamentos
                                    $('#dep_destino').change(function ()
                                    {
                                        var el_continente = $(this).val();

                                        // Lista de municipios
                                        $.post('municipios.php', {continente: el_continente}).done(function (respuesta)
                                        {
                                            $('#ciudaddestino').html(respuesta);
                                        });
                                    });

                                    // Lista de municipios
                                    $('#ciudaddestino').change(function ()
                                    {
                                        var mun = $(this).children('option:selected').html();
                                    });

                                });
                            </script>
                            <div class="form-group"> <!-- -->
                                <div>
                                    <label for="dir_destino" class="control-label">Dirección de Destino</label>
                                    <input type="text" class="form-control" id="dir_destino" name="dir_destino" placeholder="Dirección de Destino" required >
                                </div>
                                <div>
                                    <label for="tipocarga" class="control-label">Tipo de carga</label>
                                    <select class="form-control" id="carga" name="tipocarga" required>
                                        <option value="">Seleccione</option>
                                        <option value="Perecederos">Perecederos</option>
                                        <option value="Materiales Peligrosos">Materiales Peligrosos</option>
                                        <option value="Vehículos">Vehículos</option>
                                        <option value="Materiales de Construcción">Materiales de Construcción</option>
                                        <option value="Industria de Consumo de Alimentos">Industria de Consumo de Alimentos </option>
                                        <option value="Industria de Ganadería Y Agricultura">Industria de Ganadería Y Agricultura</option>
                                        <option value="Mudanzas<">Mudanzas</option>
                                        <option value="Paquetería">Paquetería</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>
                            </div>  
                            <br>

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
                                               placeholder="Alto" style="width:35%" required >
                                    </div>
                                    <div class="col-xs-12 col-sm-5 col-md-2 col-lg-2">
                                        <label for="ancho" class="control-label">Ancho en cm</label>
                                        <input type="text" class="form-control" id="ancho" name="ancho" 
                                               placeholder="Ancho" style="width:35%" required >
                                    </div>
                                </div>
                                <div>
                                    <div class="col-xs-12 col-sm-5 col-md-2 col-lg-2">
                                        <label for="largo" class="control-label">Largo en cm</label>
                                        <input type="text" class="form-control" id="largo" name="largo" 
                                               placeholder="Largo" style="width:35%" required >
                                    </div>

                                    <div class="col-xs-12 col-sm-5 col-md-2 col-lg-2">
                                        <label for="peso" class="control-label">Peso en kg</label>
                                        <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso" style="width:35%" required>
                                    </div>
                                </div>
                            </div> 
                            <br> 
                            <div class="form-group"> <!--  -->
                                <div>
                                    <label for="cargue" class="control-label">Cargue:</label>
                                </div>
                                <div>
                                </div>
                            </div>

                            <div class="form-group"> <!--  -->
                                <div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <label for="librecargue" class="control-label">Libre de cargue?</label> 
                                        <select class="form-control" id="librecargue" name="librecargue" style="width:35%" required>
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select> 
                                    </div>
                                </div>
                                <div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <label for="montacarga" class="control-label">Requiere Montacargas?</label> 
                                        <select class="form-control" id="montacarga" name="montacarga" 
                                                style="width:35%" required>
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select> 
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group"> <!--  -->
                                <div>
                                    <label for="descargue" class="control-label">Descargue:</label>
                                </div>
                                <div>
                                </div>
                            </div>

                            <div class="form-group"> <!--  -->
                                <div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                        <label for="libredescargue" class="control-label">Libre de Descargue?</label> 
                                        <select class="form-control" id="libredescargue" name="libredescargue" 
                                                style="width:35%" required>
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select> 
                                    </div>
                                </div>
                                <div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
                                        <label for="montadescargue" class="control-label">Requiere Montadescargas?</label> 
                                        <select class="form-control" id="montadescargue" 
                                                name="montadescargue" style="width:35%" required>
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select> 
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="form-group"> <!-- nombres -->
                                <label for="detalleadicional" class="control-label">Detalles Adicionales</label>
                                <textarea type="text" class="form-control" id="detalleadicional"
                                          name="detalleadicional" rows="7"></textarea>
                            </div> 
                            <br>
                            <div class="form-group form-horizontal"> <!-- nombres -->
                                <label for="terminos" class="control-label">Términos y condiciones</label>
                                &nbsp;&nbsp;&nbsp;
                                <input   type="checkbox"  id="terminos" name="terminos" required >
                            </div>
                            <br>
                            <br>
                            <div class="form-group"> <!--  -->
                                <button type="submit" id="enviar" name="enviar" value="enviar" class="btn btn-primary">ENVIAR</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
                include_once 'footer.php';
                ?>
            </div>
            <?php
        }
        ?>
    </body>
</html>




