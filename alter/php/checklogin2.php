<?php
session_start();
?>

<?php

include_once 'conexion2.php';

$username = filter_input(INPUT_POST,'username');
$password = filter_input(INPUT_POST,'password');

/*print_r($_POST);
echo '<br><br>';
echo $username."  ".$password;
echo '<br><br>';*/

$sql = "SELECT * FROM generador WHERE usuario = '$username'";

$result = $dbConnected ->query($sql);


if ($result->num_rows > 0) {     
 }
 $row = $result->fetch_array(MYSQLI_ASSOC);
 if ($password === $row['password']) { //password_verify
 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);

    echo "Bienvenido! " . $_SESSION['username'];
    header("Refresh: 0; URL = publica.html");
    /*echo "<br><br><a href=panel-control.php>Panel de Control</a>"; */

 } else { 
   echo "Username o Password estan incorrectos.";

   echo "<br><a href='login.html'>Volver a Intentarlo</a>";
 }
 mysqli_close($dbConnected ); 
 ?>
