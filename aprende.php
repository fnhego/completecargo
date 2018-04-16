<!DOCTYPE html>
<!--
Proyecto: Complete Cargo
File: aprende.php
Programador: Ing. Fredy Hernández
Fecha: $date
-->
<html>
    <head>
        <title>Aprende</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='img/complete_logo.ico' rel='shortcut icon' type='image/x-icon'>
        
        <link href="css/normalize.css" rel="stylesheet" type='text/css'>
        <link href="css/estilo.css" rel="stylesheet" type='text/css' />

    </head>
    <body>
        <div class="main-container">
        <?php
        include_once 'nav-bar.php';
        ?>
        <div class="body-container">
            
            <div class="central-container">
                <div id="img">
                    <div class="label-container1">
                    <div class="label1 ">
                        Usamos la Tecnología para hacer más Fácil, Seguro, y Eficiente
                        el Transporte de Carga.
                    </div>
                        </div>
                    <div class="label-container2">
                    <div class="label2  ">
                        Complete Cargo construye la más amplia Red de Transportistas 
                        Confiables para atender todas las Demandas de Transporte de 
                        nuestros Clientes.
                    </div>
                   </div>
                     <img id="main" src="img/fondo_blue_color.jpg" width="1328" height="561">
                    <div class="botones">   
                        <a href="transportacarga.php">Transporta tu Carga</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="conductor1.php">Registra tu Camión</a> 
                    </div>
                </div>
            </div>
            <div class="cuerpo">
                <section>
                    <h2 class="h2">Quienes Somos?</h2>
                    <p>Complete Cargo es una Empresa de Base Tecnológica que proporciona 
                        el acceso a una Red de Transporte Privado. Los Generadores de Carga
                        postulan sus necesidades de Transporte de Mercancías a través de una
                        Aplicación Web y, los Transportistas postulan sus Ofertas a través
                        de una APP móvil.
                    </p>
                    <P>El mecanismo de selección es un algoritmo entre la menor Oferta
                        (Subasta Inversa)  y el Sistema de Calificación y Experiencias
                        de los Transportistas (CRM); lo cual le permite al Generador de
                        Carga escoger la opción de su interés. Complete Cargo es la mejor
                        herramienta para que los Transportistas puedan encontrar de manera
                        rápida, segura y práctica carga (complete) sobre sus Rutas de Transporte.
                    </P>
                    <P>Complete Cargo es una Plataforma confiable, intuitiva y segura en donde
                        los Generadores de Carga comparten sus necesidades de movimiento de 
                        mercancías y satisfacen sus requerimientos de envío.
                    </P>
                    <p>Como Intermediario Tecnológico, Complete Cargo posee una Plataforma
                        Robusta mediante la cual filtra constantemente la Oferta de Carga
                        y los Perfiles de los Transportistas; con el fin único de realizar 
                        Controles de Calidad y Trazabilidad durante todo el proceso.
                        Complete Cargo posee una Red de Transportistas Locales y Camioneros 
                        Autónomos, con más de 1.000 vehículos registrados.
                        Mediante el uso de la las TIC’S y el Big Data Complete Cargo puede 
                        proporcionar conexión en Servicios de Transporte con Calidad y Agilidad,
                        previendo variaciones de la Oferta en la Flota e Identificando 
                        Rutas Ociosas. De esta forma se optimizan los Espacios de Carga
                        y Viajes Vacíos, a fin de ofrecer a los Generadores de Carga que 
                        necesitan Transportar sus productos, un Transporte Calificado, 
                        Seguro y Económico.
                    </p>
                </section>
            </div>
            <?php
            include_once 'footer.php';
            ?>
        </div>
            </div>
    </body>
</html>
