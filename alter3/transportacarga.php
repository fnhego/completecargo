<!DOCTYPE html>
<!--
Proyecto: Complete Cargo
File: transportacarga.php
Programador: Ing. Fredy Hernández
Fecha: 2017-08-02
-->

<html>
    <head>
        <title>Transportacarga</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--   <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
           <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
           <link rel="stylesheet" href="css/normalize.css" />  -->
        <link rel="stylesheet" href="css/estilo.css" />
    </head>
    <body>
        <?php
        include_once 'nav-bar.php';
        ?>
        <div class="body-container wrapper">
            <div class="label1 label-container text-center">
                Usamos la Tecnología para hacer más Fácil, Seguro, y Eficiente el Transporte de Carga.
            </div>        
            <div class="central-container">
                <div id="img">
                    <!--  <p id="p1" >Usamos la Tecnología para hacer más fácil, seguro,
                    y eficiente al Transporte de Carga.</p> -->
                    <img id="main" src="img/Lorry Driver Modified 2.jpg" width="1328" height="561">
                    <div class="botones">   
                        <a href="#">Recibe Cotización</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="generador1.php">Regístrate</a> 
                    </div>
                </div>
            </div>
            <div class="label2 label-container text-center">
                Complete Cargo construye la más amplia Red de Transportistas 
                Confiables para atender todas las Demandas de Transporte de nuestros Clientes.
            </div>
            <div class="cuerpo2">
                <section id="section">
                    <h1>Qué busca <img id="complete" src="img/logo_letters_gris.jpg" width="190" height="45">?</h1>
                    <p>Complete busca utilizar su tecnología para conectar a la mas 
                        amplia y confiable Red de Transportistas con las diferentes
                        necesidades de transporte de carga de nuestros Clientes.
                    </p>
                    <P>Nuestra Tecnología nos permite dar una respuesta rápida, nos permite 
                        operar de una manera segura, nos permite transportar cualquier 
                        Carga  y nos permite ser económicos al dar un mejor uso a los
                        espacios y viajes vacíos de nuestros Transportistas.
                    </P>
                    <p class="negrita">Complete busca que nuestros Transportistas ganen más y que nuestros 
                        clientes gasten y arriesguen menos.</p>
                </section>
                <section>
                    <div>
                        <h1>Cómo lo hacemos?</h1>
                    </div>
                    <br><br>
                    <div class='video'>
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/G4Kh-vW92lk" frameborder="0" allowfullscreen></iframe>
                    </div>
                </section>
                <section>
                    <div>
                        <h1>Proceso</h1>
                    </div>
                    <div class="cuadro">
                        <img id="cuadro" src="img/1.jpg" width="150" height="100">
                        <p>Recibimos la necesidad de Carga de nuestro Cliente.</p>
                    </div>
                    <div class="cuadro">
                        <img id="cuadro" src="img/2.jpg" width="150" height="100">
                        <p>Identificamos los Transportistas Aptos para la tarea y les informamos.</p>
                    </div>
                    <div class="cuadro">
                        <img id="cuadro" src="img/3.jpg" width="150" height="100">
                        <p>Recibimos las diferentes Ofertas y compartimos con nuestro Cliente.</p>
                    </div>
                    <div class="cuadro">
                        <img id="cuadro" src="img/4.jpg" width="150" height="150">
                        <p>Nuestro Cliente elige la opción de su preferencia.</p>
                    </div>
                    <div class="cuadro">
                        <img id="cuadro" src="img/5.jpg" width="150" height="100">
                        <p><font color="blue">Comienza el servicio.</font> Complete Cargo y el Cliente
                            hacen seguimiento en tiempo real.</p>
                    </div>
                    <div class="cuadro">
                        <img id="cuadro" src="img/6.jpg" width="150" height="100">
                        <p><font color="blue">Se termina el Servicio.</font> El Transportista ganó más, el Cliente gastó menos.</p>
                    </div>
                </section>
            </div>
            <?php
            include_once 'footer.php';
            ?>
        </div>
    </body>
</html>
