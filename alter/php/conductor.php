<?php include 'conexion2.php'; ?>
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
<header><h1>CONDUCTOR</h1></header>

<div id="formulario">
   <form action="" method="post">

    <div class="form-group"> <!-- nombres -->
        <label for="nombres" class="control-label">Nombres</label>
        <input type="text" class="form-control" id="nombres" name="nombres" placeholder="Nombres" required>
    </div> 
    
    <div class="form-group"> <!-- apellidos -->
        <label for="apellidos" class="control-label">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
    </div> 
    <div class="form-group"> <!--  -->
        <label for="cel" class="control-label">Celular</label>
        <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular" required>
    </div> 
    
    <div class="form-group"> <!--  -->
        <label for="email" class="control-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>

     <div class="form-group"> <!--  -->
        <label for="empresa" class="control-label">Empresa</label>
        <input type="text" class="form-control" id="empresa" name="empresa" placeholder="Nombre de la empresa" required>
    </div>  
    
    
    <br>
    
    <div class="form-group"> <!-- -->
        <label for="departamentoo" class="control-label">Departamento</label> 
    <select class="form-control" name="departamentos" id="departamentos" required>
  <option value="0">Seleccione</option>
</select>
</div> 
    
    
    <div class="form-group"> <!-- -->
        <label for="municipio" class="control-label">Ciudad de Mayor Permanencia</label> 
    <select class="form-control" name="municipio" id="municipio" required>
  <option value="0">Seleccione</option>
</select>  
    </div>  

    <script>

    $(function(){

    // Lista de departamentos
    $.post( 'departamentos.php' ).done( function(respuesta)
    {
        $( '#departamentos' ).html( respuesta );
    });

    // lista de departamentos
    $('#departamentos').change(function()
    {
        var el_continente = $(this).val();
        
        // Lista de municipios
        $.post( 'municipios.php', { continente: el_continente} ).done( function( respuesta )
        {
            $( '#municipio' ).html( respuesta );
        });
    });
    
    // Lista de municipios
    $( '#municipio' ).change( function()
    {
        var municipio = $(this).children('option:selected').html();
        //alert( 'Lista de Municipios de ' + municipio );
    });

})
</script> 

    <br>
    <div class="form-group"> <!--  -->
        <label for="usuario" class="control-label">Usuario</label>
        <input type="text" class="form-control" id="usuario" name="usuario" placeholder="usuario" required>
    </div> 

    <div class="form-group"> <!--  -->
        
    <form id="formCheckPassword">
    <label for="pass" class="control-label">Contraseña</label>
    <input type="password" class="form-control" name="password" required id="password" placeholder="usuario" required/>
    <label for="cpass" class="control-label" required>Confirmar Contraseña</label>
    <input type="password" class="form-control" name="cfmPassword" id="cfmPassword" placeholder="contraseña" required />
 </form>
 <script></script>
       
    </div>                               
                            
        
    <div class="form-group"> <!--  -->
        <button type="submit" id="subir" name="subir" value="subir" class="btn btn-primary">ENVIAR</button>
    </div>
    
         
    
</form>
</div>
</body>
</html>

<?php
if(isset($_POST['subir'])){
    //Guardamos en variables los datos enviados
    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellidos'];
    $celular = $_POST['celular'];
    $mail = $_POST['email'];
    $empre=$_POST['empresa'];
    $depo =$_POST['departamentos'];
    $muno =$_POST['municipio'];
    $user=$_POST['usuario'];
    $pass=$_POST['password'];
    
   

 $sql = "INSERT INTO `conductor` (`nombres`,`apellidos`,`correo`,`celular`,`empresa`,`usuario`,`contraseña`) VALUES('$nombre','$apellido','$mail','$celular','$empre','$user','$pass')";

 $query = $dbConnected->query($sql);
            if($query){
                echo'<script type="text/javascript">
                        alert("Se guardo correctamente");
               
                        </script>'; } else{ 
        echo '<script type="text/javascript">
        alert("no pudo guardarse") </script>';
    } 
}

?>




