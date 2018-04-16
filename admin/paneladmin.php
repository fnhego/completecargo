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
        <link href="../css/normalize.css" rel="stylesheet" type='text/css'>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/estilo.css" rel="stylesheet">
        <script src="../js/jquery-3.2.1.js"></script>
        <script src="../js/funciones.js"></script>

    </head>
    <body>
        <div class="main-container">

            <?php
            //include_once 'nav-bar4.php';
            include_once '../../htconfig/conexion.php';
            include_once 'nav-bar4.php';
            ?>
            <div class="body-container">

                <div class="nav-bar btn-toolbar col-lg-2" >
                    <h3>Panel de Usuario</h3>
                    <ul class="ulist">
                        <li><a href="#perfil">Mi Perfil</a></li>
                        <li><a href="#publica">Ofertas Disponibles</a></li>
                        <li><a href="#postuladas">Ofertas Contratadas</a></li>
                        <li><a href="#verofertas">Carga Potulada</a></li>
                        <li><a href="#historial">Detalle de Subasta</a></li>
                        <li><a href="#generadores">Generadores Registrados</a></li>
                        <li><a href="#conductores">Conductores Registrados</a></li>
                        <li><a id="red1" href="logout.php">Salir</a></li>
                    </ul>
                    <h3>Panel de Usuario</h3>
                    <ul class="ulist" id="ul2">
                        <button><li><a href="#perfil">Mi Perfil</a></li></button>
                        <button><li><a href="#publica">Ofertas Disponibles</a></li></button>
                        <button><li><a href="#postuladas">Ofertas Contratadas</a></li></button>
                        <button><li><a href="#verofertas">Carga Potulada</a></li></button>
                        <button><li><a href="#historial">Detalle de Subasta</a></li></button>
                        <button><li><a href="#generadores">Generadores Registrados</a></li></button>
                        <button><li><a href="#conductores">Conductores Registrados</a></li></button>
                        <button><li><a id="red2" href="logout.php">Salir</a></li></button>
                    </ul>
                </div>

                <div id="contenido" class="col-lg-10">
                    <div id="perfil">

                        <h3>Mi Perfil</h3>
                        <br>
                        <?php
                        $sql = "SELECT * FROM administra WHERE usuario='$user'";

                        $query = $dbConnected->query($sql);
                        if ($query) {

                            $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
                            
                            $nombres = $row['nombres'];
                            $apellidos = $row['apellidos'];
                            $cargo = $row['cargo'];
                            $privilegios = $row['privilegios'];
                            
                            ?>

                            <table id="perfil">
                                <h4>Datos de Contacto</h4>
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
                                        Cargo
                                    </td>
                                    <td>
                                        <?php echo $cargo ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Privilegios 
                                    </td>
                                    <td>
                                        <?php echo $privilegios ?>
                                    </td>
                                </tr>
                                

                            </table>

                            <?php
                        }
                        ?>

                    </div>
                    <div id="publica">

                        <h3>Carga Postulada</h3>
                        <br>


                        <?php
                        $sql = "SELECT * FROM publicacarga";

                        $query = $dbConnected->query($sql);
                        if ($query) {
                            /*   echo'<script type="text/javascript">
                              alert("Se realizo la consulta");
                              </script>'; */
                            ?>
                            <table id="publicada">
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>
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
                                    $usuario = $row['usuario'];
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
                                        <td><?php echo $usuario ?> </td>
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
                    <div id="postuladas">

                        <h3>Carga Postulada</h3>
                        <br>


                        <?php
                        $sql = "SELECT * FROM publicacarga";

                        $query = $dbConnected->query($sql);
                        if ($query) {
                            /*   echo'<script type="text/javascript">
                              alert("Se realizo la consulta");
                              </script>'; */
                            ?>
                            <table id="publicada">
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>
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
                                    $usuario = $row['usuario'];
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
                                        <td><?php echo $usuario ?> </td>
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
                    <div id="generadores">

                        <h3>Carga en Transito</h3>
                        <br>
                        <?php
                        $sql = "SELECT * FROM generador";

                        $query = $dbConnected->query($sql);
                        if ($query) {
                            /*   echo'<script type="text/javascript">
                              alert("Se realizo la consulta");
                              </script>'; */
                            ?>
                            <table id="generador">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Usuario</th>
                                    <th>Empresa</th>
                                    <th>Correo</th>
                                    <th>Celular</th>
                                    <th>Tipo Negocio</th>
                                    <th>Dirección</th>
                                    <th>Ciudad</th>
                                    <th>Departamento</th>
                                    
                                    
                                </tr>

                                <?php
                                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                    $id_user = $row['id_user'];
                                    $nombres = $row['nombres'];
                                    $apellidos = $row['apellidos'];
                                    $usuario = $row['usuario'];
                                    $empresa = $row['empresa'];
                                    $correo = $row['correo'];
                                    $celular = $row['celular'];
                                    $tipo_negocio = $row['tipo_negocio'];
                                    $direccion = $row['direccion'];
                                    $ciudad = $row['ciudad'];
                                    $departamento = $row['departamento'];
                                    
                                    
                                    ?>  
                                    <tr>
                                        <td><?php echo $id_user ?> </td>
                                        <td><?php echo $nombres ?> </td>
                                        <td><?php echo $apellidos ?> </td>
                                        <td><?php echo $usuario ?> </td>
                                        <td><?php echo $empresa ?> </td>
                                        <td><?php echo $correo ?> </td>
                                        <td><?php echo $celular ?> </td>
                                        <td><?php echo $tipo_negocio ?></td>
                                        <td><?php echo $direccion ?></td>
                                        <td><?php echo $ciudad ?></td>
                                        <td><?php echo $departamento ?></td>
                                        
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <?php
                        }
                        ?>
                    </div>

                    <div id="conductores">

                        <h3>Notificaciones Recibidas</h3>
                        <br>
                         <?php
                        $sql = "SELECT * FROM conductor";

                        $query = $dbConnected->query($sql);
                        if ($query) {
                            /*   echo'<script type="text/javascript">
                              alert("Se realizo la consulta");
                              </script>'; */
                            ?>
                            <table id="conductor">
                                <tr>
                                    <th>Id</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Usuario</th>
                                     <th>Correo</th>
                                    <th>Celular</th>
                                    <th>Tipo Doc.</th>
                                    <th>Número Documento</th>
                                    <th>Dirección</th>
                                    <th>Ciudad</th>
                                    <th>Departamento</th>
                                    <th>Empresa</th>
                                    
                                    
                                </tr>

                                <?php
                                while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                    $id_user = $row['id_user'];
                                    $nombres = $row['nombres'];
                                    $apellidos = $row['apellidos'];
                                    $usuario = $row['usuario'];
                                    $correo = $row['correo'];
                                    $celular = $row['celular'];
                                    $tipodocumento = $row['tipodocumento'];
                                    $numerodocumento = $row['numerodocumento'];
                                    $direccion = $row['direccion'];
                                    $ciudad = $row['ciudad'];
                                    $departamento = $row['departamento'];
                                    $empresa = $row['empresatransporte'];
                                    
                                    
                                    ?>  
                                    <tr>
                                        <td><?php echo $id_user ?> </td>
                                        <td><?php echo $nombres ?> </td>
                                        <td><?php echo $apellidos ?> </td>
                                        <td><?php echo $usuario ?> </td>
                                        <td><?php echo $correo ?> </td>
                                        <td><?php echo $celular ?> </td>
                                        <td><?php echo $tipodocumento ?></td>
                                        <td><?php echo $numerodocumento ?></td>
                                        <td><?php echo $direccion ?></td>
                                        <td><?php echo $ciudad ?></td>
                                        <td><?php echo $departamento ?></td>
                                        <td><?php echo $empresa ?> </td>
                                        
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <?php
                        }
                        ?>

                    </div>

                </div>
                <?php
                include_once 'footer.php';
                ?>
            </div>
        </div>
        <?php
        $dbConnected->close();
        
        ?>
    </body>
</html>
