<?php include 'conexion.php'; ?>
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

        </style>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script src="functions.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>


    </head> 

    <body>

        <div id="formulario">
            <form action="contacto.php" method="post">    
                <div class="form-group"> <!-- -->
                    <label for="departamento" class="control-label">Departamento</label> 
                    <select class="form-control" name="departamentos" id="departamentos" required>
                        <option value="0">Seleccione</option>
                    </select>
                </div> 


                <div class="form-group"> <!-- -->
                    <label for="ciudad" class="control-label">Ciudad</label> 
                    <select class="form-control" name="municipios" id="municipios" required>
                        <option value="0">Seleccione</option>
                    </select>  
                </div>  

                <script>

                    $(function () {

                        // Lista de deprtamentos
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
                                $('#municipios').html(respuesta);
                            });
                        });

                        // Lista de municipios
                        $('#municipios').change(function ()
                        {
                            var municipio = $(this).children('option:selected').html();

                        });

                    })
                </script> 

                <div class="form-group"> <!--  -->
                    <label for="direcciono" class="control-label">Direccion</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Direccion de Origen" required >
                </div>   

                <br>

                <div class="form-group"> <!-- nombres -->
                    <label for="docu" class="control-label">Tipo de Documento</label>
                    <select class="form-control" name="docu" id="docu" required>
                        <option value="0">Seleccione</option>
                        <option value="CC">Cedula</option>
                        <option value="NIT">Nit</option>
                        <option value="CE">Cedula Extrangeria</option>
                        <option value="PA">Pasaporte</option>
                    </select>
                </div> 

                <div class="form-group"> <!-- apellidos -->
                    <label for="documento" class="control-label">Numero de Documento</label>
                    <input type="text" class="form-control" id="documento" name="documento" placeholder="Numero de Documento" required>
                </div> 

                <div class="form-group"> <!--  -->
                    <label for="tel" class="control-label">Telefono Empresa</label>
                    <input type="text" class="form-control" id="tel" name="tel" placeholder="Telefono Empresa" required>
                </div> 


                <div class="form-group"> <!-- nombres -->
                    <label for="condi" class="control-label">Terminos y condiciones</label>
                    <input   type="checkbox" id="condiciones" name="condiciones" required >
                </div>  


                <div class="form-group"> <!--  -->
                    <button type="submit" id="enviar" class="btn btn-primary">ENVIAR</button>
                </div>



            </form>
        </div>
    </body>
</html>
<?php
if (isset($_POST['guardar'])) {
    //Guardamos en variables los datos enviados

    $depo = $_POST['departamentos'];
    $muno = $_POST['municipios'];
    $dir = $_POST['direccion'];
    $tipdoc = $_POST['docu'];
    $numdoc = $_POST['documento'];
    $telefono = $_POST['tel'];
    $condic = $_POST['condiciones'];





    $sql = "INSERT INTO `generador` (``,``,``,``,``,``) VALUES('$depo','$muno','$dir','$tipdoc','$numdoc','$telefono','condic')";

    $query = $conexion->query($sql);
    if ($query) {
        echo'<script type="text/javascript">
                        alert("Se guardo correctamente");
               
                        </script>';
    } else {
        echo '<script type="text/javascript">
        alert("no pudo guardarse") </script>';
    }
}
?>