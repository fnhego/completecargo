<!DOCTYPE html>
<!--
Proyecto: Complete Cargo
File: 
Programador: Ing. Fredy Hernández
Fecha: $date
-->
<?php
session_start();
$user = $_SESSION['username'];
?>
<html>
    <head>
        <title>Panel Usuario</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href='img/complete_logo.ico' rel='shortcut icon' type='image/x-icon'>

        <!-- Bootstrap -->
        <link href="css/normalize.css" rel="stylesheet" type='text/css'>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilopanel.css" rel="stylesheet">
        <script src="js/jquery-3.2.1.js"></script>
        <script src="js/funciones.js"></script>

    </head>
    <body>
        <div class="main-container">

            <?php
            //include_once 'nav-bar4.php';
            include_once '../htconfig/conexion.php';
            ?>
            <div class="body-container">

                <div class="nav-bar btn-toolbar col-lg-2" >
                    <h3>Panel de Usuario</h3>
                    <ul class="ulist">
                        <li><a href="#perfil">Mi Perfil</a></li>
                        <li><a href="publica.php">Postular Carga</a></li>
                        <li><a href="#postuladas">Carga Potulada</a></li>
                        <li><a href="#verofertas">Ver Ofertas</a></li>
                        <li><a href="#historial">Historial de Envios</a></li>
                        <li><a href="#rastreo">Rastreo de Carga</a></li>
                        <li><a href="#notificaciones">Notificaciones</a></li>
                        <li><a id="red1" href="logout.php">Salir</a></li>
                    </ul>
                    <h3>Panel de Usuario</h3>
                    <ul class="ulist" id="ul2">
                        <button><li><a href="#perfil">Mi Perfil</a></li></button>
                        <button><li><a href="publica.php">Postular Carga</a></li></button>
                        <button><li><a href="#postuladas">Carga Potulada</a></li></button>
                        <button><li><a href="#verofertas">Ver Ofertas</a></li></button>
                        <button><li><a href="#historial">Historial de Envios</a></li></button>
                        <button><li><a href="#rastreo">Rastreo de Carga</a></li></button>
                        <button><li><a href="#notificaciones">Notificaciones</a></li></button>
                        <button><li><a id="red2" href="logout.php">Salir</a></li></button>
                    </ul>
                </div>

                <div id="contenido" class="col-lg-10">
                    <div id="perfil">

                        <h3>Mi Perfil</h3>
                        <br>
                        <?php
                        $sql = "SELECT * FROM generador WHERE usuario='$user'";

                        $query = $dbConnected->query($sql);
                        if ($query) {

                            $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                            $empresa_persona = $row['empresa_persona'];
                            $nombres = $row['nombres'];
                            $apellidos = $row['apellidos'];
                            $empresa = $row['empresa'];
                            $correo = $row['correo'];
                            $celular = $row['celular'];
                            $tipo_negocio = $row['tipo_negocio'];
                            $departamento = $row['departamento'];
                            $ciudad = $row['ciudad'];
                            $tipodocumento = $row['tipodocumento'];
                            $numerodocumento = $row['numerodocumento'];
                            $telefono = $row['telefono'];
                            $dep_origen = $row['dep_origen'];
                            $ciudadorigen = $row['ciudadorigen'];
                            $dep_destino = $row['dep_destino'];
                            $ciudaddestino = $row['ciudaddestino'];
                            $altocarga = $row['altocarga'];
                            $anchocarga = $row['anchocarga'];
                            $largocarga = $row['largocarga'];
                            $pesocarga = $row['pesocarga'];
                            ?>

                            <table id="perfil">
                                <h4>Datos de Contacto</h4>
                                <tr>
                                    <td>
                                        Empresa?
                                    </td>
                                    <td>
                                        <?php echo $empresa_persona ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Nombres 
                                    </td>
                                    <td>
                                        <?php echo $nombres ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Apellidos 
                                    </td>
                                    <td>
                                        <?php echo $apellidos ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        E-mail 
                                    </td>
                                    <td>
                                        <?php echo $correo ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Celular 
                                    </td>
                                    <td>
                                        <?php echo $celular ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Empresa 
                                    </td>
                                    <td>
                                        <?php echo $empresa ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tipo de Identificación
                                    </td>
                                    <td>
                                        <?php echo $tipodocumento ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Numero de Identificación
                                    </td>
                                    <td>
                                        <?php echo $numerodocumento ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Teléfono Empresa
                                    </td>
                                    <td>
                                        <?php echo $telefono ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tipo de Negocio
                                    </td>
                                    <td>
                                        <?php echo $tipo_negocio ?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        Departamento
                                    </td>
                                    <td>
                                        <?php echo $departamento ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Ciudad
                                    </td>
                                    <td>
                                        <?php echo $ciudad ?>
                                    </td>
                                </tr>
                            </table>

                            <table>
                                <h4>Envios Frecuentes</h4>
                                <tr>
                                    <td>
                                        Departamento Origen
                                    </td>
                                    <td>
                                        <?php echo $dep_origen ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Ciudad Origen
                                    </td>
                                    <td>
                                        <?php echo $ciudadorigen ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Departamento Destino
                                    </td>
                                    <td>
                                        <?php echo $dep_destino ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Ciudad Destino
                                    </td>
                                    <td>
                                        <?php echo $ciudaddestino ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Alto
                                    </td>
                                    <td>
                                        <?php echo $altocarga ?>cm
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Ancho
                                    </td>
                                    <td>
                                        <?php echo $anchocarga ?>cm
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Largo
                                    </td>
                                    <td>
                                        <?php echo $largocarga ?>cm
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Peso
                                    </td>
                                    <td>
                                        <?php echo $pesocarga ?>kg
                                    </td>
                                </tr>

                            </table>

                            <?php
                        }
                        ?>

                    </div>
                    <div id="postuladas">

                        <h3>Carga Postulada</h3>
                        <br>


                        <?php
                        $sql = "SELECT * FROM publicacarga WHERE usuario='$user'";

                        $query = $dbConnected->query($sql);
                        if ($query) {
                            /*   echo'<script type="text/javascript">
                              alert("Se realizo la consulta");
                              </script>'; */
                            ?>
                            <table id="publicada">
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha y Hora</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Cantidad</th>
                                    <th>Empaques</th>
                                    <th>Peso</th>
                                </tr>

                                <?php
                                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                    $id_publica = $row['id_publica'];
                                    $fechapublicacion = $row['fechapublicacion'];
                                    $dep_origen = $row['dep_origen'];
                                    $ciudadorigen = $row['ciudadorigen'];
                                    $dep_destino = $row['dep_destino'];
                                    $ciudaddestino = $row['ciudaddestino'];
                                    $numeroempaques = $row['numeroempaques'];
                                    $empaque = $row['empaque'];
                                    $pesoTotal = $row['pesoTotal'];
                                    ?>  
                                    <tr>
                                        <td><?php echo $id_publica ?> </td>
                                        <td><?php echo $fechapublicacion ?></td>
                                        <td><?php echo $ciudadorigen . ', ' . $dep_origen ?></td>
                                        <td><?php echo $ciudaddestino . ', ' . $dep_destino ?></td>
                                        <td><?php echo $numeroempaques ?></td>
                                        <td><?php echo $empaque ?></td>
                                        <td><?php echo $pesoTotal. ' Kg' ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <?php
                        }
                        ?>

                    </div>
                    <div id="verofertas">

                        <h3>Ofertas Recibidas</h3>
                        <br>

                        <?php
                        $sql1 = "SELECT * FROM publicacarga WHERE usuario='$user'";

                        $query1 = $dbConnected->query($sql1);
                        if ($query1) {
                            /*   echo'<script type="text/javascript">
                              alert("Se realizo la consulta");
                              </script>'; */
                            ?>
                            <table id="publicada">
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Cantidad</th>
                                    <th>Empaques</th>
                                    <th>Peso</th>
                                </tr>

                                <?php
                                while ($row = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                                    $id_publica = $row['id_publica'];
                                    $fechapublicacion = $row['fechapublicacion'];
                                    $dep_origen = $row['dep_origen'];
                                    $ciudadorigen = $row['ciudadorigen'];
                                    $dep_destino = $row['dep_destino'];
                                    $ciudaddestino = $row['ciudaddestino'];
                                    $numeroempaques = $row['numeroempaques'];
                                    $empaque = $row['empaque'];
                                    $pesoTotal = $row['pesoTotal'];
                                    $transportador = $row['empaque'];
                                    $oferta = $row['pesoTotal'];
                                    ?>  
                                    <tr>
                                        <td><?php echo $id_publica ?> </td>
                                        <td><?php echo $fechapublicacion ?></td>
                                        <td><?php echo $ciudadorigen . ', ' . $dep_origen ?></td>
                                        <td><?php echo $ciudaddestino . ', ' . $dep_destino ?></td>
                                        <td><?php echo $numeroempaques ?></td>
                                        <td><?php echo $empaque ?></td>
                                        <td><?php echo $pesoTotal . ' Kg' ?></td>
                                        <td><?php echo $transportador ?></td>
                                        <td><?php echo $oferta . ' Kg' ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <?php
                        }
                        ?>
                    </div>
                    <div id="historial">

                        <h3>Historial</h3>
                        <br>
                        <?php
                        $sql1 = "SELECT * FROM publicacarga WHERE usuario='$user'";

                        $query1 = $dbConnected->query($sql1);
                        if ($query1) {
                            /*   echo'<script type="text/javascript">
                              alert("Se realizo la consulta");
                              </script>'; */
                            ?>
                            <table id="publicada">
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Cantidad</th>
                                    <th>Empaques</th>
                                    <th>Peso</th>
                                </tr>

                                <?php
                                while ($row = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {
                                    $id_publica = $row['id_publica'];
                                    $fechapublicacion = $row['fechapublicacion'];
                                    $dep_origen = $row['dep_origen'];
                                    $ciudadorigen = $row['ciudadorigen'];
                                    $dep_destino = $row['dep_destino'];
                                    $ciudaddestino = $row['ciudaddestino'];
                                    $numeroempaques = $row['numeroempaques'];
                                    $empaque = $row['empaque'];
                                    $pesoTotal = $row['pesoTotal'];
                                    $transportador = $row['empaque'];
                                    $oferta = $row['pesoTotal'];
                                    ?>  
                                    <tr>
                                        <td><?php echo $id_publica ?> </td>
                                        <td><?php echo $fechapublicacion ?></td>
                                        <td><?php echo $ciudadorigen . ', ' . $dep_origen ?></td>
                                        <td><?php echo $ciudaddestino . ', ' . $dep_destino ?></td>
                                        <td><?php echo $numeroempaques ?></td>
                                        <td><?php echo $empaque ?></td>
                                        <td><?php echo $pesoTotal . ' Kg' ?></td>
                                        <td><?php echo $transportador ?></td>
                                        <td><?php echo $oferta . ' Kg' ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <?php
                        }
                        ?>

                    </div>
                    <div id="rastreo">

                        <h3>Carga en Transito</h3>
                        <br>
                        <p>Hay que crear tabla con notificaciones recibidas</p>

                    </div>

                    <div id="notificaciones">

                        <h3>Notificaciones Recibidas</h3>
                        <br>
                        <p>Hay que crear tabla con notificaciones recibidas</p>

                    </div>

                </div>
            </div>
        </div>
        <?php
        $dbConnected->close();
        ?>
    </body>
</html>
