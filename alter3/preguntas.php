<!DOCTYPE html>
<!--
Proyecto: Complete Cargo
File: preguntas.php
Programador: Ing. Fredy Hernández
Fecha: $date
-->
<html>
    <head>
        <title>Preguntas Frecuentes</title>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
            <link href="css/normalize.css" rel="stylesheet" type='text/css'>
            <link href="css/estilo.css" rel="stylesheet" type='text/css' />

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
                    <!--  
                    width="1328" height="561" _blue_con_mensajes_f
                    -->  
                    <img id="main" src="img/Lorry Driver Modified 2.jpg" width="1328" height="561"> 
                    <div class="botones">   
                        <a href="transportacarga.html">Transporta tu Carga</a>
                        &nbsp;&nbsp;&nbsp;
                        <a href="conductor1.php">Registra tu Camión</a> 
                    </div>
                </div>

            </div>
            <div class="label2 label-container text-center">
                Complete Cargo construye la más amplia Red de Transportistas 
                Confiables para atender todas las Demandas de Transporte de nuestros Clientes.
            </div>
            <div class="cuerpo">
                <section>
                    <h1>Preguntas Frecuentes?</h1>
                    <br>
                    <h2>Complete Cargo es Gratis?</h2>
                    <p>Tanto la Plataforma Web como la APP son 100% gratis.
                    </p>
                     <br>
                    <h2>Cómo gana Complete Cargo?</h2>
                    <P>Complete Cargo sólo o gana solo si el Transportista Gana.
                        Cobramos una Comisión sobre el Servicio realizado.
                    </P>
                     <br>
                    <h2>Cómo me paga Complete Cargo?</h2>
                    <P>El Cliente (Generador de Carga) hace el depósito por adelantado.
                        Complete Cargo garantiza el pago inmediato una vez se valide 
                        el servicio y se emita la factura.
                    </P>
                     <br>
                    <h2>Qué alcance tiene Complete Cargo?</h2>
                    <p>Complete Cargo cubre todo Transporte de Carga Terrestre, 
                        incluyendo Cargas Consolidadas, pero no Paquetería. Complete
                        Cargo no cubre Transporte Marítimo ni Aéreo.
                    </p>
                     <br>
                    <h2>Quieres formar parte del equipo?</h2>
                    <p>Complete Cargo es un equipo de expertos en Tecnología y 
                        Logística, entusiasmados con la oportunidad de cambiar 
                        la forma de Transportar Cargas en Colombia y luego en 
                        Latinoamérica. Amantes de los Desafíos, estamos trabajando 
                        para eliminar las ineficiencias del Transporte tradicional 
                        identificando las mejores Oportunidades para mover las 
                        Cargas de nuestros Clientes, usando Tecnología, GPS, Big 
                        Data, Machine Learning, Trabajo de Equipo y Actitud.
                    </p>
                </section>
            </div>
            <?php
            include_once 'footer.php';
            ?>
        </div>
    </body>
</html>
