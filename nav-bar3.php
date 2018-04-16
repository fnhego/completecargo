<?php
/*
 * Proyecto: Complete Cargo
 * File: nav-bar2.php
 * Programador: Ing. Fredy Hernández
 * Fecha: $date
 */
?>
<nav class="navbar navbar-default navbar-fixed-top wrapper" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header col-lg-1">
            <a class="navbar-brand " href="#">
                <img src="img/complete_logo_119x79.png" width="65" height="47" alt="">
            </a>
            <!-- navbar-toggle collapsed para que se muestre como un boton -->
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" 
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-right col-lg-11" id="navbarNavDropdown">
            <ul class="nav navbar-nav">
                <li>
                    <a href="" <span class="glyphicon glyphicon-user"></span>&nbsp<?php echo $user ?></a>
                </li>
               <li>
                   &nbsp;&nbsp;&nbsp;
                    <a href=""></a>
                </li>
                <li class="iniciar" >
                    <a  href="logout.php">Cerrar Sesión</a>
                </li>
                <li >
                    <a href="contacto.php">Contacto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

