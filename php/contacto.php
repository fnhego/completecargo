<?php
include 'conexion.php';

//Comprobamos que se haya presionado el boton enviar
if(isset($_POST['enviar'])){
	//Guardamos en variables los datos enviados
	$nombre = $_POST['nombres'];
	$apellido = $_POST['apellidos'];
	$mail = $_POST['mail'];
	$celular = $_POST['celular'];
	$ciudad = $_POST['ciudad'];
	$departamento =$_POST['departamento'];
	$direccion = $_POST['direccion'];
	$documento = $_POST['documento'];
	$id = $_POST['id'];
	
	$sql = "INSERT INTO `contacto` (`idusuario`, `Unombre`,`Uapellid`,`Uemail`,`Ucelu`,`Udirec`,`UTdoc`,`Uciu`,`Udepa`) VALUES				('$id','$nombre','$apellido','$mail','$celular','$direccion','$documento','$ciudad','$departamento')";

 $query = $conexion->query($sql);
            if($query){
                echo'<script type="text/javascript">
                        alert("Se guardo correctamente");
               
                        </script>'; } else{ 
        echo '<script type="text/javascript">
        alert("Ocurrió algún error al subir el fichero. No pudo guardarse.") </script>';
    } 
}

?>