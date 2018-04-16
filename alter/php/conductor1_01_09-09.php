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
            <header><h1>Registro de Conductor</h1></header>
            <?php
            //print_r($_POST);
            //Verifica si hay datos almacenados
            if (isset($_POST['nombres']) && !empty($_POST['nombres']) && ($_POST['password'] == $_POST['cfmPassword'])) {
                //Guardamos en variables los datos enviados
                //echo "Almacenando datos";
                $nombre = $_POST['nombres']; //"fredy";//
                $apellido = $_POST['apellidos']; //"Hernandez"; //
                $celular = $_POST['celular']; //"23211112";//
                $mail = $_POST['email']; //"sjdsjd";
                //$empre = $_POST['empresa'];
                $depo = $_POST['departamentos']; //"Tolima";
                $muno = $_POST['municipio']; //"Espinal";
                $user = $_POST['usuario']; //"fnhego";//
                $pass = $_POST['password']; //"123";//
                include 'conexion2.php';

                $sql = "INSERT INTO conductor (nombres, apellidos, correo, celular, departamento, ciudad, usuario, password) VALUES('$nombre','$apellido','$mail','$celular','$depo','$muno','$user','$pass')";

                $query = $dbConnected->query($sql);
                if ($query) {
                    echo '<script type="text/javascript">
                        alert("Se guardo correctamente") </script>';
                    //Me reenvia a otra pagina despues de 2 segundos
                    $sql = "SELECT id_conductor, usuario FROM conductor WHERE usuario='$user'"; //
                    $query = $dbConnected->query($sql);

                    if ($query) {
                        while ($row = $query->fetch_assoc()) {
                            echo $row['id_conductor'];
                            echo "  ";
                            echo $row['usuario']."\n";
                            echo '<br>';
                        }
                    } else {
                        echo '<script type="text/javascript">
                        alert("No esta haciendo la consulta") </script>';
                    }
                    header("Refresh: 20; URL = conductor2.php");
                } else {
                    echo '<script type="text/javascript">
                        alert("no pudo guardarse") </script>';
                }
            } else {
                ?>
                <div id="formulario">
                    <form name="formulario" action="" method="POST">
                        <div class="form-group"> <!-- nombres -->
                            <label for="nombres" class="control-label">Nombres</label>
                            <input type="text" class="form-control" id="nombres" 
                                   name="nombres" placeholder="Nombres" required="required">                                  
                        </div> 

                        <div class="form-group"> <!-- apellidos -->
                            <label for="apellidos" class="control-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" 
                                   name="apellidos" placeholder="Apellidos" required="required">
                        </div> 
                        <div class="form-group"> <!--  -->
                            <label for="cel" class="control-label">Celular</label>
                            <input type="text" class="form-control" id="celular" 
                                   name="celular" placeholder="Celular" required="required">
                        </div> 

                        <div class="form-group"> <!--  -->
                            <label for="email" class="control-label">Email</label>
                            <input type="email" class="form-control" id="email" 
                                   name="email" placeholder="Email" required="required">
                        </div>
                        <div class="form-group"> <!-- -->
                            <label for="departamento" class="control-label">Departamento</label> 
                            <select class="form-control" name="departamentos" 
                                    id="departamentos" required="required">
                                <option value="0">Seleccione</option>
                            </select>
                        </div> 
                        <div class="form-group"> <!-- -->
                            <label for="municipio" class="control-label">Ciudad de Mayor Permanencia</label> 
                            <select class="form-control" name="municipio" 
                                    id="municipio" required="required">
                                <option value="0">Seleccione</option>
                            </select>  
                        </div>  

                        <script>

                            $(function () {

                                // Lista de departamentos
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
                                        $('#municipio').html(respuesta);
                                    });
                                });

                                // Lista de municipios
                                $('#municipio').change(function ()
                                {
                                    var municipio = $(this).children('option:selected').html();
                                    //alert( 'Lista de Municipios de ' + municipio );
                                });

                            })
                        </script> 

                        <br>
                        <div class="form-group"> <!--  -->
                            <label for="usuario" class="control-label">Usuario</label>
                            <input type="text" class="form-control" id="usuario" 
                                   name="usuario" placeholder="usuario" required="required">
                        </div> 

                        <div class="form-group"> <!--  -->

                            <div id="formCheckPassword">
                                <label for="pass" class="control-label">Contraseña</label>
                                <input type="password" class="form-control" 
                                       name="password" id="password" placeholder="contraseña" required="required">
                                <label for="cpass" class="control-label" >Confirmar Contraseña</label>
                                <input type="password" class="form-control" 
                                       name="cfmPassword" id="cfmPassword" placeholder="contraseña" required="required">
                            </div>
                            <script>
                                var password = document.getElementById("password")
                                        , confirm_password = document.getElementById("cfmPassword");

                                function validatePassword() {
                                    if (password.value != confirm_password.value) {
                                        confirm_password.setCustomValidity("Las Contraseñas no son iguales");
                                    } else {
                                        confirm_password.setCustomValidity('');
                                    }
                                }
                                password.onchange = validatePassword;
                                confirm_password.onkeyup = validatePassword;
                            </script>
                        </div>                               
                        <div class="form-group"> <!--  -->
                            <button type="submit" id="subir" name="enviar" value="enviar" class="btn btn-primary">ENVIAR</button>

                        </div>
                    </form>
                </div>
    <?php
    //print_r($_POST);
}
?>
        </body>
    </html>

