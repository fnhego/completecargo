<!DOCTYPE html>
<!--
Proyecto: Complete Cargo
File: publica.php
Programador: Ing. Fredy Hernández
Fecha: $date
-->
<?php
session_start();
include_once '../htconfig/conexion.php';
?>
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
        <link href="css/estilo.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/funciones.js"></script>
    </head> 

    <body>
        <div class="main-container">
            <?php
            if (isset($_SESSION['loggedin'])) {
                $user = $_SESSION['username'];
            }
            if (isset($_POST['enviar'])) {

                require_once './funciones.php';

                //$user = $_SESSION['username'];//
                $nombre = $_FILES['archivo']['name'];
                $tipo = $_FILES['archivo']['type'];
                $tamanio = $_FILES['archivo']['size'];
                $ruta = $_FILES['archivo']['tmp_name'];
                $destino = "archivos/" . $user . "_" . $nombre;
                $nombre_disco = $user . "_" . $nombre;

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
                            alert("No pudo guardarse la imagen")</script>';
                    }
                }
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
                $otro = filter_input(INPUT_POST, 'otro');
                if (!otro === '') {
                    $tipocarga = $otro;
                }
                $empaque = filter_input(INPUT_POST, 'empaque');
                $otro2 = filter_input(INPUT_POST, 'otro2');
                if (!otro2 === '') {
                    $empaque = $otro2;
                }
                $numeroempaques = filter_input(INPUT_POST, 'numeroempaques');
                $dimiguales = filter_input(INPUT_POST, 'dim_iguales');
                $pesoTotal = 0;
                for ($i = 1; $i <= $numeroempaques; $i++) {
                    $alto[$i] = filter_input(INPUT_POST, 'alto' . $i);
                    $largo[$i] = filter_input(INPUT_POST, 'largo' . $i);
                    $ancho[$i] = filter_input(INPUT_POST, 'ancho' . $i);
                    $peso[$i] = filter_input(INPUT_POST, 'peso' . $i);
                    $pesovol[$i] = filter_input(INPUT_POST, 'pesovol' . $i);
                    if ($peso[$i] > $pesovol[$i]) {
                        $pesoTotal = $pesoTotal + $peso[$i];
                    } else {
                        $pesoTotal = $pesoTotal + $pesovol[$i];
                    }
                }
                if ($dimiguales === "Si") {
                    $i = 1;
                    if ($peso[$i] > $pesovol[$i]) {
                        $pesoTotal = $numeroempaques * $peso[$i];
                    } else {
                        $pesoTotal = $numeroempaques * $pesovol[$i];
                    }
                }
                $fechamaxc = filter_input(INPUT_POST, 'fechamaxc');
                $fechaminc = filter_input(INPUT_POST, 'fechaminc');
                $horaminc = filter_input(INPUT_POST, 'horaminc');
                $horamaxc = filter_input(INPUT_POST, 'horamaxc');
                $librecargue = filter_input(INPUT_POST, 'librecargue');
                $montacarga = filter_input(INPUT_POST, 'montacarga');
                $fechamaxd = filter_input(INPUT_POST, 'fechamaxd');
                $fechamind = filter_input(INPUT_POST, 'fechamind');
                $horamind = filter_input(INPUT_POST, 'horamind');
                $horamaxd = filter_input(INPUT_POST, 'horamaxd');
                $libredescargue = filter_input(INPUT_POST, 'libredescargue');
                $montadescargue = filter_input(INPUT_POST, 'montadescargue');
                $detalleadicional = filter_input(INPUT_POST, 'detalleadicional');
                $terminos = filter_input(INPUT_POST, 'terminos');

                $sql = "INSERT INTO publicacarga (usuario, nombres, apellidos, "
                        . "celular,correo,dep_origen,ciudadorigen,dir_origen, "
                        . "dep_destino,ciudaddestino,dir_destino,tipocarga,empaque, numeroempaques, "
                        . "dimigual, ";
                for ($i = 1; $i <= $numeroempaques; $i++) {
                    $sql .= "alto" . $i . ", ancho" . $i . ",largo" . $i
                            . ",peso" . $i . ", ";
                }
                $sql .= "pesoTotal,fechamaxc, fechaminc,horaminc,horamaxc,librecargue,"
                        . "montacarga,fechamaxd, fechamind, horamind, horamaxd,"
                        . "libredescargue, montadescargue, detalleadicional, terminos) VALUES('$user','$nombres', "
                        . "'$apellidos','$celular','$correo','$dep_origen','$ciudadorigen', "
                        . "'$dir_origen','$dep_destino','$ciudaddestino','$dir_destino', "
                        . "'$tipocarga','$empaque','$numeroempaques','$dimiguales', ";
                for ($i = 1; $i <= $numeroempaques; $i++) {
                    $sql .= "'$alto[$i]', '$ancho[$i]','$largo[$i]', "
                            . "'$peso[$i]', ";
                }
                $sql .= "'$pesoTotal','$fechamaxc', '$fechaminc','$horaminc','$horamaxc',"
                        . "'$librecargue','$montacarga', '$fechamaxd', '$fechamind',"
                        . "'$horamind', '$horamaxd','$libredescargue', '$montadescargue',"
                        . "'$detalleadicional','$terminos')";

                $query = $dbConnected->query($sql);
                if ($query) {
                    echo'<script type="text/javascript">
                        alert("Se guardo correctamente");
                                       </script>';
                    $dbConnected->close();

                    $asunto = utf8_decode("Cotización por la Página Web");

                    $destinatario = "info@completecargo.co";

                    $cuerpo = $detalleadicional . "\r\n<br><br>";
                    $cuerpo .= "Origen: " . $ciudadorigen . ", " . $dep_origen . "<br>";
                    $cuerpo .= "Destino: " . $ciudaddestino . ", " . $dep_destino . "<br>";
                    $cuerpo .= "Clase de Mercancia: " . $tipocarga . "<br>";
                    $cuerpo .= "Tipo de Carga/Empaque: " . $empaque . "<br>";
                    $cuerpo .= "Número de Empaques: " . $numeroempaques . "<br>";
                    $cuerpo .= "Dimesiones Iguales?: " . $dimiguales . "<br>";
                    $pesoTotal = 0;
                    if ($dimiguales === "No") {
                        for ($i = 1; $i <= $numeroempaques; $i++) {
                            $cuerpo .= "Dimensiones Empaque" . $i . ": " . $alto[$i] . "cms de alto x " . $ancho[$i];
                            $cuerpo .= "cms de ancho x " . $largo[$i] . "cms de largo.<br>";
                            $cuerpo .= "Peso:  " . $peso[$i] . "Kg.<br>";
                            $volumen = $alto[$i] * $ancho[$i] * $largo[$i] / (100 * 100 * 100);
                            $cuerpo .= "Volumen: " . $volumen . "m3<br>";
                            $cuerpo .= "Peso Volumétrico: " . $pesovol[$i] . "Kg<br>";
                            if ($peso[$i] > $pesovol[$i]) {
                                $pesoTotal = $pesoTotal + $peso[$i];
                            } else {
                                $pesoTotal = $pesoTotal + $pesovol[$i];
                            }
                        }
                    } else {
                        $i = 1;
                        $cuerpo .= "Dimensiones Empaque: " . $alto[$i] . "cms de alto x " . $ancho[$i];
                        $cuerpo .= "cms de ancho x " . $largo[$i] . "cms de largo.<br>";
                        $cuerpo .= "Peso:  " . $peso[$i] . "Kg.<br>";
                        $volumen = $alto[$i] * $ancho[$i] * $largo[$i] / (100 * 100 * 100);
                        $cuerpo .= "Volumen: " . $volumen . "m3<br>";
                        $cuerpo .= "Peso Volumétrico: " . $pesovol[$i] . "Kg<br>";
                        if ($peso[$i] > $pesovol[$i]) {
                            $pesoTotal = $numeroempaques * $peso[$i];
                        } else {
                            $pesoTotal = $numeroempaques * $pesovol[$i];
                        }
                    }
                    $cuerpo .= "Peso Total: " . $pesoTotal . "Kg<br>";
                    $cuerpo .= "Fecha Máxima de Cargue: " . $fechamaxc . "<br>";
                    $cuerpo .= "Fecha Mínima de Cargue: " . $fechaminc . "<br>";
                    $cuerpo .= "Hora Mínima de Cargue: " . $horaminc . "<br>";
                    $cuerpo .= "Hora Máxima de Cargue: " . $horamaxc . "<br>";
                    $cuerpo .= "Libre de Cargue: " . $librecargue . "<br>";
                    $cuerpo .= "Requiere Montacarga: " . $montacarga . "<br>";
                    $cuerpo .= "Fecha Máxima de Descargue: " . $fechamaxd . "<br>";
                    $cuerpo .= "Fecha Mínima de Descargue: " . $fechamind . "<br>";
                    $cuerpo .= "Hora Mínima de Descargue: " . $horamind . "<br>";
                    $cuerpo .= "Hora Máxima de Descargue: " . $horamaxd . "<br>";
                    $cuerpo .= "Libre de Descargue: " . $libredescargue . "<br>";
                    $cuerpo .= "Requiere Montacarga en el Descargue: " . $montadescargue . "<br><br>";
                    $cuerpo .= "<img src='http://www.completecargo.co/" . $destino . "'width='100%' height='auto'>&nbsp;&nbsp;&nbsp;<br><br>";
                    //$cuerpo .= "<img src='http://www.completecargo.co/" . $destino . "'width='100%' height='auto'>&nbsp;&nbsp;&nbsp;<br><br>";
                    $cuerpo .= "<br>" . $nombres . " " . $apellidos . "<br>";
                    $cuerpo .= $correo . "<br>";
                    $cuerpo .= "Tel. " . $celular;

                    //para el envío en formato HTML 
                    $headers = "MIME-Version: 1.0\r\n";
                    $headers .= "Content-type: text/html; charset=utf-8; \r\n ";
                    //dirección del remitente 
                    $headers .= "From: " . $nombres . " " . $apellidos . "<" . $correo . ">\r\n";
                    //dirección de respuesta, si queremos que sea distinta que la del remitente 
                    $headers .= "Reply-To: " . $correo . "\r\n";
                    //ruta del mensaje desde origen a destino 
                    $headers .= "Return-path: info@completecargo.co\r\n";
                    //direcciones que recibián copia
                    $headers .= "Cc: Fredy.Hernandez@completecargo.co\r\n ";

                    if (mail($destinatario, $asunto, $cuerpo, $headers)) {
                        echo '<script type="text/javascript">
                        alert("Mensaje enviado")</script>';
                        header("Refresh: 0; URL = panelusuario.php");
                    } else {
                        echo '<script type="text/javascript">
                        alert("Error, no se pudo enviar")</script>';
                    }

                    header("Refresh: 0; URL = panelusuario.php");
                } else {
                    echo '<script type="text/javascript">
                    alert("No pudo guardarse en la Base de Datos") </script>';
                }
            } else {


                $sql = "SELECT nombres, apellidos, celular, correo FROM generador "
                        . " WHERE usuario='$user'";

                $query = $dbConnected->query($sql);
                if ($query) {

                    $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                    $nombres = $row['nombres'];
                    $apellidos = $row['apellidos'];
                    $celular = $row['celular'];
                    $correo = $row['correo'];
                }

                include_once 'nav-bar4.php';
                ?>
                <div class="body-container">
                    <div class="form-container">
                        <div id="formulario">
                            <div class="form-group">
                                <h2>Publicar Carga</h2>
                            </div>
                            <br>
                            <form action="" method="post" enctype="multipart/form-data">
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
                                    <br class="oculto">
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
                                    <br class="oculto">
                                    <div>
                                        <label for="correo" class="control-label">Email</label>
                                        <input type="email" class="form-control" id="correo"
                                               value="<?php
                                               if (isset($correo)) {
                                                   echo $correo;
                                               }
                                               ?>"
                                               name="correo" placeholder="Email" required>
                                    </div>
                                </div>

                                <div class="form-group"> <!--  -->
                                    <div>
                                        <label for="dep_origen" class="control-label">Departamento de Origen</label> 
                                        <select class="form-control" name="dep_origen" id="dep_origen" required>
                                            <option value="">Seleccione</option>
                                        </select>  
                                    </div>
                                    <br class="oculto">
                                    <div>
                                        <label for="ciudadorigen" class="control-label">Municipio de Origen</label> 
                                        <select class="form-control" name="ciudadorigen" id="ciudadorigen" required>
                                            <option value="">Seleccione</option>
                                        </select>  
                                    </div>
                                </div>

                                <script>

                                    $(function () {

                                        // Lista de departamentos
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

                                <div class="form-group"> <!-- -->
                                    <div>
                                        <label for="dep_destino" class="control-label">Departamento de Destino</label> 
                                        <select class="form-control" id="dep_destino" name="dep_destino" required >
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <br class="oculto">
                                    <div>
                                        <label for="ciudaddestino" class="control-label">Municipio de Destino</label> 
                                        <select class="form-control" id="ciudaddestino" name="ciudaddestino" required>
                                            <option value="">Seleccione</option>
                                        </select> 
                                    </div>
                                </div>

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
                                        <input type="text" class="form-control" id="dir_destino"
                                               style="width:100%" name="dir_destino" 
                                               placeholder="Dirección de Destino" required>
                                    </div>
                                    <div>
                                        <label for="tipocarga" class="control-label">Clase de Mercancia</label>
                                        <select class="form-control" id="tipocarga" name="tipocarga" required>
                                            <option value="">Seleccione</option>
                                            <option value="Químicos">Químicos</option>
                                            <option value="Materiales de Construcción">Materiales de Construcción</option>
                                            <option value="Industria de Consumo de Alimentos">Industria de Consumo de Alimentos</option>
                                            <option value="Ganadería">Ganadería</option>
                                            <option value="Agricultura">Agricultura </option>
                                            <option value="Mundanza/Trasteo/Acarreo">Mundanza/Trasteo/Acarreo</option>
                                            <option value="Lubricantes">Lubricantes</option>
                                            <option value="Pinturas">Pinturas</option>
                                            <option value="Articulos Hogar">Articulos Hogar</option>
                                            <option value="Textiles">Pinturas</option>
                                            <option value="Vehiculos">Pinturas</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div>
                                        <label for="otro" class="control-label">Cuál?</label>
                                        <input type="text" class="form-control" id="otro"
                                               style="width:100%" name="otro" 
                                               placeholder="Cuál?">
                                    </div>
                                    <br class="oculto">
                                    <div>
                                        <label for="empaque" class="control-label">Tipo Carga/Empaque</label>
                                        <select class="form-control" id="empaque" name="empaque" required>
                                            <option value="">Seleccione</option>
                                            <option value="Pallet/Estiba">Pallets/estibas</option>
                                            <option value="Caja">Caja</option>
                                            <option value="Contenedor">Contenedor</option>
                                            <option value="Tambor">Tambor</option>
                                            <option value="Huacal">Huacal</option>
                                            <option value="Saco/Bulto">Saco/Bulto</option>
                                            <option value="Mercancia a Granel">Mercancia a Granel</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                </div>  

                                <div class="form-group"> <!--Emapaque -->
                                    <div>
                                        <label for="otro2" class="control-label">Cuál?</label>
                                        <input type="text" class="form-control" id="otro2"
                                               style="width:100%" name="otro2" 
                                               placeholder="Cuál?"> 
                                    </div>
                                    <br class="oculto">
                                    <div>
                                        <label for="numeroempaques" class="control-label">Número de Empaques:</label>
                                        <input type="number" class="form-control" id="numeroempaques" 
                                               name="numeroempaques" max="10" 
                                               onkeypress="return justNumbers(event);" required>
                                    </div>
                                </div>
                                <div class="form-group"> <!--Emapaque -->
                                    <div>
                                        <label for="dim_iguales" class="control-label">Dimensiones Iguales?</label>
                                        <select class="form-control" id="dim_iguales" name="dim_iguales" required>
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select> 
                                    </div>
                                    <br class="oculto">
                                    <div>
                                    </div>
                                </div>
                                <div id="dimensiones">

                                    <script>
                                        var tipo = document.getElementById("dim_iguales");
                                        var numero = document.getElementById("numeroempaques");
                                        colocaDimensiones();
                                        tipo.onchange = colocaDimensiones;
                                        numero.onchange = colocaDimensiones;
                                    </script>

                                </div>

                                <div class="dimensiones"> <!--  -->
                                    <div>
                                        <label for="cargue" class="control-label">Cargue:</label>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="form-group"> <!-- -->
                                    <div>
                                        <label for="fechamaxc" class="control-label">Fecha Máxima</label>
                                        <input type="date" class="form-control" id="fechamaxc" name="fechamaxc" 
                                               placeholder="Fecha Máxima" min="2017-10-01"
                                               style="width:50%" required>
                                    </div>
                                    <div>
                                        <label for="fechaminc" class="control-label">Fecha Mínima</label>
                                        <input type="date" class="form-control" id="fechaminc" name="fechaminc" 
                                               placeholder="Fecha Mínima" min="2017-10-01"
                                               style="width:50%" required>
                                    </div>
                                </div>
                                <div class="form-group"> <!--  -->

                                    <div>
                                        <label for="horaminc" class="control-label">Hora Mínima?</label> 
                                        <select class="form-control" id="horaminc" name="horaminc" 
                                                style="width:50%" required>
                                            <option value="">Seleccione</option>
                                            <option value="5 a.m.">5 a.m.</option>
                                            <option value="6 a.m.">6 a.m.</option>
                                            <option value="7 a.m.">7 a.m.</option>
                                            <option value="8 a.m.">8 a.m.</option>
                                            <option value="9 a.m.">9 a.m.</option>
                                            <option value="10 a.m.">10 a.m.</option>
                                            <option value="11 a.m.">11 a.m.</option>
                                            <option value="12 p.m.">12 p.m.</option>

                                        </select> 
                                    </div>

                                    <div>
                                        <label for="horamaxc" class="control-label">Hora Máxima</label> 
                                        <select class="form-control" id="horamaxc" name="horamaxc" 
                                                style="width:50%" required>
                                            <option value="">Seleccione</option>
                                            <option value="12 p.m.">12 p.m.</option>
                                            <option value="1 p.m.">1 p.m.</option>
                                            <option value="2 p.m.">2 p.m.</option>
                                            <option value="3 p.m.">3 p.m.</option>
                                            <option value="4 p.m.">4 p.m.</option>
                                            <option value="5 p.m.">6 p.m.</option>
                                            <option value="7 p.m.">7 p.m.</option>
                                            <option value="8 p.m.">8 p.m.</option>
                                        </select> 

                                    </div>
                                </div>

                                <div class="form-group"> <!--  -->

                                    <div>
                                        <label for="librecargue" class="control-label">Libre de cargue?</label> 
                                        <select class="form-control" id="librecargue" name="librecargue" 
                                                style="width:50%" required>
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select> 
                                    </div>

                                    <div>
                                        <label for="montacarga" class="control-label">Requiere Montacargas?</label> 
                                        <select class="form-control" id="montacarga" name="montacarga" 
                                                style="width:50%" required>
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select> 

                                    </div>
                                </div>

                                <div class="dimensiones"> <!--  -->
                                    <div>
                                        <label for="descargue" class="control-label">Descargue:</label>
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="form-group"> <!-- -->
                                    <div>
                                        <label for="fechamaxd" class="control-label">Fecha Máxima</label>
                                        <input type="date" class="form-control" id="fechamaxd" name="fechamaxd" 
                                               placeholder="Fecha Máxima" min=2017-10-01 
                                               style="width:50%" required>
                                    </div>
                                    <div>
                                        <label for="fechamind" class="control-label">Fecha Mínima</label>
                                        <input type="date" class="form-control" id="fechamind" name="fechamind" 
                                               placeholder="Fecha Mínima" min=2017-10-01 
                                               style="width:50%" required>
                                    </div>
                                </div>
                                <div class="form-group"> <!--  -->

                                    <div >
                                        <label for="horamind" class="control-label">Hora Mínima?</label> 
                                        <select class="form-control" id="horamind" name="horamind" 
                                                style="width:50%" required>
                                            <option value="">Seleccione</option>
                                            <option value="5 a.m.">5 a.m.</option>
                                            <option value="6 a.m.">6 a.m.</option>
                                            <option value="7 a.m.">7 a.m.</option>
                                            <option value="8 a.m.">8 a.m.</option>
                                            <option value="9 a.m.">9 a.m.</option>
                                            <option value="10 a.m.">10 a.m.</option>
                                            <option value="11 a.m.">11 a.m.</option>
                                            <option value="12 p.m.">12 p.m.</option>

                                        </select> 

                                    </div>

                                    <div >
                                        <label for="horamaxd" class="control-label">Hora Máxima</label> 
                                        <select class="form-control" id="horamaxd" name="horamaxd" 
                                                style="width:50%" required>
                                            <option value="">Seleccione</option>
                                            <option value="12 p.m.">12 p.m.</option>
                                            <option value="1 p.m.">1 p.m.</option>
                                            <option value="2 p.m.">2 p.m.</option>
                                            <option value="3 p.m.">3 p.m.</option>
                                            <option value="4 p.m.">4 p.m.</option>
                                            <option value="5 p.m.">6 p.m.</option>
                                            <option value="7 p.m.">7 p.m.</option>
                                            <option value="8 p.m.">8 p.m.</option>
                                        </select> 

                                    </div>
                                </div>
                                <div class="form-group"> <!--  -->

                                    <div >
                                        <label for="libredescargue" class="control-label">Libre de Descargue?</label> 
                                        <select class="form-control" id="libredescargue" name="libredescargue" 
                                                style="width:50%" required>
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select> 
                                    </div>


                                    <div > 
                                        <label for="montadescargue" class="control-label">Requiere Montacargas?</label> 
                                        <select class="form-control" id="montadescargue" 
                                                name="montadescargue" style="width:50%" required>
                                            <option value="">Seleccione</option>
                                            <option value="Si">Si</option>
                                            <option value="No">No</option>
                                        </select> 
                                    </div>

                                </div>
                                <div class="form-group"> <!-- foto -->
                                    <div>
                                        <label for="archivo" class="control-label">Foto de la Carga</label>
                                        <input type="file" name="archivo">
                                    </div>
                                    <div>
                                    </div>
                                </div>
                                <div class="form-group"> <!-- nombres -->
                                    <label for="detalleadicional" class="control-label">Detalles Adicionales</label>
                                    <textarea type="text" class="form-control" id="detalleadicional"
                                              name="detalleadicional" rows="7"></textarea>
                                </div>
                                <br>

                                <div class="form-group form-horizontal"> <!-- nombres -->
                                    <label for="terminos" class="control-label">Acepto Términos y Condiciones</label>
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
            echo 'El usuario es: ' . $user;
            ?>
        </div>
    </body>
</html>




