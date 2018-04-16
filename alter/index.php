<!DOCTYPE html>
<!--
Proyecto: Complete Cargo
File: 
Programador: Ing. Fredy Hernández
Fecha: $date
-->
<html>
    <head>
        <title>CompleteCargo</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="css/normalize.css" rel="stylesheet" type='text/css'>
        <link href="css/estilo.css" rel="stylesheet" type='text/css'>
    </head>
    <body>
        <?php
        include_once 'nav-bar.php';
        ?>
        <div class="central-container wrapper">
            <div id="img">
                <!--  <p id="p1" >Usamos la Tecnología para hacer más fácil, seguro, y eficiente al Transporte de Carga.</p>
                width="1328" height="561"
                -->  
                <img id="main" src="img/fondo_blue.jpg" width="1328" height="561"> 
                <div class="botones">   
                    <a href="transportacarga.php">Transporta tu Carga</a>
                     &nbsp;&nbsp;&nbsp;
                    <a href="conductor1.php">Registra tu Camión</a> 
                </div>
            </div>
        </div>
        <div class="cuerpo wrapper" >
            <div id="text">
                <h1>Página Web en Construcción<br /></h1>
            </div>
            <div class="central">
                <div>
                    <h1>Ahorro</h1>
                    <p class="parrafo">
                        Nuestra forma de actuar reduce los Costos de Transporte.          
                    </p>
                    <div>
                        <img id="economia" src="img/economia.png">    
                    </div>
                </div>
                <div>
                    <h1>Confianza</h1>
                    <p class="parrafo">
                        Tu Carga está asegurada y llevada por un Transportista referenciado.
                    </p>
                    <div>
                        <img id="alcance" src="img/alcance.png">    
                    </div>
                </div>
                <div>
                    <h1>Flexibilidad</h1>
                    <p class="parrafo">Cualquier Carga, desde cualquier Origen a cualquier Destino.
                    </p>
                    <div>
                        <img id="flexibilidad" src="img/flexibilidad.png">    
                    </div>
                </div>
                <div>
                    <h1>Tecnología</h1>
                    <p class="parrafo">A un par de Clicks de toda la Gestión, Control, y Rastreo GPS de tu Carga.
                    </p>
                    <div>
                        <img id="tecnologia" src="img/tecnologia.png">    
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <section id="section">
                <h1>Qué busca <img id="complete" src="img/logo_letters_blue.jpg" width="190" height="45">?</h1>
                <p>Complete busca utilizar su tecnología para conectar a la mas 
                    amplia y confiable red de transportistas con las diferentes
                    necesidades de transporte de carga de nuestros clientes.
                </p>
                <P>Nuestra Tecnología nos permite dar una respuesta rápida, nos permite 
                    operar de una manera segura, nos permite transportar cualquier 
                    carga  y nos permite ser económicos al dar un mejor uso a los
                    espacios y viajes vacíos de nuestros transportistas.
                </P>
                <p class="negrita">Complete busca que nuestros transportistas ganen más y que nuestros 
                    clientes gasten y arriesguen menos.</p>
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
    </body>
</html>
